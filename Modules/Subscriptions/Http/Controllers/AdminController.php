<?php

namespace TypiCMS\Modules\Subscriptions\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Subscriptions\Http\Requests\FormRequest;
use TypiCMS\Modules\Subscriptions\Models\Subscription;
use TypiCMS\Modules\Subscriptions\Repositories\EloquentSubscription;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentSubscription $subscription)
    {
        parent::__construct($subscription);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $models = $this->repository->with('files')->findAll();
        app('JavaScript')->put('models', $models);

        return view('subscriptions::admin.index');
    }

    /**
     * Create form for a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = $this->repository->createModel();
        app('JavaScript')->put('model', $model);

        return view('subscriptions::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Subscriptions\Models\Subscription $subscription
     *
     * @return \Illuminate\View\View
     */
    public function edit(Subscription $subscription)
    {
        app('JavaScript')->put('model', $subscription);

        return view('subscriptions::admin.edit')
            ->with(['model' => $subscription]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Subscriptions\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $subscription = $this->repository->create($request->all());

        return $this->redirect($request, $subscription);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Subscriptions\Models\Subscription             $subscription
     * @param \TypiCMS\Modules\Subscriptions\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Subscription $subscription, FormRequest $request)
    {
        $this->repository->update($request->id, $request->all());

        return $this->redirect($request, $subscription);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \TypiCMS\Modules\Subscriptions\Models\Subscription $subscription
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Subscription $subscription)
    {
        $deleted = $this->repository->delete($subscription);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function files(Subscription $subscription)
    {
        $data = [
            'models' => $subscription->files,
        ];

        return response()->json($data, 200);
    }
}
