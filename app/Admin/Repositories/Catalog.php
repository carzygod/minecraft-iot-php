<?php

namespace App\Admin\Repositories;

use App\Models\Catalog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Catalog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
