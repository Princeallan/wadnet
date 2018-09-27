<?php

namespace App\Http\Controllers\Frontend;

use App\WadNet\SliderRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    protected $sliderrepository;

    /**
     * HomeController constructor.
     * @param $sliderrepository
     */
    public function __construct(SliderRepository $sliderrepository)
    {
        $this->sliderrepository = $sliderrepository;
    }


    public function index()
    {

        $sliders = $this->sliderrepository->getSliders();

        return view('landing-page', compact('sliders'));
    }

    public function getAbout()
    {

        return view('frontend.about');
    }

    public function getContact()
    {

        return view('frontend.contact');
    }
}
