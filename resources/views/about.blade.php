@extends('layouts.app')
@section('title', ' About Us')
@section('content')
<!-- we-are -->
<section class="we-are">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-md-8">
                <h2>{{$about->headline[Config::get('app.locale')]}}</h2>
                <p>{!!$about->description[Config::get('app.locale')]!!}</p>
            </div>
            <div class="col-md-4">
                @include('layouts.frontend.partials.category')
            </div>
        </div>
    </div>
</section>

<section class="impacts">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{$about->headline2[Config::get('app.locale')]}}</h2>
                <p>{!!$about->description2[Config::get('app.locale')]!!}</p>
            </div>
        </div>
    </div>
</section>

<!-- it-works -->
<!-- we-are -->
<!-- <section class="we-are">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-md-6">
                <h2>Humanitarian Assistance:</h2>
                <p>DAfB strives to provide basic humanitarian assistance to isolated people in rural village
                    regions. During natural catastrophes, such as the flooding in Bangladesh and during
                    global pandemics, such as the COVID-19 crisis, DAfB provides relief and assistance, to the
                    most vulnerable members of society. Health camps are set-up by DAfB to bring doctors
                    and medication to villages and local communities. As arsenic is a barrier to healthy water
                    supply, we take initiatives to provide clean drinking water to the community.</p>
            </div>
            <div class="col-md-6">
                <img src="{{('images/people/item-4-1.png') }}" alt="">
            </div>
        </div>
    </div>
</section> -->

@if($about->hasGallery())

<section class="gallery">
    <div class="container wow fadeInUp">
        <h2>{{__('header.gallery')}}</h2>
        <div class="row mt-5 wow fadeInUp">
            @foreach ($about->gallery->images as $image)
            <div class="col-md-4 mb-5">
                <div class="gallery-img">
                    <a class="view-img" data-width="2048" data-height="1365"    data-fancybox="gallery" href="{{Storage::url($image->image)}}">
                        <img class="img-fluid w-100" src="{{Storage::url($image->image)}}" alt="">   
                    </a>               
                </div>
            </div>
            @endforeach
        </div> 
         <!-- ./row -->
    </div> <!-- ./container -->
</section> <!-- ./gallery -->
@endif
<!-- it-works -
<section class="it-works">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Humanitarian Assistance:</h2>
                <p>DAfB strives to provide basic humanitarian assistance to isolated people in rural village
                    regions. During natural catastrophes, such as the flooding in Bangladesh and during
                    global pandemics, such as the COVID-19 crisis, DAfB provides relief and assistance, to the
                    most vulnerable members of society. Health camps are set-up by DAfB to bring doctors
                    and medication to villages and local communities. As arsenic is a barrier to healthy water
                    supply, we take initiatives to provide clean drinking water to the community.</p>
            </div>
        </div>
    </div>
</section>

- it-works -->


<!-- transparancy -->
<!-- <section class="transparancy">
    <div class="container">
        <h2>Transparancy</h2>
        <div class="row wow fadeInUp">
            <div class="col-md-6">
                <img src="{{('images/people/item-4-1.png') }}" alt="">
            </div>
            <div class="col-md-6">
                <p>German Working Community for Bangladesh (DAfB)' is a non-profit, non-political and voluntary organization. Since 2011, our journey started as the 'Flensburger Foundation'. We are striving to promote social welfare in rural Bangladesh. German Working Community for Bangladesh (DAfB)' is a non-profit, non-political and voluntary organization. Since 2011, our journey started as the 'Flensburger Foundation. We are striving to promote social welfare in rural Bangladesh.We are striving to promote social welfare in rural Bangladesh. German Working Community for Bangladesh (DAfB)' is a non-profit, non-political and voluntary organization.</p>
            </div>
        </div>
    </div>
</section> -->

<!-- news -->
<!-- <section class="news">
    <div class="container">
        <h2>News + Media</h2>
        <div class="row wow fadeInUp">
            <div class="col-md-6">
                <img src="{{('images/people/item-4-1.png') }}" alt="">
            </div>
            <div class="col-md-6">
                <p>German Working Community for Bangladesh (DAfB)' is a non-profit, non-political and voluntary organization. Since 2011, our journey started as the 'Flensburger Foundation'. We are striving to promote social welfare in rural Bangladesh. German Working Community for Bangladesh (DAfB)' is a non-profit, non-political and voluntary organization. Since 2011, our journey started as the 'Flensburger Foundation. We are striving to promote social welfare in rural Bangladesh.We are striving to promote social welfare in rural Bangladesh. German Working Community for Bangladesh (DAfB)' is a non-profit, non-political and voluntary organization.</p>
            </div>
        </div>
    </div>
</section> -->
@push('custom_js')
<script>
    $('.view-img').fancybox({

    });
</script>
@endpush
@endsection