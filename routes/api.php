<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


$api = app(\Dingo\Api\Routing\Router::class);

$api->version('v1', [
//    'prefix' => 'auth',

    'namespace' => 'App\Http\Controllers\Api'
], function ($api) {
    //测试
    $api->get('test', 'DealController@index');
    $api->get('http', 'DealController@http');
    $api->any('event', 'DealController@event');
    $api->any('notice/dianyin', 'NoticeController@dy');
    $api->any('notice/liandong', 'NoticeController@liandong');
});

