@extends('layouts.main')

@section('content')
    <div class="site-section bg-light">
        <div class="unit-5 overlay" style="background-image: url({{asset('partial/images/hero_1.jpg')}});">
            <div class="container text-center">
                <h2 class="mb-0">Post a Job</h2>
                <p class="mb-0 unit-6"><a href="/">Home</a> ><span class="sep"></span> <span>Post a Job</span></p>
            </div>
        </div>
        <div style="height: 40px;"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 mb-5">

                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif


                        <form action="{{route('Job.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            @if($errors->has('title'))
                                <div class="error" style="color: red">
                                    {{$errors->first('title')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Roles</label>
                                <input type="text" class="form-control" name="roles">
                            </div>
                            @if($errors->has('roles'))
                                <div class="error" style="color: red">
                                    {{$errors->first('roles')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            @if($errors->has('description'))
                                <div class="error" style="color: red">
                                    {{$errors->first('description')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="name" id="" class="form-control">
                                    @foreach(\App\Category::all() as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Position</label>
                                <input type="text" class="form-control" name="position">
                            </div>
                            @if($errors->has('position'))
                                <div class="error" style="color: red">
                                    {{$errors->first('position')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Type</label>
                                <select name="type" id="" class="form-control">
                                    <option value="Full time">Full time</option>
                                    <option value="Part time">Part time</option>
                                    <option value="Casual">Casual</option>
                                </select>
                            </div>
                            @if($errors->has('type'))
                                <div class="error" style="color: red">
                                    {{$errors->first('type')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option>Live</option>
                                    <option>Draft</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Job Deadline</label>
                                <input type="date" class="form-control" name="last_dates">
                            </div>
                            @if($errors->has('last_dates'))
                                <div class="error" style="color: red">
                                    {{$errors->first('last_dates')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>

                        </form>
                </div>

                <div class="col-lg-4">
                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">Contact Info</h3>
                        <p class="mb-0 font-weight-bold">Address</p>
                        <p class="mb-4">{{auth::user()->company->address}}</p>

                        <p class="mb-0 font-weight-bold">Phone</p>
                        <p class="mb-4"><a href="#">{{Auth::user()->company->phone}}</a></p>

                        <p class="mb-0 font-weight-bold">Email Address</p>
                        <p class="mb-0"><a href="#">{{auth::user()->email}}</a></p>

                    </div>

                    <div class="p-4 mb-3 bg-white">
                        <h3 class="h5 text-black mb-3">More Info</h3>
                        <p>{{auth::user()->company->description}}</p>
                        <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
