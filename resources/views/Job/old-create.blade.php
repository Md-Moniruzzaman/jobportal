@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Job Post</div>

                    <div class="card-body">
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
                </div>
            </div>
        </div>
    </div>
@endsection
