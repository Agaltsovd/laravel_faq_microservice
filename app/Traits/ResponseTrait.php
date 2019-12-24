<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * @param string $message
     * @param null $data
     * @param int $errorCode
     * @param string $status
     * @return JsonResponse
     */
    public function response(string $message, $data = null, int $errorCode = 0, string $status = 'success'): JsonResponse
    {
        return response()->json([
            'error_code'    =>  $errorCode,
            'status'        =>  $status,
            'message'       =>  $message,
            'data'          =>  $data
        ]);
    }
}
