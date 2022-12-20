<?php

namespace App\Providers;

use App\Models\TdDeal;
use App\Observers\DealObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],


        //測試事件
        'App\Events\TestEvent' => [
            'App\Listeners\TestListener',
        ],
    ];
    /**
     * 应用程序的模型观察者。
     *
     * @var array
     */
//    protected $observers = [
//        TdDeal::class => [DealObserver::class],
//    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        TdDeal::observe(DealObserver::class);
        //
    }
}
