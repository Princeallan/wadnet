<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\ContactRequest;
use App\WadNet\SliderRepository;
use App\Http\Controllers\Controller;
use TypiCMS\Modules\Abouts\Models\About;
use TypiCMS\Modules\Contacts\Models\Contact;
use TypiCMS\Modules\Magazines\Models\Magazine;

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
        $magazines = Magazine::where('status->en', '1')->latest()->get();

        return view('landing-page', compact('sliders', 'magazines'));
    }

    public function getAbout()
    {
        $about = About::first();

        return view('frontend.about', compact('about'));
    }

    public function getContact()
    {

        return view('frontend.contact');
    }

    /**
     * @param ContactRequest $request
     * @return void
     */
    public function postContact(ContactRequest $request)
    {

        Contact::create($request->all());

    }
}
