@extends('layouts.app')
@section('title', ' Program')
@section('content')

<section class="gallery pt-5">
    <div class="container wow fadeInUp">
        <h2>Gallery</h2>
        <div class="row mt-5 wow fadeInUp">
            <div class="col-md-4 mb-5">
                <div class="gallery-img">
                    <a class="view-img" data-width="2048" data-height="1365"    data-fancybox="gallery" href="https://www.brac.net/program/wp-content/uploads/2018/08/BRAC-Briefing-TUP.jpg">
                        <img class="img-fluid w-100" src="https://www.brac.net/program/wp-content/uploads/2018/08/BRAC-Briefing-TUP.jpg" alt="">   
                    </a>               
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="gallery-img">
                    <a class="view-img" data-width="2048" data-height="1365"   data-fancybox="gallery" href="{{asset('images/people/item-11.png')}}">
                        <img class="img-fluid w-100" src="{{asset('images/people/item-11.png')}}" alt="">   
                    </a>                
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="gallery-img">
                    <a class="view-img" data-width="2048" data-height="1365"   data-fancybox="gallery" href="{{asset('images/people/item-12.png')}}">
                        <img class="img-fluid w-100" src="{{asset('images/people/item-12.png')}}" alt="">   
                    </a>                
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="gallery-img">
                    <a class="view-img" data-width="2048" data-height="1365"    data-fancybox="gallery" href="{{asset('images/people/item-10.png')}}">
                        <img class="img-fluid w-100" src="{{asset('images/people/item-10.png')}}" alt="">   
                    </a>                
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="gallery-img">
                    <a class="view-img" data-width="2048" data-height="1365"   data-fancybox="gallery" href="{{asset('images/people/item-11.png')}}">
                        <img class="img-fluid w-100" src="{{asset('images/people/item-11.png')}}" alt="">   
                    </a>                
                </div>
            </div>
            <div class="col-md-4 mb-5">
                <div class="gallery-img">
                    <a class="view-img" data-width="2048" data-height="1365"   data-fancybox="gallery" href="{{asset('images/people/item-12.png')}}">
                        <img class="img-fluid w-100" src="{{asset('images/people/item-12.png')}}" alt="">   
                    </a>                
                </div>
            </div>
        </div> <!-- ./row -->
    </div> <!-- ./container -->
</section> <!-- ./gallery -->

@endsection
