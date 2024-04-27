<?php

namespace App\Http\Controllers\Api\Union;

use App\Http\Controllers\Controller;
use App\Models\Union;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UnionController extends Controller
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

    public function index(Request $request)
    {
        $data = [];
        $unions = Union::get();
        $this->response["message"] = "No data found";

        if ($unions->isNotEmpty()) {
            foreach ($unions as $union) {
                $data[] = [
                    "id" => $union->id,
                    "name" => $union->name,
                    "acronym" => $union->acronym,
                    "logo" => $union->logo ? asset($union->logo) : '',
                ];
            }

            $this->response["message"] = "Retrieved comprehensive union list";
            $this->response["status"] = Response::HTTP_OK;
        }

        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }
}
