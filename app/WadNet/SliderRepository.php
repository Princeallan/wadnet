<?php

namespace App\WadNet;

use TypiCMS\Modules\Sliders\Models\Slider;

class SliderRepository
{

    public function getSliders()
    {

        return Slider::all();
    }
}