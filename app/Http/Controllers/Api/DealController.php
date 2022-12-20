<?php

namespace App\Http\Controllers\Api;


use App\Admin\Repositories\TdDeal;
use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Listeners\TestListener;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DealController extends Controller
{
    //

    public function index()
    {
        $user=User::all();
        Log::info('mom');
        return $user;

        return $user;
    }

    public function http()
    {
//        发送测试

//        $response = Http::get('http://la.test/api/event', [
//            'name' => 'Steve',
//            'role' => 'Network Administrator',
//        ]);
        $response= http_post_data('http://la2.test/api/event',[
            'name' => 'Steve',
            'role' => 'Network Administrator',
        ]);
        dump($response);
//       dd($response->successful());
        return $response;
        event(new TestListener(['da'=>1]));

        return $response;
    }

    public function event()
    {
        $a= event(new TestEvent(['da'=>1]));
//        dd($a);
//        echo "事件执行完毕";
        return Tojson(['msg'=>'ok']);
    }


}
