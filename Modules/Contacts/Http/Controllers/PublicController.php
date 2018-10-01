<?php

namespace TypiCMS\Modules\Contacts\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Contacts\Repositories\EloquentContact;

class PublicController extends BasePublicController
{
    public function __construct(EloquentContact $contact)
    {
        parent::__construct($contact);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->all();

        return view('contacts::public.index')
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

        return view('contacts::public.show')
            ->with(compact('model'));
    }
}
