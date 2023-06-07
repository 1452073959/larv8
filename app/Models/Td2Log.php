<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Td2Log extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'td2_log';
    
}
