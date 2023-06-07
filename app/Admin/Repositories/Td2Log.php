<?php

namespace App\Admin\Repositories;

use App\Models\Td2Log as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Td2Log extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
