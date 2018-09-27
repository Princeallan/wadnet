@extends('core::public.master')

@section('title', $model->title.' – '.__('Sliders').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-sliders body-slider-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Sliders', 'model' => $model])
    <article class="slider">
        <h1 class="slider-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="slider-summary">{{ nl2br($model->summary) }}</p>
        <div class="slider-body">{!! $model->present()->body !!}</div>
    </article>

@endsection
