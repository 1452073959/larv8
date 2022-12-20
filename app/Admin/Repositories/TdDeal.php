<?php

namespace App\Admin\Repositories;

use App\Models\TdDeal as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class TdDeal extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
