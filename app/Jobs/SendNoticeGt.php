<?php

namespace App\Jobs;

use App\Models\TdDeal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendNoticeGt implements ShouldQueue
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

        dump($this->data['brand_id']);
        $status= TdDeal::find($this->data['id']);
        if ($this->data['brand_id'] == "国通") {

            $res = http_post_data($this->url."/notice/guotong/trade", json_decode($this->data['Raw_data'],true));
//            dump($res);die;
        }else{
            echo "跳过!";
            $status->send_status='3';
            $status->save();
            return;
        }
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
