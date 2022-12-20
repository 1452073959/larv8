<?php

namespace App\Http\Controllers\Web;

use App\Events\TestEvent;
use App\Http\Controllers\Controller;
use App\Listeners\TestListener;
use Illuminate\Http\Request;

class Testcontroller extends Controller
{
    //
    public function index()
    {
        $a= event(new TestEvent(['da'=>1222]));
        echo 123111;
    }
}
