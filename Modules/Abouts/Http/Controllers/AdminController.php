<?php

namespace TypiCMS\Modules\Abouts\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Abouts\Http\Requests\FormRequest;
use TypiCMS\Modules\Abouts\Models\About;
use TypiCMS\Modules\Abouts\Repositories\EloquentAbout;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentAbout $about)
    {
        parent::__construct($about);
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

        return view('abouts::admin.index');
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

        return view('abouts::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Abouts\Models\About $about
     *
     * @return \Illuminate\View\View
     */
    public function edit(About $about)
    {
        app('JavaScript')->put('model', $about);

        return view('abouts::admin.edit')
            ->with(['model' => $about]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Abouts\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $about = $this->repository->create($request->all());

        return $this->redirect($request, $about);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Abouts\Models\About             $about
     * @param \TypiCMS\Modules\Abouts\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(About $about, FormRequest $request)
    {
        $this->repository->update($request->id, $request->all());

        return $this->redirect($request, $about);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \TypiCMS\Modules\Abouts\Models\About $about
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(About $about)
    {
        $deleted = $this->repository->delete($about);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function files(About $about)
    {
        $data = [
            'models' => $about->files,
        ];

        return response()->json($data, 200);
    }
}
