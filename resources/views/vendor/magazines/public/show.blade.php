@extends('core::public.master')

@section('title', $model->title.' – '.__('Magazines').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-magazines body-magazine-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Magazines', 'model' => $model])
    <article class="magazine">
        <h1 class="magazine-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="magazine-summary">{{ nl2br($model->summary) }}</p>
        <div class="magazine-body">{!! $model->present()->body !!}</div>
    </article>

@endsection
