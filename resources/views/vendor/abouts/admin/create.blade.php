@extends('core::admin.master')

@section('title', __('New about'))

@section('content')

    @include('core::admin._button-back', ['module' => 'abouts'])
    <h1>
        @lang('New about')
    </h1>

    {!! BootForm::open()->action(route('admin::index-abouts'))->multipart()->role('form') !!}
        @include('abouts::admin._form')
    {!! BootForm::close() !!}

@endsection
