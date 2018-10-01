@extends('core::public.master')

@section('title', $model->title.' – '.__('Abouts').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-abouts body-about-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Abouts', 'model' => $model])
    <article class="about">
        <h1 class="about-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="about-summary">{{ nl2br($model->summary) }}</p>
        <div class="about-body">{!! $model->present()->body !!}</div>
    </article>

@endsection
