<?php

namespace TypiCMS\Modules\Abouts\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Abouts\Repositories\EloquentAbout;

class PublicController extends BasePublicController
{
    public function __construct(EloquentAbout $about)
    {
        parent::__construct($about);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->all();

        return view('abouts::public.index')
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

        return view('abouts::public.show')
            ->with(compact('model'));
    }
}
