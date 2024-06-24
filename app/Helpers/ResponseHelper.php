<?php

namespace App\Helpers;

Class ResponseHelper {
    public static function successResponse($message = '', $data = [], $code = 200){
        return response()->json([
            'responseCode' => $code,
            'responseMessage' => $message,
            'responseData' => $data
        ], $code);
    }

    public static function errorResponse($message= '', $data = [], $code = 500){

        $responseMessage = $message;
            
        if($data != null){
            $responseMessage = $message . ' . ' . json_encode($data);
        }

        return response()->json([
            'responseCode' => $code,
            'responseMessage' => $responseMessage,
        ], $code);
    }
    
}
 
?>