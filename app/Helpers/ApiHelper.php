<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 23/10/2018
 * Time: 04:33
 */

namespace App\Helpers;


use App\Models\Api\ApiClient;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

class ApiHelper
{
    public static function sendResponse($message, $error_code)
    {
        return response()->json([
            'info' => $message,
            'status' => Response::$statusTexts[$error_code],
            'status_code' => $error_code
        ])->setStatusCode($error_code, Response::$statusTexts[$error_code]);
    }

    public static function generateApiClient($name, $version) {

        $created = new ApiClient();
        $created->name = $name;
        $created->secret = Str::random(100);
        $created->version = $version;
        $created->revoked = false;
        $saved = $created->save();

        return $saved;
    }
}