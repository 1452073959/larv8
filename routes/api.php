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
    //电银
    $api->any('notice/dianyin', 'NoticeController@dy');
    //收付贝
    $api->any('notice/shoufubei', 'NoticeController@shoufubei');
    //钱宝
    $api->any('notice/qianbao', 'NoticeController@qianbao');
    //合利宝
    $api->any('notice/helibao', 'NoticeController@helibao');
    //金控
    $api->any('notice/jinkong', 'NoticeController@jinkong');
    //海科
    $api->any('notice/haike', 'NoticeController@haike');
    //付临门
    $api->any('notice/fulingmeng', 'NoticeController@fulingmeng');
    //合利宝gm
    $api->any('notice/hlbgm', 'NoticeController@hlbgm');
    //收付贝gm
    $api->any('notice/helibao3', 'NoticeController@sfbgm');
    //拉卡拉
    $api->any('notice/lakala', 'NoticeController@lakala');
    //快钱
    $api->any('notice/zhonfu', 'NoticeController@zhonfu');
    // 联动liandong8600083
    $api->any('notice/liandong', 'NoticeController@liandong');
    //国通
    $api->any('notice/guotong', 'NoticeController@guotong');
    //新金控
    $api->any('notice/xjk', 'NoticeController@xjk');
});

