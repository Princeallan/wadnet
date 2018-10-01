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
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img class="card-img-top img-shape" src="{{asset('img/Magazine97.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <a href="#" class="card-link">Download</a>
                            <a href="#" class="card-link">Read</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img class="card-img-top img-shape" src="{{asset('img/Magazine97.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <a href="#" class="card-link">Download</a>
                            <a href="#" class="card-link">Read</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img class="card-img-top img-shape" src="{{asset('img/Magazine97.jpg')}}" alt="Card image cap">
                        <div class="card-body">
                            <a href="#" class="card-link">Download</a>
                            <a href="#" class="card-link">Read</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
