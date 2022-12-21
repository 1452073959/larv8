<?php

namespace App\Observers;

use App\Events\TestEvent;
use App\Jobs\SendNotice;
use App\Models\TdDeal;


class DealObserver
{
    /**
     * 在提交所有事务后处理事件。
     *
     * @var bool
     */
    public $afterCommit = true;

    public function creating(TdDeal $data)
    {


        if (!$data->service_money) {
            $data->service_money =round($data['deal_money'] - $data['settleamount_money'],2) ;
        }
        //订单号
        if(!$data->system_no){
            $data->system_no =date('YmdHis').str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);;        // 订单流水号前缀
        }
        if($data['service_money']||$data['deal_money']){
            if (!$data->deal_rate) {
                $data->deal_rate = round(($data['service_money'] / $data['deal_money']) * 100, 3);
            }
        }
        // 判断是否已经存在
        if (TdDeal::query()->where('system_no', $data['system_no'])->exists()) {
            \Log::warning('该订单已存在' . $data['system_no']);
            return false;
        }
        if (TdDeal::query()->where('rrn', $data['rrn'])->exists()) {
            \Log::warning('该订单已存在' . $data['rrn']);
            return false;
        }
        dump($data->toArray());
    }

    /**
     * Handle the td deal "created" event.
     *
     * @param  \App\TdDeal $tdDeal
     * @return void
     */
    public function created(TdDeal $tdDeal)
    {
        //创建完成后发送事件
        dump($tdDeal->toArray());
//        event(new TestEvent($tdDeal));
    }



    /**
     * Handle the td deal "updated" event.
     *
     * @param  \App\TdDeal $tdDeal
     * @return void
     */
    public function updated(TdDeal $tdDeal)
    {
        //
    }

    /**
     * Handle the td deal "deleted" event.
     *
     * @param  \App\TdDeal $tdDeal
     * @return void
     */
    public function deleted(TdDeal $tdDeal)
    {
        //
    }

    /**
     * Handle the td deal "restored" event.
     *
     * @param  \App\TdDeal $tdDeal
     * @return void
     */
    public function restored(TdDeal $tdDeal)
    {
        //
    }

    /**
     * Handle the td deal "force deleted" event.
     *
     * @param  \App\TdDeal $tdDeal
     * @return void
     */
    public function forceDeleted(TdDeal $tdDeal)
    {
        //
    }
}
