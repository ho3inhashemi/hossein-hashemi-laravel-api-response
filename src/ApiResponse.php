<?php

namespace HosseinHashemi\LaravelApiResponse;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Config;

class ApiResponse
{
    public static function success(string $message = '', string|null $dataName  , mixed $data = [] , array $meta = []): JsonResponse
    {
        $keys = Config::get('api-response.keys');

        if($dataName == null){
            $dataName = 'data';
        }

        if (!isset($keys[$dataName])) {
            $keys[$dataName] = $dataName;
        }

        $response = [ 
            $keys['message'] => $message,
            $keys[$dataName] =>  $data,
        ];
        
        if (!empty($meta)) {
            $response[$keys['meta']] = $meta;
        }

        return response()->json($response, Response::HTTP_OK);
    }   


    public static function fail(int $statusCode = 400 , $message = 'Error', mixed $data = [] ): JsonResponse
    {
        $keys = Config::get('api-response.keys');

        $response = [
            $keys['message'] => $message,
            $keys['data'] => $data,
        ];    


        return response()->json($response , $statusCode);
    }
}
