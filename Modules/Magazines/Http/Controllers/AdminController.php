<?php

namespace TypiCMS\Modules\Magazines\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Magazines\Http\Requests\FormRequest;
use TypiCMS\Modules\Magazines\Models\Magazine;
use TypiCMS\Modules\Magazines\Repositories\EloquentMagazine;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentMagazine $magazine)
    {
        parent::__construct($magazine);
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

        return view('magazines::admin.index');
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

        return view('magazines::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Magazines\Models\Magazine $magazine
     *
     * @return \Illuminate\View\View
     */
    public function edit(Magazine $magazine)
    {
        app('JavaScript')->put('model', $magazine);

        return view('magazines::admin.edit')
            ->with(['model' => $magazine]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Magazines\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $magazine = $this->repository->create($request->all());

        return $this->redirect($request, $magazine);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Magazines\Models\Magazine             $magazine
     * @param \TypiCMS\Modules\Magazines\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Magazine $magazine, FormRequest $request)
    {
        $this->repository->update($request->id, $request->all());

        return $this->redirect($request, $magazine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \TypiCMS\Modules\Magazines\Models\Magazine $magazine
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Magazine $magazine)
    {
        $deleted = $this->repository->delete($magazine);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function files(Magazine $magazine)
    {
        $data = [
            'models' => $magazine->files,
        ];

        return response()->json($data, 200);
    }
}
