@extends('core::admin.master')

@section('title', __('New subscription'))

@section('content')

    @include('core::admin._button-back', ['module' => 'subscriptions'])
    <h1>
        @lang('New subscription')
    </h1>

    {!! BootForm::open()->action(route('admin::index-subscriptions'))->multipart()->role('form') !!}
        @include('subscriptions::admin._form')
    {!! BootForm::close() !!}

@endsection
