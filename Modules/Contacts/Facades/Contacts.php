<?php

namespace TypiCMS\Modules\Contacts\Facades;

use Illuminate\Support\Facades\Facade;

class Contacts extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Contacts';
    }
}
