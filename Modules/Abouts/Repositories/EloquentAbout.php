<?php

namespace TypiCMS\Modules\Abouts\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Abouts\Models\About;

class EloquentAbout extends EloquentRepository
{
    protected $repositoryId = 'abouts';

    protected $model = About::class;
}
