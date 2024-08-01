<?php

namespace App\Http\Middleware;

use App\Models\CaseUserRoles;
use App\Models\Union;
use App\Models\UnionUserRole;
use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\Response;

class CustomUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $extraParam = null): Response
    {
        $union_set = $request->header("ndrs-union");
        $user_id = $request->user()->id;
        $email = $request->user()->email;
        if ($union_set) {
            $union = Union::find($union_set);

            if (!$union) {
                return response()->json([
                    'status' => Response::HTTP_UNAUTHORIZED,
                    'message' => 'We could not locate your union. If you feel this is an error, contact Support for help!',
                    'error' => []
                ], Response::HTTP_UNAUTHORIZED);
            }

            // Find user role for union
            $user_role = UnionUserRole::where("union_id", $union->id)->where("user_id", $user_id)->first();

            if (!$user_role) {
                return response()->json([
                    'status' => Response::HTTP_UNAUTHORIZED,
                    'message' => 'You currently do not have access to this Union. If you feel this is an error, contact Support for help!',
                    'error' => []
                ], Response::HTTP_UNAUTHORIZED);
            }

            $role = Role::find($user_role->role_id);

            if ($role) {
                if ($role->hasPermissionTo($extraParam)) {
                    return $next($request);
                }
            }
        }
        else {
            $user_role = null;
            if ($request->case_id) {
                $user_id = request()->user()->id;
                $dispute = $dispute = get_case_dispute($request->case_id, $user_id);

                if ($dispute) {
                    $user_role = CaseUserRoles::where("user_id", $user_id)->where("case_id", $dispute->id)->first();

                    if (!$user_role) {
                        $user_role = CaseUserRoles::where("case_id", $dispute->id)->whereHas('body', function($query) use ($user_id) {
                            $query->whereHas('members', function($sub_query) use ($user_id) {
                                $sub_query->where("user_id", $user_id);
                            });
                        })->first();
                    }
                }
            }

            if (!$user_role) {
                // Get user role
                $user_role = UnionUserRole::where("user_id", $user_id)->where("status", "active")->first();
            }

            if ($user_role) {
                $role = Role::find(($user_role->case_role_id ?? $user_role->role_id));

                if ($role) {
                    if ($role->hasPermissionTo($extraParam)) {
                        return $next($request);
                    }
                }
            }
        }

        return response()->json([
            'status' => Response::HTTP_UNAUTHORIZED,
            'message' => 'You cannot complete this action as you do not have the necessary permissions for this. If you feel this is an error, contact Support for help!',
            'error' => []
        ], Response::HTTP_UNAUTHORIZED);
    }
}
