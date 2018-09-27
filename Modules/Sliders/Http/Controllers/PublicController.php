<?php

namespace TypiCMS\Modules\Sliders\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Sliders\Repositories\EloquentSlider;

class PublicController extends BasePublicController
{
    public function __construct(EloquentSlider $slider)
    {
        parent::__construct($slider);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->all();

        return view('sliders::public.index')
            ->with(compact('models'));
    }

    /**
     * Show resource.
     *
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        $model = $this->repository->bySlug($slug);

        return view('sliders::public.show')
            ->with(compact('model'));
    }
}
