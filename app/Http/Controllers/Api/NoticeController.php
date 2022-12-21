<?php

namespace App\Http\Controllers\Api;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Jobs\SendNotice;
use App\Models\TdDeal;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    //电银
    public function dy(Request $request)
    {
        //接受数据
        $input = $request->all();;
//        $input= array (
//            'action' => 'dyf_order',
//            'batch_number' => '000107',
//            'brand_code' => '10001',
//            'card_num' => '6226230752972495',
//            'charge_amount' => '9.41',
//            'cseq_no' => '000057',
//            'd_type' => '0',
//            'frozen_money' => '0.00',
//            'is_first' => '0',
//            'is_uepay' => '1',
//            'is_ysf' => '1',
//            'mano' => '52390609',
//            'masn' => '832100016474',
//            'mch_no' => '87200060',
//            'merc_id' => '872522456210003',
//            'merc_name' => '武商购物中心',
//            'order_no' => '9805832276099174401',
//            'order_type' => '1',
//            'pay_time' => '2022-12-18 08:35:05',
//            'res_code' => 'YQB000000',
//            'res_msg' => '处理成功',
//            'ret_code' => 'SUCCESS',
//            'ret_msg' => 'SUCCESS',
//            'rrn' => '187324623416',
//            'set_amount' => '1557.59',
//            'sign' => 'EFBF7512826C28BC9B80DB8F101F3BFD',
//            'status' => '1',
//            'tard_rate' => '0.6000',
//            'tran_amount' => '1567.00',
//        );
        $data=[
            'brand_id'=>'1',
            'merchant_name'=>$input['merc_name'],
            'merchant_code'=>$input['merc_id'],
            'sn'=>$input['masn'],
            'agent_no'=>$input['mch_no'],
            'deal_money'=>$input['tran_amount'],
            'settleamount_money'=>$input['set_amount'],
            'rrn'=>$input['rrn'].'dy',
            'deal_time'=>$input['pay_time'],
            'deal_status'=>$input['status'],
            'deal_rate'=>$input['tard_rate'],
            'json_data'=>Tojson($input),
            'Raw_data'=>Tojson($input)
        ];
        TdDeal::create($data);
        return 'success';

    }

    public function liandong(Request $request){
        //接受数据
        $input = $request->all();;

        $data=[
            'Raw_data'=>Tojson($input)
        ];
         $res=TdDeal::create($data);
        return 'success';
    }

}
