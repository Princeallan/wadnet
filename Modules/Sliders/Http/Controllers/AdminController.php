<?php

namespace TypiCMS\Modules\Sliders\Http\Controllers;

use TypiCMS\Modules\Core\Http\Controllers\BaseAdminController;
use TypiCMS\Modules\Sliders\Http\Requests\FormRequest;
use TypiCMS\Modules\Sliders\Models\Slider;
use TypiCMS\Modules\Sliders\Repositories\EloquentSlider;

class AdminController extends BaseAdminController
{
    public function __construct(EloquentSlider $slider)
    {
        parent::__construct($slider);
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

        return view('sliders::admin.index');
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

        return view('sliders::admin.create')
            ->with(compact('model'));
    }

    /**
     * Edit form for the specified resource.
     *
     * @param \TypiCMS\Modules\Sliders\Models\Slider $slider
     *
     * @return \Illuminate\View\View
     */
    public function edit(Slider $slider)
    {
        app('JavaScript')->put('model', $slider);

        return view('sliders::admin.edit')
            ->with(['model' => $slider]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \TypiCMS\Modules\Sliders\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(FormRequest $request)
    {
        $slider = $this->repository->create($request->all());

        return $this->redirect($request, $slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \TypiCMS\Modules\Sliders\Models\Slider             $slider
     * @param \TypiCMS\Modules\Sliders\Http\Requests\FormRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Slider $slider, FormRequest $request)
    {
        $this->repository->update($request->id, $request->all());

        return $this->redirect($request, $slider);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \TypiCMS\Modules\Sliders\Models\Slider $slider
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Slider $slider)
    {
        $deleted = $this->repository->delete($slider);

        return response()->json([
            'error' => !$deleted,
        ]);
    }

    /**
     * List models.
     *
     * @return \Illuminate\View\View
     */
    public function files(Slider $slider)
    {
        $data = [
            'models' => $slider->files,
        ];

        return response()->json($data, 200);
    }
}
