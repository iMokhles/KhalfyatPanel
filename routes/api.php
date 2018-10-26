<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 *
 */
$api = app(\Dingo\Api\Routing\Router::class);
$api->version('v1', ['middleware' => 'api'], function ($api) {
    $api->group([
        'namespace' => 'App\Http\Controllers\Api\v1'], function ($api) {

        $api->post('login', 'UsersAuthController@login')->name('api.login');
        $api->post('logout', 'UsersAuthController@logout')->name('api.logout');
        $api->post('refresh', 'UsersAuthController@refresh')->name('api.refresh');
        $api->post('me', 'UsersAuthController@me')->name('api.me');

    });
});
