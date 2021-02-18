@extends('layouts.app')
@section('title') 
Report
@endsection
@section('content')

<!-- it-works -->
<section class="it-works">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h2>Report</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam, non!</p>
                <div>
                <object data="#" type="application/pdf" width="100%" height="500">
                    <iframe src="#" width="100%" height="100%" style="border: none;">
                    This browser does not support PDFs. Please download the PDF to view it: 
                    <a href="#">Download PDF</a>
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
                <p>Bottom description/p>
            </div>
        </div>
    </div>
</section>


@endsection