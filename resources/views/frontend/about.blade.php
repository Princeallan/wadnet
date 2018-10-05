@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 carousel">
            <img src="storage/{!! $about->image->path !!}" class="img-fluid">

        </div>
    </div>

    <div class="row about">
        <div class="col-lg-6 col-md-6 col-sm-12 desc">
            <h3>{!! $about->magazine_title !!}</h3>
            <p>
                {!! $about->magazine_content !!}
            </p>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 desc">

            <h3>{!! $about->author_title !!}</h3>
            <p>
                {!! $about->author_content !!}
            </p>
        </div>
    </div>


@endsection