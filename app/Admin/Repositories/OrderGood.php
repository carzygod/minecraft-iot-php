<?php

namespace App\Admin\Repositories;

use App\Models\OrderGood as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class OrderGood extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
