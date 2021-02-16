@extends('layouts.app')
@section('title', ' Partner Organization')
@section('content')

<!-- it-works -->
<section class="it-works">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Programmatic overview:</h2>
                <p>Empowerment of  ultra-poor: Ultra-poor families receive training and start-up assets like cows, goats, chicken, rickshaw or seeds and the lease for a piece of land to grow rice and vegetables. This enables the families to improve their nutrition significantly and to have sustainable access to clothing, health care and education for their children.
                    Primary education: At schools supported by NETZ girls and boys from poor families learn reading, writing and to do math - the basic skills for a brighter future.
                    Human rights: NETZ stands up for the rights of the poorest in the villages. Human rights defenders train marginalised women, minorities and landless people. They advocate for the fulfilment of human rights in Bangladesh.
                    Disaster response: NETZ provides rice, lentils, water and infant food to the poorest people in need after a disaster and promotes preventive measures..</p>
            </div>
            <div class="col-md-4">
                @include('layouts.frontend.partials.category')
            </div>
        </div>
    </div>
</section>


<section class="meet-our-partner">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-12">
                <h2>Meet our partners</h2>
            </div>
            <div class="col-12">
                <div id="partner" class="owl-carousel owl-theme">
                    <div class="item">
                        <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-1.png')}}" alt="">
                        </a>
                        <h3>Partner name</h3>
                    </div>
                    <div class="item">
                        <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-2.png')}}" alt="">
                        </a>
                        <h3>Partner name</h3>
                    </div>
                    <div class="item">
                        <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-3.png')}}" alt="">
                        </a>
                        <h3>Partner name</h3>
                    </div>
                    <div class="item">
                        <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-2.png')}}" alt="">
                        </a>
                        <h3>Partner name</h3>
                    </div>
                    <div class="item">
                        <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-1.png')}}" alt="">
                        </a>
                        <h3>Partner name</h3>
                    </div>
                    <div class="item">
                        <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-3.png')}}" alt="">
                        </a>
                        <h3>Partner name</h3>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-4">
                        <div class="item">
                            <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-1.png')}}" alt="">
                            </a>
                            <h3>Partner name</h3>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="item">
                            <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-2.png')}}" alt="">
                            </a>
                            <h3>Partner name</h3>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="item">
                            <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-3.png')}}" alt="">
                            </a>
                            <h3>Partner name</h3>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="item">
                            <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-1.png')}}" alt="">
                            </a>
                            <h3>Partner name</h3>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="item">
                            <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-2.png')}}" alt="">
                            </a>
                            <h3>Partner name</h3>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="item">
                            <a href="{{ route('home') }}">
                            <img src="{{('images/org/item-3.png')}}" alt="">
                            </a>
                            <h3>Partner name</h3>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</section>

@endsection