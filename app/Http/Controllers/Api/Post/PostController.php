<?php

namespace App\Http\Controllers\Api\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostController extends Controller
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

    public function index($category_id)
    {
        $data =[];
        $this->response["message"] = "No data found";

        $posts = Post::whereHas('category')->where("category_id", $category_id)->get();

        if ($posts->isNotEmpty()) {
            foreach ($posts as $post) {
                $data[] = [
                    "_id" => $post->id,
                    "category" => $post->category->title,
                    "title" => $post->title,
                ];
            }
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["message"] = "Posts retrieved successfully!";
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function post($post_id)
    {
        $data =[];
        $this->response["message"] = "No data found";

        $post = Post::where("id", $post_id)->whereHas('category')->first();

        if ($post) {
            $data = [
                "_id" => $post->id,
                "title" => $post->title,
                "content" => $post->content,
                "category" => $post->category->title,
            ];

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Post details retrieved successfully!";
            $this->response["data"] = $data;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function store(PostRequest $request)
    {
        $form_error_msg = [];

        if (!PostCategory::where("id", $request->category_id)->exists()) {
            $form_error_msg["title"] = ["Category selected does not match our records"];
        }
        else {
            Post::create([
                "category_id" => $request->category_id,
                "title" => $request->title,
                "content" => $request->content,
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

    public function update(PostRequest $request, $post_id)
    {
        $form_error_msg = [];

        if (!PostCategory::where("id", $request->category_id)->exists()) {
            $form_error_msg["title"] = ["Category selected does not match our records"];
        }
        else {
            $post = Post::find($post_id);

            if ($post) {
                Post::where("id", $post->id)->update([
                    "category_id" => $request->category_id,
                    "title" => $request->title,
                    "content" => $request->content,
                ]);

                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Post has been updated successfully!";
            }
        }

        if (!empty($form_error_msg)) {
            $this->response["status"] = Response::HTTP_UNAUTHORIZED;
            $this->response["message"] = 'Validation errors';
            $this->response["error"] = $form_error_msg;
        }

        return response()->json($this->response, $this->response["status"]);
    }

    public function destroy($post_id)
    {
        $post = Post::find($post_id);

        if ($post) {
            if ($post->delete()) {
                $this->response["status"] = Response::HTTP_OK;
                $this->response["message"] = "Post has been deleted successfully!";
            }
        }

        return response()->json($this->response, $this->response["status"]);
    }
}
