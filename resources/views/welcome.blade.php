@extends('layouts.app')
@section('title', 'DAfB')
@section('content')
<!-- start-banner-area -->
<section class="banner-area text-center">
    <div class="bgclr-banner">
        <div class="container wow fadeInUp">
            <h1>{{__('banner.desc1')}}</h1>
            <a href="{{ route('about') }}" class="btn btn-lg btn-danger">{{__('share.more')}}</a>
        </div>
    </div>
</section>
<!-- end-banner-area -->

<!-- start-scholarship-area 
<div class="scholarship wow fadeInUp">
    <div class="scholarship-blr">
        <div class="container">
            <a href="{{ route('scholarship') }}" class="btn btn-lg text-white">Apply for Scholarship</a>
        </div>
    </div>
</div>
end-scholarship-area -->
<!-- start-people-area -->
<section class="people-area">
    <div class="container">
        <h2>{{__('home.areas')}}</h2>
        <div class="row wow fadeInUp">
        @foreach($areas as $area)
        <div class="area-box">
                <img style="width:200px;height:200px;" src="{{Storage::url($area->image)}}" alt="">
                <h6>{{$area->headline[Config::get('app.locale')]}}</h6>
            </div>
        @endforeach
        </div>
    </div>
</section>
<!-- start-about-us-area --
<div class="about-us wow fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>About Us</h2>
                <p>German Working Community for Bangladesh (DAfB)' is a non-profit, non-political and voluntary organization. Since 2011, our journey started as the 'Flensburger Foundation'. We are striving to promote social welfare in rural Bangladesh. German Working Community for Bangladesh (DAfB)' is a non-profit, non-political and voluntary organization. Since 2011, our journey started as the 'Flensburger Foundation. We are striving to promote social welfare in rural Bangladesh.</p>
            </div>
            <div class="col-md-6 text-center bg">
                <div class="bg-blr">
                    <div class="content">
                        <h3>We are Awesome <span class="font-weight-bold">Volunteer</span> Team</h3>
                        <a href="{{ route('volunteer') }}" class="btn">Become a volunteer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
!-- end-about-us-area -->

<!-- start-we-did-area -->



<section class="press">
    <div class="container">
        <h2>{{__('home.recent')}}</h2>
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial" class="slider">
                    <div id="press-slide" class="owl-carousel owl-theme wow fadeInUp" data-wow-delay="1s">
                        <!-- item -->
                        @foreach ($projects as $program)
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{Storage::url($program->image)}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>{{$program->headline[Config::get('app.locale')]}}</h3>
                                </div>
                                <div class="description">
                                    <p>{!! Str::limit($program->description[Config::get('app.locale')],100) !!}</p>
                                </div>
                                <div class="details">
                                    <a href="{{ route('program.show',$program->slug) }}">
                                    <button type="submit" class="btn btn-sm">{{__('share.details')}}</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- start-happy-faces-area -->
<section class="happy-faces">
    <div class="container">
        <h2>{{__('home.faces')}}</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="slider">
                    <div id="happy" class="owl-carousel owl-theme wow fadeInUp" data-wow-delay="1s">
                       @foreach ($faces as $face)
                       <div class="item">
                        <div class="happy-item">
                            <img src="{{Storage::url($face->image)}}" alt="">
                            <div class="content">
                                <q class="queet d-block">{{ $face->description[Config::get('app.locale')] }}</q>
                            </div>
                        </div>
                    </div> 
                       @endforeach
                    </div>
                </div>
                <!-- <div class="item">
                    <img src="{{('images/people/item-7.png')}}" alt="">
                </div>
                <div class="item">
                    <q>During the winter season the village can become very frosty. These
                        winter clothes keep us warm during the night.</q>
                </div>
                <div class="item">
                    <img src="{{('images/people/item-8.png')}}" alt="">
                </div>
                <div class="item">
                    <q class="queet d-block">Education has always been my passion. The annual DAfB scholarship is a
                        great opportunity to challenge myself and rise beyond my horizons.</q>
                    <q class="queet d-block mt-2">() This first aid training</q>
                </div> -->
            </div>
        </div>
    </div>
</section>
<!-- start-Founding-members-area --
<section class="founding-members">
    <div class="container">
        <h2>Exceutive Committee and General Assembly</h2>
        <div class="row">
            <div class="col-12">
                <div id="testimonial" class="slider">
                    <div class="caro-2 owl-theme wow fadeInUp" data-wow-delay="1s">
                        !-- item --
                        <div class="item">
                            <div class="testimonial-item-2">
                                <div class="img-thumb">
                                    <img src="{{('images/people/aa.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Mohammed Shamsul Arifin</h3>
                                    <span>Chairman</span>
                                </div>
                            </div>
                        </div>
                       
                       
                        <div class="item">
                            <div class="testimonial-item-2">
                                <div class="img-thumb">
                                    <img src="{{('images/people/aa.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Jibun Naher Mukta</h3>
                                    <span>Vice-Chairman</span>
                                </div>
                            </div>
                        </div>
                  
                        <div class="item">
                            <div class="testimonial-item-2">
                                <div class="img-thumb">
                                    <img src="{{('images/people/aa.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Kanis Fatama Fatiha Jabin</h3>
                                    <span>Treseaurer</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="testimonial-item-2">
                                <div class="img-thumb">
                                    <img src="{{('images/people/aa.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Dr. Rainer Gerke</h3>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                       
                        <div class="item">
                            <div class="testimonial-item-2">
                                <div class="img-thumb">
                                    <img src="{{('images/people/aa.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Martin Gerke</h3>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                       
                        <div class="item">
                            <div class="testimonial-item-2">
                                <div class="img-thumb">
                                    <img src="{{('images/people/aa.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Dr. Faruque A. Hoalader</h3>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                       
                        <div class="item">
                            <div class="testimonial-item-2">
                                <div class="img-thumb">
                                    <img src="{{('images/people/aa.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Rujmila Khondaker</h3>
                                    <span></span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->

