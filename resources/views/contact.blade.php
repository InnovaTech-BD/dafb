@extends('layouts.app')
@section('title', ' Contact us')
@section('content')
<section class="contact-page all-form">
    <div class="container">
        <h2><i class="fa fa-pencil"></i> {{__('contact.headline')}}</h2>
        <p class="text-center mb-5">{{__('contact.subtitle')}}</p>
        <div class="row">
            <div class="col-md-8 col-sm-12">
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
                @endif
                <div class="card">
                    <div class="contents">
                        <form action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.fullname')}}</div>
                                    </div>
                                    <input type="text" name="name" value="{{old('name')}}" class="form-control" id="">
                                </div>
                                <div>
                                    @error('name')
                                    <p class="danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.email')}}</div>
                                    </div>
                                    <input type="email" value="{{old('email')}}" name="email" class="form-control" id="">
                                </div>
                                <div>
                                    @error('email')
                                    <p class="danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <textarea rows="5" name="message" class="form-control" placeholder="{{__('form.message')}}">{{old('message')}}</textarea>
                                </div>
                                <div>
                                    @error('message')
                                    <p class="danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="aggree" required id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">{{__('contact.aggree')}}</label>
                            </div>
                            <button type="submit" class="btn btn-lg">{{__('form.send')}}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <h4 class="mt-5">{{__('contact.office1')}}</h4>
                <ul>
                    <li><span class="font-weight-bold">{{__('form.email')}}:</span> info@dafbangladesch.comm</li>
                    <li><span class="font-weight-bold">{{__('form.phone')}}:</span> +49 176 59853281</li>
                    <li><span class="font-weight-bold">{{__('form.address')}}:</span> 43/t/1 Indira Road, Tejgaon, Dhaka-1215</li>
                </ul>

                <h4 class="mt-5">{{__('contact.office2')}}</h4>
                <ul>
                    <li><span class="font-weight-bold">{{__('form.email')}}:</span> info@dafbangladesch.com</li>
                    <li><span class="font-weight-bold">{{__('form.phone')}}:</span> +49 176 59853281</li>
                    <li><span class="font-weight-bold">{{__('form.address')}}:</span> 43/t/1 Indira Road, Tejgaon, Dhaka-1215</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection