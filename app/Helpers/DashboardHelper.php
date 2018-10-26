<?php
/**
 * Created by PhpStorm.
 * User: imokhles
 * Date: 23/10/2018
 * Time: 04:33
 */

namespace App\Helpers;


use App\Models\Api\ApiAccess;
use App\Models\Api\ApiClient;
use App\Models\Social\WallpaperDownload;
use App\Models\User;
use Illuminate\Http\Response;

class DashboardHelper
{


    public static function boxWidgets() {

        return [
            [
                'title' => 'Clients',
                'count' => count(ApiClient::all()),
                'icon'  => 'code-fork',
                'color' => 'red'
            ],
            [
                'title' => 'Access',
                'count' => count(ApiAccess::all()),
                'icon'  => 'universal-access',
                'color' => 'green'
            ],
            [
                'title' => 'Users',
                'count' => count(User::all()),
                'icon'  => 'users',
                'color' => 'aqua'
            ],
            [
                'title' => 'Unique Downloads',
                'count' => count(WallpaperDownload::all()),
                'icon'  => 'download',
                'color' => 'yellow'
            ]
        ];
    }
}