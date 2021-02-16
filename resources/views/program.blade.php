@extends('layouts.app')
@section('title', ' Program')
@section('content')
<section class="main-program">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-8 wow fadeInUp">
                <div class="row">
                    <div class="col-12">
                        <h2>{{$program->headline[Config::get('app.locale')]}}</h2>
                        <div class="row mb-5">
                            <div class="col-12">
                                @if($program->hasSlider())
                                <div id="programSlider" class="owl-carousel owl-theme">
                                    @foreach ($program->slider->images as $image)
                                        <div class="item">
                                            <div class="row d-flex align-items-center">                                                
                                                <div class="col-md-7">
                                                    <img class="img-fluid" src="{{Storage::url($image->image)}}" alt="">
                                                </div>
                                                <div class="col-md-5 pr-5">
                                                    <p>{{$image->desc[Config::get('app.locale')]}}</p>
                                                </div>                                                      
                                            </div>
                                        </div>
                                    @endforeach 
                                </div>
                                @else
                                <img class="img-fluid w-100" src="{{Storage::url($program->image)}}" alt="">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {!! $program->description[Config::get('app.locale')]!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.frontend.partials.programs')
            </div>
        </div>
        @if($program->hasGallery())
        <h2 class="mt-4">{{__('header.gallery')}}</h2>
        <div class="row mt-5 wow fadeInUp">
            @foreach ($program->gallery->images as $image)
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
