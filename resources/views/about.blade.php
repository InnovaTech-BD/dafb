@extends('layouts.app')
@section('title', ' About Us')
@section('content')
<!-- we-are -->
<section class="we-are">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-md-8">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consequatur neque corporis, odio eos libero dolorum aspernatur exercitationem facilis impedit perspiciatis culpa reiciendis officia possimus dolor minima dolore. Molestias eligendi veniam dolor dicta asperiores nam consequatur cumque recusandae quasi. Ex nemo consectetur quibusdam cupiditate nostrum aperiam dolorem aspernatur, mollitia iusto vitae?</p>
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
                <h2>Heading 2</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia facere modi perferendis expedita dolores corporis quisquam commodi deleniti voluptate iure, unde, facilis cupiditate aperiam nam, quos omnis sequi sunt eius?</p>
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
                
            </div>
        </div>
    </div>
</section> -->



<section class="gallery">
    <div class="container wow fadeInUp">
        <h2>Gallery</h2>
        <div class="row mt-5 wow fadeInUp">
            
            <div class="col-md-4 mb-5">
                <div class="gallery-img">
                    <a class="view-img" data-width="2048" data-height="1365"    data-fancybox="gallery" href="#">
                        <img class="img-fluid w-100" src="#" alt="">   
                    </a>               
                </div>
            </div>
            
        </div> 
         <!-- ./row -->
    </div> <!-- ./container -->
</section> <!-- ./gallery -->

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