@extends('core::admin.master')

@section('title', __('New slider'))

@section('content')

    @include('core::admin._button-back', ['module' => 'sliders'])
    <h1>
        @lang('New slider')
    </h1>

    {!! BootForm::open()->action(route('admin::index-sliders'))->multipart()->role('form') !!}
        @include('sliders::admin._form')
    {!! BootForm::close() !!}

@endsection
