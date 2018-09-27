<?php

namespace App\WadNet;

use TypiCMS\Modules\Sliders\Models\Slider;

class SliderRepository
{

    public function getSliders()
    {

        return Slider::where('status->en', '1')->get();
    }
}