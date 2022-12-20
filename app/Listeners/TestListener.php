<?php

namespace App\Listeners;

use App\Events\TestEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class TestListener implements ShouldQueue
{
    use InteractsWithQueue;
    public $queue = 'demo';
    public $afterCommit = true;
    /**
     * 尝试队列监听器的次数
     *
     * @var int
     */
    public $tries = 5;
    /**
     * 任务被处理的延迟时间（秒）。
     *
     * @var int
     */
    public $delay = 10;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
//        dd($data);
//        file_put_contents("../logs.txt",json_encode($data).PHP_EOL,FILE_APPEND);
    }

    /**
     * 事件处理。
     *
     * @param  \App\Events\OrderShipped  $event
     * @return void
     */
    public function handle(TestEvent $event)
    {

        $event=$event->str;

        $a=file_put_contents("log99s.txt",date('Y-m-d H:i:s',time()).$event.PHP_EOL,FILE_APPEND );
        Log::alert("测试3333333333".$a.json($event));
    }

    /**
     * 处理失败任务。
     *
     * @param  \App\Events\OrderShipped  $event
     * @param  \Throwable  $exception
     * @return void
     */
    public function failed(TestEvent $event, $exception)
    {
        //
        Log::alert("错误".json_encode($exception,true));
    }
}
