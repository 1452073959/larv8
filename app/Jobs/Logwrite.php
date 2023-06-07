<?php

namespace App\Jobs;

use App\Models\NzfLog;
use App\Models\Td1Log;
use App\Models\Td2Log;
use App\Models\TdDeal;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Logwrite implements ShouldQueue
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
        $input=$this->data;
        $data = [
            'url' => $input['url'],
            'method' => $input['method'],
            'params' => Tojson($input['params']),
            'domain' => $input['domain'],
            'time' => $input['time'],
            'response_code' => $input['status'],
            'response_content' => $input['content'],
        ];

        if($data['domain']=='tdnetwork.cn'){
            Td1Log::create($data);
        }elseif ($data['domain']=='td2.tdnetwork.cn'){
            Td2Log::create($data);
        }elseif ($data['domain']=='zf.tdnetwork.cn'){
            NzfLog::create($data);
        }

    }
}
