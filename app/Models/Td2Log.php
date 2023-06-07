<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Td2Log extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'td2_log';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
    public $fillable = [
        'url', 'method', 'params', 'domain', 'time','response_code','response_content'
    ];
}
