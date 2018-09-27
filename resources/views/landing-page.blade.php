@extends('layouts.master')

@section('content')

    <div id="carouselExampleControls" class="carousel slide mb-4" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item img-shape active" style="background-image: url({{asset('img/Magazine97.jpg')}});">
            </div>
            <div class="carousel-item img-shape" style="background-image: url({{asset('img/abo.jpg')}});">
            </div>
            <div class="carousel-item img-shape" style="background-image: url({{asset('img/Magazine97.jpg')}});">
            </div>
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


            <h1 class="text-center">Issues</h1>
            <div class="row section-2">
                <div class="col-lg-4 col-md-4 col-sm-12 item">
                    <img src="{{asset('img/Magazine97.jpg')}}" class="img-fluid img-shape" alt="team">
                    <div class="des">
                        Magazine Title 1
                    </div>
                    <a href="#">Download</a> |
                    <a href="#">Read</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 item">
                    <img src="{{asset('img/Magazine97.jpg')}}" class="img-fluid img-shape" alt="team">
                    <div class="des">
                        Magazine Title 2
                    </div>
                    <a href="#">Download</a> |
                    <a href="#">Read</a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 item">
                    <img src="{{asset('img/Magazine97.jpg')}}" class="img-fluid img-shape" alt="team">
                    <div class="des">
                        Magazine Title 3
                    </div>
                    <a href="#">Download</a> |
                    <a href="#">Read</a>
                </div>
            </div>

        </div>
    </div>

@endsection
