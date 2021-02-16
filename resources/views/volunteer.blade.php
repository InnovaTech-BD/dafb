@extends('layouts.app')
@section('title')
Volunteer
@endsection
@section('content')
<section class="volunteer-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="{{asset('images/people/volunteers.jpg')}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>{{__('volunteer.title')}}</h2>
                <p>{{__('volunteer.desc')}}</p>
            </div>
        </div>
        <div class="row all-form">
            <div class="col-md-10 offset-md-1 col-sm-12 offset-sm-0">
                <div class="card">
                    @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                    @endif
                    <div class="contents">
                        <form class="py-5" action="{{route('volunteers.store')}}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-group col-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.fullname')}}*</div>
                                        </div>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control @error('name')is-invalid @enderror" id="">
                                    </div>
                                    <div>
                                        @error('name')
                                        <p class="errors_mesg">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.house')}}</div>
                                        </div>
                                        <input type="text" name="house" value="{{old('house')}}" class="form-control" id="" >
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.road')}}</div>
                                        </div>
                                        <input type="text" name="street" value="{{old('street')}}" class="form-control" id="" >
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-lg-4">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.postal')}}*</div>
                                        </div>
                                        <input type="text" name="postal_code" value="{{old('postal_code')}}" class="form-control @error('postal_code')is-invalid @enderror" id="" >
                                    </div>
                                    <div>
                                        @error('postal_code')
                                        <p class="danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.city')}}*</div>
                                        </div>
                                        <input type="text" name="city" value="{{old('city')}}" class="form-control @error('city')is-invalid @enderror" id="" >
                                    </div>
                                    <div>
                                        @error('city')
                                        <p class="danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.country')}}*</div>
                                        </div>
                                        <input type="text" name="country" value="{{old('country')}}" class="form-control @error('country')is-invalid @enderror" id="" >
                                    </div>
                                    <div>
                                        @error('country')
                                        <p class="danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.age')}}*</div>
                                        </div>
                                        <input type="text" name="age" value="{{old('age')}}" class="form-control @error('age')is-invalid @enderror" id="" >
                                    </div>
                                    <div>
                                        @error('age')
                                        <p class="danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.gender')}}*</div>
                                        </div>
                                        <select id="inputState" name="gender" value="{{old('gender')}}" class="form-control @error('gender')is-invalid @enderror">
                                            <option selected>{{__('form.male')}}</option>
                                            <option>{{__('form.female')}}</option>
                                        </select>
                                    </div>
                                    <div>
                                        @error('gender')
                                        <p class="danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.phone')}}*</div>
                                        </div>
                                        <input type="text" name="contact" value="{{old('contact')}}" class="form-control @error('contact')is-invalid @enderror" id="" >
                                    </div>
                                    <div>
                                        @error('contact')
                                        <p class="danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-12 col-lg-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.email')}}*</div>
                                        </div>
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email')is-invalid @enderror" id="" >
                                    </div>
                                    <div>
                                        @error('email')
                                        <p class="danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-lg mx-auto">{{__('share.apply')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection