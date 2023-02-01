<?php

namespace App\Http\Controllers\Web;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Jobs\SendNotice;
use App\Listeners\TestListener;
use App\Models\TdDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Testcontroller extends Controller
{
    //
    public function index()
    {

        $a=  TdDeal::where('send_status','1')->limit(100)
            ->orderby('id',"desc")->get()->toarray();
//        dd($a);die;
        foreach ($a as $k1=>$v1)
        {
            SendNotice::dispatch($v1);
        }

    }


}
