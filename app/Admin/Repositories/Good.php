<?php

namespace App\Admin\Repositories;

use App\Models\Good as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Good extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
