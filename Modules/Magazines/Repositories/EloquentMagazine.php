<?php

namespace TypiCMS\Modules\Magazines\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Magazines\Models\Magazine;

class EloquentMagazine extends EloquentRepository
{
    protected $repositoryId = 'magazines';

    protected $model = Magazine::class;
}
