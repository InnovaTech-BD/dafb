@extends('layouts.app')

@section('title')
Scholarship
@endsection   
@section('content')

<section class="scholarship-page all-form">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img style="width: 100%; height: 400px;" src="{{asset('images/people/scholarship.jpg')}}" alt="">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <p class="mt-5">{{__('scholarship.description')}}</p>
            </div>
        </div>

        <h2 class="mt-5">{{__('scholarship.headline')}}</h2>
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="contents">
                        <form action="{{route('scholarship.store')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.firstname')}}</div>
                                        </div>
                                        <input type="text" value="{{old('firstname')}}" name="firstname" class="form-control" id="" >
                                    </div>
                                    <div>
                                        @error('firstname')
                                        <p class="errors_mesg">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.lastname')}}</div>
                                        </div>
                                        <input type="text" value="{{old('lastname')}}" name="lastname" class="form-control" id="" >
                                    </div>
                                    <div>
                                        @error('lastname')
                                        <p class="errors_mesg">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.gender')}}</div>
                                    </div>
                                    <select name="gender" id="inputState" class="form-control">
                                        <option selected>{{__('form.male')}}</option>
                                        <option>{{__('form.female')}}</option>
                                    </select>
                                </div>
                                <div>
                                    @error('lastname')
                                    <p class="errors_mesg">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.father')}}</div>
                                    </div>
                                    <input type="text" value="{{old('fathers')}}" name="fathers" class="form-control" id="">
                                </div>
                                <div>
                                    @error('fathers')
                                    <p class="errors_mesg">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.address')}}</div>
                                    </div>
                                    <input type="text" value="{{old('address')}}" name="address" class="form-control" id="" >
                                </div>
                                <div>
                                    @error('address')
                                    <p class="errors_mesg">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.postal')}}</div>
                                    </div>
                                    <input type="text" value="{{old('postal')}}" name="postal" class="form-control" id="">
                                </div>
                                <div>
                                    @error('postal')
                                    <p class="errors_mesg">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.phone')}}</div>
                                        </div>
                                        <input type="text" value="{{old('phone')}}" name="phone" class="form-control" id="">
                                    </div>
                                </div>
                                <div>
                                    @error('phone')
                                    <p class="errors_mesg">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">{{__('form.sphone')}}</div>
                                        </div>
                                        <input type="text" value="{{old('schoolphone')}}" name="schoolphone" class="form-control" id="" >
                                    </div>
                                </div>
                                <div>
                                    @error('schoolphone')
                                    <p class="errors_mesg">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.email')}}</div>
                                    </div>
                                    <input type="text" value="{{old('email')}}" name="email" class="form-control" id="">
                                </div>
                            </div>
                            <div>
                                @error('email')
                                <p class="errors_mesg">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.school')}}/{{__('form.college')}}</div>
                                    </div>
                                    <input type="text" value="{{old('schoolname')}}" name="schoolname" class="form-control" id="" >
                                </div>
                            </div>
                            <div>
                                @error('schoolname')
                                <p class="errors_mesg">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.attending')}}</div>
                                    </div>
                                    <input type="text" value="{{old('schoolrole')}}" name="schoolrole" class="form-control" id="" >
                                </div>
                                <div>
                                    @error('schoolrole')
                                    <p class="errors_mesg">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{__('form.gpa')}}</div>
                                    </div>
                                    <input type="text" value="{{old('grade')}}" name="grade" class="form-control" id="">
                                </div>
                                <div>
                                    @error('grade')
                                    <p class="errors_mesg">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-lg">{{__('share.apply')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection