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
        $data = [
            'brand_id' => '1',
            'merchant_name' => $input['merc_name'],
            'merchant_code' => $input['merc_id'],
            'sn' => $input['masn'],
            'agent_no' => $input['mch_no'],
            'deal_money' => $input['tran_amount'],
            'settleamount_money' => $input['set_amount'],
            'rrn' => $input['rrn'] . 'dy',
            'deal_time' => $input['pay_time'],
            'deal_status' => $input['status'],
            'deal_rate' => $input['tard_rate'],
            'json_data' => Tojson($input),
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/dianyin/index'
        ];
        TdDeal::create($data);
        return 'success';

    }

    //中付
    public function zhonfu(Request $request)
    {
        //接受数据
        $input = $request->all();;

        $data = [
            'brand_id' => '11',
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/kuaiqian/index'
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //收付贝
    public function shoufubei(Request $request)
    {
        //接受数据
        $input = $request->all();;

        $data = [
            'brand_id' => '3',
            'Raw_data' => Tojson($input)
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //钱宝
    public function qianbao(Request $request)
    {
        //接受数据
        $input = $request->all();;

        $data = [
            'brand_id' => '4',
            'Raw_data' => Tojson($input)
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //合利宝
    public function helibao(Request $request)
    {
        //接受数据
        $input = $request->all();;

        $data = [
            'brand_id' => '5',
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/helibao/payment'
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

//    ..金控
    public function jinkong(Request $request)
    {
        //接受数据
        $input = $request->all();;

        $data = [
            'brand_id' => '6',
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/Jinkong/transOrderNofity'
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //    ..海科
    public function haike(Request $request)
    {
        //接受数据
        $input = $request->all();;

        $data = [
            'brand_id' => '7',
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/haike/trade'
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    public function fulingmeng(Request $request)
    {
        //接受数据
        $input = $request->all();;

        $data = [
            'brand_id' => '8',
            'Raw_data' => Tojson($input)
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //合利宝gm
    public function hlbgm(Request $request)
    {

        //接受数据
        $input = $request->all();

        $data = [
            'brand_id' => '9',
            'Raw_data' => Tojson($input)
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //拉卡拉
    public function lakala(Request $request)
    {

        //接受数据
        $input = $request->all();

        $data = [
            'brand_id' => '10',
            'Raw_data' => Tojson($input)
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //联动8600083
    public function liandong(Request $request)
    {
        //接受数据
        $input = $request->all();;

        $data = [
            'brand_id' => '2',
            'Raw_data' => Tojson($input)
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

}
