<?php

namespace App\Http\Controllers\Api;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Jobs\Logwrite;
use App\Jobs\SendNotice;
use App\Models\Td1Log;
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
        if(isset($input['Exception'])) {
            $data['send_status']=5;
            $data['Exception']=$input['Exception'];
         }
        TdDeal::create($data);
        return 'success';

    }
    //联动8600083
    public function liandong(Request $request)
    {
        //接受数据
        $input = $request->all();;
        $data = [
            'brand_id' => '2',
            'Raw_data' => Tojson($input),
            'agent_no' =>$input['agent_no']
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
            'Raw_data' => Tojson($input),
              'agent_no' =>$input['agent_no']
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
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/helibao2/payment'
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


    //收付贝gm
    public function sfbgm(Request $request)
    {

        //接受数据
        $input = $request->all();

        $data = [
            'brand_id' => '12',
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/helibao3/payment'
        ];
        $res = TdDeal::create($data);
        return 'success';
    }
    //国通
    public function guotong(Request $request)
    {

        //接受数据
        $input = $request->all();

        $data = [
            'brand_id' => '13',
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/guotong/trade'
        ];
        $res = TdDeal::create($data);
        return json(['errorcode' => "00000", 'timestamp' => time()]);
    }

    //新金控
    public function xjk(Request $request)
    {
        //接受数据
        $input = $request->all();;
        $data = [
            'brand_id' => '14',
            'Raw_data' => Tojson($input),
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //收付贝2.0
    public function shoufubei2(Request $request)
    {
        //接受数据
        $input = $request->all();;

        $data = [
            'brand_id' => '15',
            'Raw_data' => Tojson($input)
        ];
        $res = TdDeal::create($data);
        return 'success';
    }
    //纵横伙伴联收付贝gm
    public function sfbgm4(Request $request)
    {

        //接受数据
        $input = $request->all();

        $data = [
            'brand_id' => '16',
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/helibao4/payment'
        ];
        $res = TdDeal::create($data);
        return 'success';
    }
    //纵横伙伴联动优势gm
    public function ldys(Request $request)
    {
        //接受数据
        $input = $request->all();

        $data = [
            'brand_id' => '18',
            'Raw_data' => Tojson($input),
            'to_url' => 'https://tdnetwork.cn/notice/helibao4/payment'
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //新中付
    public function xzf(Request $request)
    {
        //接受数据
        $input = $request->all();

        $data = [
            'brand_id' => '17',
            'Raw_data' => Tojson($input),
        ];
        $res = TdDeal::create($data);
        return 'success';
    }

    //1.0的日志
    public function log(Request $request)
    {
        //接受数据
        $input = $request->all();
            $data = [
                    'url' => $input['url'],
                    'method' => $input['method'],
                    'params' => Tojson($input['params']),
                    'domain' => $input['domain'],
                    'time' => $input['time'],
                    'response_code' => isset($input['status'])?$input['status']:'',
                    'response_content' => isset($input['content'])?$input['content']:'',
                ];

        Logwrite::dispatch($data);
//        $res = Td1Log::create($data);
        return 'success';
    }

}
