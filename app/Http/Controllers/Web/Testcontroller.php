<?php

namespace App\Http\Controllers\Web;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Jobs\SendNotice;
use App\Jobs\SendNoticeDy;
use App\Jobs\SendNoticeGt;
use App\Listeners\TestListener;
use App\Models\TdDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Testcontroller extends Controller
{
    //
    public function index()
    {
//        $a=  TdDeal::where('id','>',1)
//            ->update(['send_status'=>2]);
//dd($a);

        $a=  TdDeal::where('send_status','=',1)
            ->orderby('id',"desc")->limit(100)->get()->toarray();

        foreach ($a as $k1=>$v1)
        {
            SendNotice::dispatch($v1);
//            if($v1['brand_id']=='电银'){
//                SendNoticeDy::dispatch($v1)->onQueue('dy');;
//                echo 1;
//            }elseif ($v1['brand_id']=='国通'){
//                SendNoticeGt::dispatch($v1)->onQueue('gt');;
//                echo 2;
//            }

        }

    }


}
