@extends('core::public.master')

@section('title', $model->title.' – '.__('Subscriptions').' – '.$websiteTitle)
@section('ogTitle', $model->title)
@section('description', $model->summary)
@section('image', $model->present()->thumbUrl())
@section('bodyClass', 'body-subscriptions body-subscription-'.$model->id.' body-page body-page-'.$page->id)

@section('content')

    @include('core::public._btn-prev-next', ['module' => 'Subscriptions', 'model' => $model])
    <article class="subscription">
        <h1 class="subscription-title">{{ $model->title }}</h1>
        {!! $model->present()->thumb(null, 200) !!}
        <p class="subscription-summary">{{ nl2br($model->summary) }}</p>
        <div class="subscription-body">{!! $model->present()->body !!}</div>
    </article>

@endsection
