<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Response;

class ResponseApiHelper
{
    public static function customApiResponse($success, $data = null, $successMessage = 'Database : success.', $errorMessage = 'Database : failed.', $statusCodeSuccess = 200, $statusCodeError = 422)
    {
        // jika $success bukan bolean
        if (!is_bool($success)) {
            // jika is_object($success) digunakan untuk cek create, update, dan delete
            // $success > 0 (cek apakah update dan delete berhasil)
            $success = is_object($success) || $success > 0;
        }

        return Response::json([
            'success' => $success,
            'data' => $data,
            'message' => $success ? $successMessage : $errorMessage,
        ], $success ? $statusCodeSuccess : $statusCodeError);
    }
}
