<?php

namespace App\Http\Controllers\Api\Case;

use App\Http\Controllers\Controller;
use App\Http\Requests\Case\VerifyUploadedDocumentsRequest;
use App\Models\CaseDispute;
use App\Models\CaseDocument;
use App\Models\CaseFolder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DocumentController extends Controller
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

    public function index()
    {
        $user_id = request()->user()->id;
        $data = [];
        $dispute = true;
        $folder_id = request()->folder_id ?? 0;
        $case_id = request()->case_id ?? 0;

        if ($case_id) {
            $dispute = get_case_dispute($case_id, $user_id);
        }

        if ($dispute) {
            $role = (object) get_user_roles(request()->user());
            $case_documents = CaseDocument::when(($folder_id > 0), function($query) use ($folder_id) {
                $query->where("folder_id", $folder_id);
            })->when(($case_id > 0), function($query) use ($case_id) {
                $query->where("case_id", $case_id);
            })->when(!$case_id, function($query) use ($user_id, $role) {
                $query->where(function($query) use ($user_id, $role) {
                    $query->where("user_id", $user_id)
                    ->orwhereHas('dispute', function($sub_query) use ($user_id, $role) {
                        $sub_query->whereHas('involved_parties', function($query) use ($user_id) {
                            $query->where("user_id", $user_id);
                        })
                        ->orWhere('created_by', $user_id)
                        ->orWhereHas('accused', function ($query) use ($user_id, $role) {
                            $query->where("user_id", $user_id)
                            ->when(in_array($role->db_role_name, CaseDispute::ARRAY_OF_ORGANIZATION_ADMINS), function($query)  use ($role) {
                                $query->orWhere(function($sub_query) use ($role) {
                                    $sub_query->where('union_id', $role->union_id)
                                        ->when($role->union_branch_id, function($query) use ($role) {
                                            $query->where('union_branch', $role->union_branch_id);
                                        })
                                        ->when($role->union_sub_branch_id, function($query) use ($role) {
                                            $query->where('union_sub_branch', $role->union_sub_branch_id);
                                        });
                                });
                            });
                        });
                    });
                });
            })
            ->get();

            if ($case_documents->isNotEmpty()) {
                foreach ($case_documents as $document) {
                    $data[] = [
                        "_id" => $document->id,
                        "name" => $document->doc_name,
                        "size" => format_bytes($document->doc_size),
                        "type" => $document->doc_type,
                        "last_modified" => Carbon::parse($document->updated_at)->format("jS F Y, h:ia"),
                        "file_path" => get_model_file_from_disk($document->doc_path, "case_documents"),
                    ];
                }
            }

            $this->response["message"] = "Fetched case dispute documents";
            $this->response["status"] = Response::HTTP_OK;
            $this->response["data"] = $data;
        }
        else {
            $this->response["message"] = "The case dispute requested does not exist in our records.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function add_document(VerifyUploadedDocumentsRequest $request, $case_id = 0)
    {
        $user_id = request()->user()->id;
        $dispute = get_case_dispute($case_id, $user_id);

        if ($dispute) {
            $folder_name = date("Ym");

            if ($request->folder_id) {
                $document_folder = CaseFolder::where("id", $request->folder_id)->where(function($query) use ($case_id) {
                    if ($case_id) {
                        $query->where("case_id", $case_id);
                    }
                })->first();

                if (!$document_folder) {
                    return response()->json([
                        'status' => Response::HTTP_UNAUTHORIZED,
                        'message' => 'Validation errors',
                        'error' => [
                            'folder_id' => 'The folder you have selected does not exist in our records'
                        ],
                    ], Response::HTTP_UNAUTHORIZED);
                }
                else {
                    $db_folder_name = strtolower($document_folder->folder_name);
                    $db_folder_name = str_replace(" ", "-", $db_folder_name);
                    $folder_name = $db_folder_name."/".date("Ym");
                    $case_id = $document_folder->case_id;
                }
            }
            elseif (!$case_id) {
                return response()->json([
                    'status' => Response::HTTP_UNAUTHORIZED,
                    'message' => 'Validation errors',
                    'error' => [
                        'documents' => 'Documents uploaded must be linked to a case or a folder'
                    ],
                ], Response::HTTP_UNAUTHORIZED);
            }

            $documents = $request->file("documents");
            $uplaoded_docs = [];

            $folder_id = $request->folder_id;

            if (!$folder_id) {
                $case_folder = get_dispute_folder($dispute);

                $folder_id = $case_folder->id;
            }

            if ($request->hasFile('documents')) {
                foreach ($documents as $document) {
                    $oducment_original_name = strtolower($document->getClientOriginalName());
                    $oducment_original_name = str_replace(" ", "-", $oducment_original_name);

                    $document_file_name = time()."__".$oducment_original_name;
                    $document->storeAs($folder_name, $document_file_name, ['disk' => 'case_documents']);

                    $uplaoded_docs[] = [
                        "path" => $folder_name."/".$document_file_name,
                        "name" => $oducment_original_name,
                        "size" => $document->getSize(),
                        "type" => $document->getClientOriginalExtension()
                    ];
                }
            }

            if (count($uplaoded_docs)) {
                foreach ($uplaoded_docs as $documentdata) {
                    CaseDocument::create([
                        "user_id" => $user_id,
                        "case_id" => $case_id,
                        "folder_id" => $folder_id ?? 0,
                        "doc_name" => $documentdata["name"],
                        "doc_size" => $documentdata["size"],
                        "doc_type" => $documentdata["type"],
                        "doc_path" => $documentdata["path"],
                    ]);
                }

                $this->response["message"] = "Documents have been uploaded successfully!";
                $this->response["status"] = Response::HTTP_OK;
            }
        }
        else {
            $this->response["message"] = "The case dispute requested does not exist in our records.";
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function delete_document(Request $request, $case_id = 0)
    {
        $user_id = request()->user()->id;

        $dispute = get_case_dispute($case_id, $user_id);

        if ($dispute) {
            $document = CaseDocument::where("id", $request->document_id)->when($case_id, function($query)  use ($case_id) {
                $query->where("case_id", $case_id);
            })->first();

            if ($document) {
                if ($document->delete()) {
                    $this->response["message"] = "Document has been deleted successfully!";
                    $this->response["status"] = Response::HTTP_OK;
                }
            }
        }
        else {
            $this->response["message"] = "The case dispute requested does not exist in our records.";
        }

        return response()->json($this->response, $this->response["status"]);
    }
}
