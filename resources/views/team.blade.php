@extends('layouts.app')
@section('title', ' Our Team')
@section('content')

<!-- it-works -->
<section class="it-works">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <h2>{{__('team.headline')}}</h2>
                <p>{{__('team.description')}}</p>
            </div>
            <div class="col-md-4 col-sm-12">
                @include('layouts.frontend.partials.category')
            </div>
        </div>
    </div>
</section>


<section class="meet-our-team">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-12">
                <h2>{{__('header.team')}}</h2>
                <h3 class="mt-5 subtitile-type">{{__('team.exceutive')}}</h3>
            </div>
            <div class="col-12">
                <div class="row">
                    @foreach ($teams as $member)
                    @if($member->type=='exceutive')
                    <div class="col-md-4 col-sm-6">
                        <div class="item">
                            <img src="{{Storage::url($member->image)}}" alt="">
                            <h3>{{$member->name[Config::get('app.locale')]}}</h3>
                            <h4>{{$member->designation[Config::get('app.locale')]}}</h4>
                            <p>{{$member->email}}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="meet-our-team">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-12">
                <h3 class="mt-5 subtitile-type">{{__('team.generale')}}</h3>
            </div>
            <div class="col-12">
                <div class="row">
                    @foreach ($teams as $member)
                    @if($member->type=='general')
                    <div class="col-md-4 col-sm-6">
                        <div class="item">
                            <img src="{{Storage::url($member->image)}}" alt="">
                            <h3>{{$member->name[Config::get('app.locale')]}}</h3>
                            <h4>{{$member->designation[Config::get('app.locale')]}}</h4>
                            <p>{{$member->email}}</p>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

@endsection