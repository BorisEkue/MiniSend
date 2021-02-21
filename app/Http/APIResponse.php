<?php

namespace App\Http;

use Symfony\Component\HttpFoundation\Response;

class APIResponse {
    public static function response($request, $data_key, $data, $status_code) {
        return response([
            'status' => $status_code,
            'uri' => $request->path(),
            $data_key => $data
        ], $status_code);
        
    }

    public static function error($request, $error_description, $status_code) {
        return response([
            'status' => $status_code,
            'uri' => $request->path(),
            'error' => Response::$statusTexts[$status_code],
            'error_description' => $error_description
        ], $status_code);
    }
}