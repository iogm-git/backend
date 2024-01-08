<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Response;

class ResponseApiHelper
{
    public static function customApiResponse($success, $data = null, $successMessage = null, $errorMessage = null, $statusCodeSuccess = 200, $statusCodeError = 422)
    {
        return Response::json([
            'success' => $success,
            'data' => $data,
            'message' => $success ? $successMessage : $errorMessage,
        ], $success ? $statusCodeSuccess : $statusCodeError);
    }
}
