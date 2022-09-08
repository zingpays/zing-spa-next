<?php
/*
 * @Author: Louis Yu louis.yu@flashwire.com
 * @Date: 2022-09-07 15:57:56
 * @LastEditTime: 2022-09-08 09:41:44
 */

namespace App\Http\Controllers\api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function json($data, $code, $message): JsonResponse
    {
        return response()->json([
            'code'       => $code,
            'data'       => $data ?? null,
            'message'    => $message,
            'request_id' => getRequestId(),
        ]);
    }

    public function success($data = null): JsonResponse
    {
        return $this->json($data, $code = 0, $message = 'success');
    }

    public function failed($message, int $code = 1): JsonResponse
    {
        return $this->json($data = null, $code, $message);
    }
}
