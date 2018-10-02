@extends('layouts.master')

@section('content')

    <contact-us inline-template>
        <div id="contact" class="contact-form">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <h1>Get in Touch</h1>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-12 right">
                            <div class="form-group">
                                <label> Name: </label>
                                <input type="text" class="form-control form-control-lg" placeholder="Your Name" v-model="contact.name">
                            </div>
                            <div class="form-group">
                                <label> Email: </label>
                                    <input type="email" class="form-control form-control-lg" placeholder="YourEmail@email.com"
                                           v-model="contact.email">
                            </div>
                            <div class="form-group">
                                <label >Message: </label>
                                <textarea class="form-control form-control-lg" v-model="contact.message"></textarea>
                            </div>
                            <button @click="AddContact" class="btn btn-secondary btn-block">Send</button>
                            {{--<input type="button"  class="btn btn-secondary btn-block" value="Send">--}}
                        </div>
                    </div>
            </div>
        </div>

    </contact-us>


@endsection