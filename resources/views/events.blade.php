@extends('layouts.app')
@section('title', 'Event')
@section('content')
<section class="event-area">
    <div class="container">
        <h2>{{__('share.events')}}</h2>
        <div class="row">
            @foreach ($events as $event)
            <div class="col-md-6 col-sm-6">
                <div class="card wow fadeInUp">
                <img src="{{Storage::url($event->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$event->headline[Config::get('app.locale')]}}</h5>
                    <a href="{{route('events.show',$event->slug)}}">Explore {{$event->headline[Config::get('app.locale')]}} <i class="fa fa-chevron-right"></i></a>
                </div>
                </div>
            </div>
            @endforeach
            <!-- single-col -->
            


        </div>
    </div>
</section>
@endsection