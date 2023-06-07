<?php

namespace App\Admin\Repositories;

use App\Models\NzfLog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class NzfLog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
