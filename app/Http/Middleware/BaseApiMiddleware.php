<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 26/10/2018
 * Time: 12:12
 */

namespace App\Http\Middleware;


use App\Models\Api\ApiClient;

class BaseApiMiddleware
{

    /**
     * @param $request
     * @return bool
     */
    protected function checkClient($request) {
        $clientHeader = $request->header(config('api_helpers.client_header'));
        $clientVersionHeader = $request->header(config('api_helpers.client_version_header'));

        if (empty($clientHeader) || empty($clientVersionHeader)) {
            return false;
        }
        if (strlen($clientHeader) != 100) {
            return false;
        }
        $client = ApiClient::where([
            'secret' => $clientHeader,
            'version' => $clientVersionHeader,
            'revoked' => false
        ])->first();
        if (!$client) {
            return false;
        }
        return true;
    }
}