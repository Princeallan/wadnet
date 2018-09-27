<?php

namespace TypiCMS\Modules\Sliders\Facades;

use Illuminate\Support\Facades\Facade;

class Sliders extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Sliders';
    }
}
