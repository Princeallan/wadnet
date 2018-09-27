<?php

namespace TypiCMS\Modules\Sliders\Repositories;

use TypiCMS\Modules\Core\Repositories\EloquentRepository;
use TypiCMS\Modules\Sliders\Models\Slider;

class EloquentSlider extends EloquentRepository
{
    protected $repositoryId = 'sliders';

    protected $model = Slider::class;
}
