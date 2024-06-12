<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostCategoryRequest;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostCategoryController extends Controller
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
        $data =[];
        $this->response["message"] = "No data found";

        $categories = PostCategory::all();

        if ($categories->isNotEmpty()) {
            foreach ($categories as $category) {
                $data[] = [
                    "_id" => $category->id,
                    "title" => $category->title,
                    "description" => $category->description,
                    "no_of_posts" => $category->posts->count(),
                ];
            }
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Post categories retrieved successfully!";
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function read($category_id)
    {
        $data =[];
        $category = PostCategory::find($category_id);

        if ($category) {
            $data = [
                "_id" => $category->id,
                "title" => $category->title,
                "description" => $category->description,
                "no_of_posts" => $category->posts->count(),
            ];

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Post category retrieved successfully!";
            $this->response["data"] = $data;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function store(PostCategoryRequest $request)
    {
        $form_error_msg = [];

        if (PostCategory::where("title", $request->title)->exists()) {
            $form_error_msg["title"] = ["This title already exists"];
        }
        else {
            PostCategory::create([
                "title" => $request->title,
                "description" => $request->description,
                "created_by" => $request->user()->id,
            ]);

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Post category created successfully!";
        }

        if (!empty($form_error_msg)) {
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
            $this->response["message"] = 'Validation errors';
            $this->response["error"] = $form_error_msg;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function update(PostCategoryRequest $request, $category_id)
    {
        $form_error_msg = [];
        $category = PostCategory::find($category_id);

        if ($category) {
            if (PostCategory::where("title", $request->title)->where("id", "<>", $category->id)->exists()) {
                $form_error_msg["title"] = ["This title already exists"];
            }
            else {
                PostCategory::where("id", $category->id)->update([
                    "title" => $request->title,
                    "description" => $request->description,
                ]);

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Post category has been updated successfully!";
            }
        }

        if (!empty($form_error_msg)) {
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
            $this->response["message"] = 'Validation errors';
            $this->response["error"] = $form_error_msg;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function destroy($category_id)
    {
        $category = PostCategory::find($category_id);

        if ($category) {
            if ($category->delete()) {
                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Post category has been deleted successfully!";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }
}
