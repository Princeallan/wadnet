<?php

namespace TypiCMS\Modules\Magazines\Facades;

use Illuminate\Support\Facades\Facade;

class Magazines extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Magazines';
    }
}
