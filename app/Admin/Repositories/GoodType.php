<?php

namespace App\Admin\Repositories;

use App\Models\GoodType as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class GoodType extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
