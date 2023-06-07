<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Td1Log extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'td1_log';
    //设置以时间戳格式


//    protected $dateFormat = 'U';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public $fillable = [
        'url', 'method', 'params', 'domain', 'time','response_code','response_content'
    ];
}
