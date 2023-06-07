<?php

namespace App\Jobs;

use App\Models\TdDeal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNoticeDy implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $url='https://tdnetwork.cn/';
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
        $this->data = $data;
        //
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
//        dump(json_decode($this->data['Raw_data'],true));

        $status= TdDeal::find($this->data['id']);
        if ($this->data['brand_id'] == "收付贝") {
//            dump( json_decode($this->data['Raw_data'],true));die;
            $data = json_decode($this->data['Raw_data'], true); // 将JSON字符串解析为数组

            $data['data'] = htmlspecialchars_decode($data['data']); // 解码HTML实体字符
//            dump($data);
            $data=  json_encode($data, true);
            dump($data);
                $res = http_post_data($this->url."/notice/shoufubei/payment", $data);
        }elseif($this->data['brand_id'] == "金控"){
            $res = http_post_data($this->url."/notice/Jinkong/transOrderNofity", json_decode($this->data['Raw_data'],true));
        }elseif($this->data['brand_id'] == "海科"){
            $res = http_post_data($this->url."/notice/Haike/trade", json_decode($this->data['Raw_data'],true));}/*elseif($this->data['brand_id'] == "电银"){
            $res = http_post_data($this->url."/notice/dianyin/index", json_decode($this->data['Raw_data'],true));
            dump($res);die;
            echo 123;
        }elseif($this->data['brand_id'] == "收付贝"){
            $res = http_post_data($this->url."/notice/shoufubei/payment", json_decode($this->data['Raw_data'],true));
        }elseif($this->data['brand_id'] == "钱宝"){
            $res = http_post_data($this->url."/notice/qianbao/index", json_decode($this->data['Raw_data'],true));
        }elseif($this->data['brand_id'] == "合利宝"){
            $res = http_post_data($this->url."/notice/helibao/payment", json_decode($this->data['Raw_data'],true));
        }elseif($this->data['brand_id'] == "金控"){
            $res = http_post_data($this->url."/notice/Jinkong/transOrderNofity", json_decode($this->data['Raw_data'],true));
        }elseif($this->data['brand_id'] == "海科"){
            $res = http_post_data($this->url."/notice/Haike/trade", json_decode($this->data['Raw_data'],true));
        }elseif($this->data['brand_id'] == "合利宝GM"){
            $res = http_post_data($this->url."/notice/helibao2/payment", json_decode($this->data['Raw_data'],true));
        }else{
            echo "跳过!";
            $status->send_status='3';
            $status->save();
            return;
        }*/

        dump($res);
        if($res['0']!="200"){
            $this->fail();
            $status->send_status='4';
            echo "失败!";
        }else{
            $status->send_status='2';
            echo "成功!";
        }
        $status->save();
    }
}
