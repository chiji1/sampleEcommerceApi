<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiBaseController extends Controller
{
    //
    /**
     * @param $payload Data to be returned to frontend
     * @param $message Message For response
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendResponse($payload, $message) {
        $response = [
            'success' => true,
            'payload'    => $payload,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    /**
     * @param $error Error Message to be returned to User
     * @param array $errorMessages Empty by default unless multiple Errors are being sent
     * @param int $code Error Code [Defaults 403]
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendError($error, $errorMessages = [], $code = 403)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        if(!empty($errorMessages)){
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }
}
