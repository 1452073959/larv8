<?php

namespace App\Models;

use App\Jobs\SendNotice;
use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Observers\DealObserver;
class TdDeal extends Model
{
    use HasDateTimeFormatter;
    use SoftDeletes;
    //设置以时间戳格式
    protected $dateFormat = 'U';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    protected $table = 'td_deal';
    public $fillable = [
        'brand_id', 'merchant_name', 'merchant_code', 'sn', 'agent_no', 'deal_money', 'settleamount_money', 'rrn', 'deal_time', 'deal_status', 'deal_rate','json_data'
    ];

    /**
     * 模型的事件映射。
     *
     * @var array
     */
    protected $dispatchesEvents = [
//        'created ' => UserSaved::class,
    ];
    /**
     * 模型的“引导”方法。
     *
     * @return void
     */
//    protected static function boot()
//    {
//        static::observe(DealObserver::class);
//        parent::boot();
//        static::creating(function ($data) {
//
//            if (!$data->service_money) {
//                $data->service_money = $data['deal_money']-$data['settleamount_money'];
//            }
//            if (!$data->deal_rate) {
//                $data->deal_rate =round(($data['service_money'] / $data['deal_money']) * 100, 3);
//            }
//            SendNotice::dispatch($data);
//            if (!$data->service_money||!$data->deal_rate) {
//                return false;
//            }
//            // 判断是否已经存在
//            if (static::query()->where('rrn', $data['rrn'])->exists()) {
//                \Log::warning('该订单已存在'.$data['rrn']);
//                return false;
//            }
//
//            dump($data);
//            dump($data->toarray());
            //
//        });

//    }



}

