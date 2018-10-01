@extends('core::public.master')

@section('title', $model->title.' – '.__('Contacts').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-contacts body-contact-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Contacts', 'model' => $model])
    <article class="contact">
        <h1 class="contact-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="contact-summary">{{ nl2br($model->summary) }}</p>
        <div class="contact-body">{!! $model->present()->body !!}</div>
    </article>

@endsection
