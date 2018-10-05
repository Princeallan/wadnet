@extends('layouts.master')

@section('content')


    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach($sliders as $key => $slider)

            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="d-block w-100" src="storage/{{$slider->image->path}}" alt="First slide">
            </div>

            @endforeach

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="magazine-section">
        <div class="row-width">
            <h1 class="text-center">Issues</h1>
            <div class="row">

                @foreach($magazines as $magazine)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img class="card-img-top img-shape" src="storage/{{ $magazine->image->path }}" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="{!! $magazine->title !!}"></h6>
                            <a href="{!! $magazine->down_link !!}" class="card-link" target="_blank" >Download</a>
                            <a href="{!! $magazine->read_link !!}" class="card-link" target="_blank" >Read</a>
                        </div>
                    </div>
                </div>
                    @endforeach

            </div>


        </div>
    </div>

@endsection
