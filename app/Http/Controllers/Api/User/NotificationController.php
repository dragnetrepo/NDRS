<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
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
        $this->response["message"] = "No data found";
        $all_cases = false; $is_read = "all"; $case_id = 0;

        if ($request->case) {
            if ($request->case == "all") {
                $all_cases = "all";
            }
            else {
                $case_id = $request->case;
            }
        }

        if ($request->status) {
            if ($request->status == "pending") {
                $is_read = "pending";
            }
        }

        $notifications = get_user_notifications($all_cases, $is_read, $case_id);

        if ($notifications->isNotEmpty()) {
            foreach ($notifications as $notification) {
                $notification_date = $notification->created_at->format("d F Y");

                if ($notification_date == date("d F Y")) {
                    $notification_date = "Today";
                }

                $data[$notification_date][] = [
                    "_id" => $notification->id,
                    "message" => $notification->message,
                    "is_read" => $notification->is_read,
                    "date" => Carbon::parse($notification->created_at)->diffForHumans(),
                    "photo" => get_model_file_from_disk(($notification->user_triggered->display_picture ?? ""), "profile_photos"),
                ];
            }

            $this->response["message"] = "Notifications retrieved!";
        }

        $this->response["status"] = Response::HTTP_OK;
        $this->response["data"] = $data;

        return response()->json($this->response, $this->response["status"]);
    }

    public function mark_as_read(Request $request)
    {
        $notification = Notification::find($request->notification_id);

        if ($notification) {
            if (!$notification->is_read) {
                $notification->is_read = true;
                $notification->save();
            }

            $this->response["status"] = Response::HTTP_OK;
            $this->response["message"] = "Notification marked as read!";
        }

        return response()->json($this->response, $this->response["status"]);
    }
}
