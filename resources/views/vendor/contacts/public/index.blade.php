@extends('pages::public.master')

@section('bodyClass', 'body-contacts body-contacts-index body-page body-page-'.$page->id)

@section('content')

    {!! $page->present()->body !!}

    @include('files::public._files', ['model' => $page])

    @includeWhen($models->count() > 0, 'contacts::public._list', ['items' => $models])

@endsection
