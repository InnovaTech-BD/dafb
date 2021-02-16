@extends('layouts.app')
@section('title', ' event')
@section('content')
<section class="main-event">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 wow fadeInUp">
                <div class="row">
                    <div class="col-12">
                        <h2>{{$event->headline[Config::get('app.locale')]}}</h2>
                        <div class="row mb-5">
                            <div class="col-12">
                                @if($event->hasSlider())
                                <div id="programSlider" class="owl-carousel owl-theme">
                                    @foreach ($event->slider->images as $image)
                                        <div class="item">
                                            <div class="row d-flex align-items-center">                                                
                                                <div class="col-md-7">
                                                    <img class="img-fluid" src="{{Storage::url($image->image)}}" alt="">
                                                </div>
                                                <div class="col-md-5 pr-5">
                                                    <p>{{$image->desc}}</p>
                                                </div>                                                      
                                            </div>
                                        </div>
                                    @endforeach 
                                </div>
                                @else
                                <img class="img-fluid w-100" src="{{Storage::url($event->image)}}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {!! $event->description[Config::get('app.locale')]!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.frontend.partials.events')
            </div>
        </div>
        @if($event->hasGallery())
        <h2 class="mt-4">{{__('header.gallery')}}</h2>
        <div class="row mt-5 wow fadeInUp">
            @foreach ($event->gallery->images as $image)
            <div class="col-md-4 mb-5">
                <div class="gallery-img">
                    <a class="view-img" data-width="2048" data-height="1365"    data-fancybox="gallery" href="{{Storage::url($image->image)}}">
                        <img class="img-fluid w-100" src="{{Storage::url($image->image)}}" alt="">   
                    </a>               
                </div>
            </div>  
            @endforeach
        </div> <!-- ./row -->
        @endif
    </div>
</section>

@endsection
