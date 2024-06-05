<?php

namespace App\Http\Controllers\Api\Case;

use App\Http\Controllers\Controller;
use App\Http\Requests\Case\FoldersRequest;
use App\Http\Requests\Case\ModifyFoldersRequest;
use App\Models\CaseDocument;
use App\Models\CaseFolder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FolderController extends Controller
{
    protected $response;

    public function __construct()
    {
        $this->response = [
            'status' => Response::HTTP_FORBIDDEN,
            'message' => 'We could not complete your request. Please try again!',
            'error' => []
        ];
    }

    public function index($case_id)
    {
        $user_id = request()->user()->id;
        $dispute = get_case_dispute($case_id, $user_id);

        $data = [];

        if ($dispute) {
            $case_folders = CaseFolder::where("case_id", $dispute->id)->get();

            if ($case_folders->isNotEmpty()) {
                foreach ($case_folders as $folder) {
                    $last_modified = Carbon::parse($folder->updated_at)->format("jS F Y, h:ia");
                    $document_data = $folder->documents;

                    if ($document_data->count()) {
                        $document = $document_data->last();

                        if ($document) {
                            $last_modified = Carbon::parse($document->updated_at)->format("jS F Y, h:ia");
                        }
                    }

                    $data[] = [
                        "_id" => $folder->id,
                        "name" => $folder->folder_name,
                        "number_of_files" => $document_data->count(),
                        "size" => $document_data->sum('doc_size'),
                        "last_modified" => $last_modified,
                    ];
                }
            }

            $this->response["message"] = "Fetched case dispute folders";
            $this->response["status"] = Response::HTTP_OK;
            $this->response["data"] = $data;
        }
        else {
            $this->response["message"] = "The case dispute requested does not exist in our records.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function create_folder(FoldersRequest $request, $case_id = 0)
    {
        $user_id = request()->user()->id;
        $dispute = get_case_dispute($case_id, $user_id);

        if ($dispute) {
            if (!CaseFolder::where("folder_name", $request->name)->where(function($query) use ($case_id, $user_id) {
                if ($case_id) {
                    $query->where("case_id", $case_id);
                }
                else {
                    $query->where("user_id", $user_id);
                }
            })->exists()) {
                CaseFolder::create([
                    "user_id" => $user_id,
                    "case_id" => $case_id,
                    "folder_name" => $request->name
                ]);

                $this->response["message"] = "Folder created successfully!";
                $this->response["status"] = Response::HTTP_OK;
            }
            else {
                $this->response["message"] = "Folder name already exists!!";
            }
        }
        else {
            $this->response["message"] = "The case dispute requested does not exist in our records.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function rename_folder(ModifyFoldersRequest $request, $case_id)
    {
        $user_id = request()->user()->id;
        $dispute = get_case_dispute($case_id, $user_id);

        if ($dispute) {
            if (!CaseFolder::where("folder_name", $request->name)->where("id", "<>", $request->folder_id)->where("case_id", $case_id)->exists()) {
                CaseFolder::where("id", $request->folder_id)->where("case_id", $case_id)->update([
                    "folder_name" => $request->name
                ]);

                $this->response["message"] = "Folder has been modified successfully!";
                $this->response["status"] = Response::HTTP_OK;
            }
            else {
                $this->response["message"] = "Folder name already exists!!";
            }
        }
        else {
            $this->response["message"] = "The case dispute requested does not exist in our records.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function delete_folder(Request $request, $case_id)
    {
        $user_id = request()->user()->id;
        $dispute = get_case_dispute($case_id, $user_id);

        if ($dispute) {
            $folder = CaseFolder::where("id", $request->folder_id)->when($case_id, function($query) use ($case_id) {
                $query->where("case_id", $case_id);
            })->first();

            if ($folder) {
                if ($folder->delete()) {
                    CaseDocument::where("folder_id", $request->folder_id)->delete();
                    $this->response["message"] = "Folder has been deleted successfully. All files in the folder has also been deleted!";
                    $this->response["status"] = Response::HTTP_OK;
                }
            }
        }
        else {
            $this->response["message"] = "The case dispute requested does not exist in our records.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function all_folders(Request $request)
    {
        $user_id = $request->user()->id;
        $disputes = get_case_dispute(0, $user_id);
        $data = $case_ids = [];

        $this->response["message"] = "No data found";

        if ($disputes->isNotEmpty()) {
            foreach ($disputes as $dispute) {
                create_dispute_folder($dispute);
                $case_ids[] = $dispute->id;
            }
        }

        // Case Folders in a case
        $case_folders = CaseFolder::whereIn("case_id", $case_ids);

        // Get folders that you created
        $all_folders = CaseFolder::where("case_id", 0)->where("user_id", $user_id)->union($case_folders)->get();
        if ($all_folders->isNotEmpty()) {
            foreach ($all_folders as $folder) {
                $last_modified = Carbon::parse($folder->updated_at)->format("jS F Y, h:ia");
                $document_data = $folder->documents;

                if ($document_data->count()) {
                    $document = $document_data->last();

                    if ($document) {
                        $last_modified = Carbon::parse($document->updated_at)->format("jS F Y, h:ia");
                    }
                }

                $data[] = [
                    "_id" => $folder->id,
                    "name" => $folder->folder_name,
                    "number_of_files" => $document_data->count(),
                    "size" => $document_data->sum('doc_size'),
                    "last_modified" => $last_modified,
                ];
            }
        }

        if (count($data)) {
            $this->response["message"] = "Folders list retrieved!";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }
}
