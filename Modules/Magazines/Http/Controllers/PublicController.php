<?php

namespace TypiCMS\Modules\Magazines\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Magazines\Repositories\EloquentMagazine;

class PublicController extends BasePublicController
{
    public function __construct(EloquentMagazine $magazine)
    {
        parent::__construct($magazine);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->all();

        return view('magazines::public.index')
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

        return view('magazines::public.show')
            ->with(compact('model'));
    }
}
