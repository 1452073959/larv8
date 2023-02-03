<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\TdDeal;

class SendNotice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $url = 'http://49.235.76.14:687';
    /**
     * 任务可尝试次数.
     *
     * @var int
     */
    public $tries = 5;
    /**
     * 标示是否应在超时时标记为失败.
     *
     * @var bool
     */
    public $failOnTimeout = true;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;
//        dump( $this->data);die;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

//
//        if($res['1']['ret_code']!="0000"){
//            $this->fail();
//        }else{
//            dump($res);
//        }

//            log::write($res);

        //
        dump($this->data['brand_id']);
        $status = TdDeal::find($this->data['id']);
        if ($this->data['brand_id'] == "联动") {
//            dump( json_decode($this->data['Raw_data'],true));die;
            if ($this->data['agent_no'] == 8600083) {
                $res = http_post_data($this->url . "/notice/Liandong/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600118) {
                $res = http_post_data($this->url . "/notice/Liandong2/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600123) {
                $res = http_post_data($this->url . "/notice/Liandong3/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600137) {
                $res = http_post_data($this->url . "/notice/Liandong4/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600139) {
                $res = http_post_data($this->url . "/notice/Liandong5/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600157) {
                $res = http_post_data($this->url . "/notice/Liandong6/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600158) {
                $res = http_post_data($this->url . "/notice/Liandong7/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600167) {
                $res = http_post_data($this->url . "/notice/Liandong8/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600169) {
                $res = http_post_data($this->url . "/notice/Liandong9/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600180) {
                $res = http_post_data($this->url . "/notice/Liandong10/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600190) {
                $res = http_post_data($this->url . "/notice/Liandong11/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600210) {
                $res = http_post_data($this->url . "/notice/Liandong12/transOrderNofity", json_decode($this->data['Raw_data'], true));
            } elseif ($this->data['agent_no'] == 8600214) {
                $res = http_post_data($this->url . "/notice/Liandong13/transOrderNofity", json_decode($this->data['Raw_data'], true));
            }
        } elseif ($this->data['brand_id'] == "电银") {
            $res = http_post_data($this->url . "/notice/dianyin/index", json_decode($this->data['Raw_data'], true));
        } elseif ($this->data['brand_id'] == "收付贝") {
            $res = http_post_data($this->url . "/notice/shoufubei/payment", json_decode($this->data['Raw_data'], true));
        } elseif ($this->data['brand_id'] == "钱宝") {
            $res = http_post_data($this->url . "/notice/qianbao/index", json_decode($this->data['Raw_data'], true));
        } elseif ($this->data['brand_id'] == "合利宝") {
            $res = http_post_data($this->url . "/notice/helibao/payment", json_decode($this->data['Raw_data'], true));
        } elseif ($this->data['brand_id'] == "金控") {
            $res = http_post_data($this->url . "/notice/Jinkong/transOrderNofity", json_decode($this->data['Raw_data'], true));
        } elseif ($this->data['brand_id'] == "海科") {
            $res = http_post_data($this->url . "/notice/Haike/trade", json_decode($this->data['Raw_data'], true));
        } elseif ($this->data['brand_id'] == "合利宝GM") {
            $res = http_post_data($this->url . "/notice/helibao2/payment", json_decode($this->data['Raw_data'], true));
        } elseif ($this->data['brand_id'] == "国通") {
            $res = http_post_data($this->url . "/notice/guotong/trade", json_decode($this->data['Raw_data'], true));
        } else {
            echo "跳过!";
            $status->send_status = '3';
            $status->save();
            return;
        }
        if ($res['0'] != "200") {
            $this->fail();
            $status->send_status = '4';
            echo "失败!";
        } else {
            $status->send_status = '2';
            echo "成功!";
        }
        $status->save();


    }
}
