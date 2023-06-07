<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class NzfLog extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'nzf_log';
    
}
