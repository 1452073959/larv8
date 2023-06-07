<?php

namespace App\Admin\Repositories;

use App\Models\Td1Log as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Td1Log extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
