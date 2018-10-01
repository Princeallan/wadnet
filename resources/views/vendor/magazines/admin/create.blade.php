@extends('core::admin.master')

@section('title', __('New magazine'))

@section('content')

    @include('core::admin._button-back', ['module' => 'magazines'])
    <h1>
        @lang('New magazine')
    </h1>

    {!! BootForm::open()->action(route('admin::index-magazines'))->multipart()->role('form') !!}
        @include('magazines::admin._form')
    {!! BootForm::close() !!}

@endsection
