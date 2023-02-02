<?php

namespace App\Http\Controllers\Web;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Jobs\SendNotice;
use App\Jobs\SendNoticeDy;
use App\Listeners\TestListener;
use App\Models\TdDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Testcontroller extends Controller
{
    //
    public function index()
    {

        $a=  TdDeal::where('send_status','1')->limit(100)->wherein('brand_id',[1])
            ->orderby('id',"desc")->get()->toarray();

        foreach ($a as $k1=>$v1)
        {
            if($v1['brand_id']=='电银'){
                SendNoticeDy::dispatch($v1)->onQueue('dy');;
                echo 1;
            }

        }

    }


}