<!-- start-press-area 
<section class="press">
    <div class="container">
        <h2>Press</h2>
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial" class="slider">
                    <div class="owl-carousel owl-theme wow fadeInUp" data-wow-delay="1s">
                        - item --
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/people/item-10.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Post Title </h3>
                                </div>
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                                <div class="details">
                                    <button type="submit" class="btn btn-sm">Details</button>
                                </div>
                            </div>
                        </div>
                       item -
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/people/item-11.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Post Title </h3>
                                </div>
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                                <div class="details">
                                    <button type="submit" class="btn btn-sm">Details</button>
                                </div>
                            </div>
                        </div>
                     
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/people/item-10.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Post Title </h3>
                                </div>
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                                <div class="details">
                                    <button type="submit" class="btn btn-sm">Details</button>
                                </div>
                            </div>
                        </div>
                    
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/people/item-11.png')}}" alt="">
                                </div>
                                <div class="info">
                                    <h3>Post Title </h3>
                                </div>
                                <div class="description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                                <div class="details">
                                    <button type="submit" class="btn btn-sm">Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->

<!-- start-organizations 
<section class="org">
    <div class="container">
        <h2>Partner organization</h2>
        <div class="row">
            <div class="col-12">
                <div id="testimonial" class="slider">
                    <div class="caro-3 owl-theme wow fadeInUp" data-wow-delay="1s">
                       
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/org/item-1.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                       
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/org/item-2.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/org/item-3.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/org/item-2.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/org/item-1.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                        
                        <div class="item">
                            <div class="testimonial-item">
                                <div class="img-thumb">
                                    <img src="{{('images/org/item-3.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>-->
@if(App\Models\UpcomingEvents::all()->first()!=null)
<section class="we-did-area py-5">
    <div class="container">
        <h2>{{__('home.upcoming')}}</h2>
        <!--
        <div class="row wow fadeInUp">
            <div class="col-4">
                <h5>Helped Family</h5>
                <span class="m-0">20+</span>
            </div>
            <div class="col-4">
                <h5>Ensure Child Education</h5>
                <span>40+</span>
            </div>
            <div class="col-4">
                <h5>Scholarship Provided</h5>
                <span>5+</span>
            </div>
        </div>-->
        <div class="event-wrapper">
            <div class="row">
                <div class="col-md-6">
                    <div class="upcoming mb-3 mb-md-0">
                        <div class="card card-body p-0">
                            <img class="img-fluid" src="{{Storage::url(App\Models\UpcomingEvents::orderBy('date','asc')->first()->image)}}" alt="">
                        </div>
                        <div class="content">
                            <div class="date">
                                <p>{{App\Models\UpcomingEvents::orderBy('date')->first()->date}}</p>
                            </div>
                            <div class="heading">
                                <h2>{{App\Models\UpcomingEvents::latest('date')->first()->headline[Config::get('app.locale')]}}</h2>
                                <p>{{Str::limit(App\Models\UpcomingEvents::latest('date')->first()->description[Config::get('app.locale')]),150}}</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- ./col -->
                <div class="col-md-6">
                    <div class="slider pb-5">
                        <div id="events" class="owl-carousel owl-theme wow fadeInUp" data-wow-delay="1s">
                            @for($i=0;$i<=count($upcomingEvents);$i+=2)
                            <div class="item">
                                @isset($upcomingEvents[$i])
                                <div class="row mx-0 mb-3 d-flex align-items-start justify-content-between">
                                    <div class="left mb-3 mb-lg-0 mt-1">
                                        <div class="location-time">
                                            <span>{{\Carbon\Carbon::parse($upcomingEvents[$i]['date'])->format('d')}}</span>
                                            <span>{{\Carbon\Carbon::parse($upcomingEvents[$i]['date'])->format('m-y')}}</span>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="info">
                                            <h3>{{$upcomingEvents[$i]['headline'][Config::get('app.locale')]}}</h3>
                                        </div>
                                        <div class="description">
                                            <p>{{Str::limit($upcomingEvents[$i]['description'][Config::get('app.locale')],100)}}</p>
                                            <p>Location: {{$upcomingEvents[$i]['location'][Config::get('app.locale')]}}</p>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @isset($upcomingEvents[$i+1])
                                <div class="row mx-0 mb-3 d-flex align-items-start justify-content-between">
                                    <div class="left mb-3 mb-lg-0 mt-1">
                                        <div class="location-time">
                                            <span>{{\Carbon\Carbon::parse($upcomingEvents[$i+1]['date'])->format('d')}}</span>
                                            <span>{{\Carbon\Carbon::parse($upcomingEvents[$i+1]['date'])->format('m-y')}}</span>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="info">
                                            <h3>{{$upcomingEvents[$i+1]['headline'][Config::get('app.locale')]}}</h3>
                                        </div>
                                        <div class="description">
                                            <p>{{Str::limit($upcomingEvents[$i+1]['description'][Config::get('app.locale')],100)}}</p>
                                            <p>Location: {{$upcomingEvents[$i+1]['location'][Config::get('app.locale')]}}</p>
                                        </div>
                                    </div>
                                </div>
                                
                            </div> <!-- ./item-1 -->
                            @endif
                            @if(!isset($upcomingEvents[$i+2]))
                            @break
                            @endif
                            @endfor()                           
                        </div>
                    </div>
                </div> <!-- ./col -->
            </div>
        </div> <!-- ./event-wrapper-->
    </div>
</section> 
@endif
@endsection