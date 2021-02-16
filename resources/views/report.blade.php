@extends('layouts.app')
@section('title') 
{{$report->type}}
@endsection
@section('content')

<!-- it-works -->
<section class="it-works">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>{{$report->headline[Config::get('app.locale')]}}</h2>
                <p>{{$report->description[Config::get('app.locale')]}}</p>
                <div>
                <object data="{{Storage::url($report->file) }}#page=2" type="application/pdf" width="100%" height="500">
                    <iframe src="{{ asset('assets/pdf/sample.pdf') }}#page=2" width="100%" height="100%" style="border: none;">
                    This browser does not support PDFs. Please download the PDF to view it: 
                    <a href="{{Storage::url($report->file) }}">Download PDF</a>
                    </iframe>
                </object>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.frontend.partials.category')
            </div>
        </div>
    </div>
</section>

<!-- it-works -->
<section class="it-works">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p>{{$report->buttom_desc[Config::get('app.locale')]}}</p>
            </div>
        </div>
    </div>
</section>


@endsection