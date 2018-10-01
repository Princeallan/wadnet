<?php

namespace TypiCMS\Modules\Subscriptions\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BasePublicController;
use TypiCMS\Modules\Subscriptions\Repositories\EloquentSubscription;

class PublicController extends BasePublicController
{
    public function __construct(EloquentSubscription $subscription)
    {
        parent::__construct($subscription);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->all();

        return view('subscriptions::public.index')
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

        return view('subscriptions::public.show')
            ->with(compact('model'));
    }
}
