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
    public function __construct(TdDeal $data)
    {
        //
        $this->data = $data;
//        dump( $this->data->toArray());
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(TdDeal $data)
    {
        //
                dump( $this->data->toArray());
        $response= http_post_data('http://la.test/api/event',$data);

        Log::alert("测试".json_encode($response,true));
    }
}
