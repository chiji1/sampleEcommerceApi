<?php
/**
 * Created by PhpStorm.
 * User: Chijioke
 * Date: 2019-11-29
 * Time: 16:02
 */

namespace App\Helper;


class ApiHelper
{
    //
    /**
     * @param $payload Data to be returned to frontend
     * @param $message Message For response
     * @return \Illuminate\Http\JsonResponse
     */
    public static function sendResponse($payload, $message) {
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
    public static function sendError($error, $errorMessages = [], $code = 403)
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