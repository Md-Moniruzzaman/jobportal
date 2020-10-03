@extends('layouts.main')

@section('content')
    <div style="height: 60px;"></div>
    <div class="container">
        <div class="row">
                <div class="col-md-3">

                    @if(empty(Auth::user()->profile->avatar))
                        <img style="border-radius: 50px; width: 100%" src="{{asset('avatar/man.jpg')}}" width="100px" alt="">
                    @else
                        <img style="border-radius: 50px; width: 100%" src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100px" alt="">

                    @endif


                    <div class="card">
                        <form enctype="multipart/form-data" action="{{route('Profile.avatar')}}" method="post">
                            @csrf
                            {{--                        <div class="card-header">Update your cover letter</div>--}}
                            <div class="card-body">
                                <h4>Update your profile picture</h4>
                                <input type="file" class="form-control" name="avatar"><br>
                                <button class="btn btn-success" type="submit">Upload</button>
                            </div>
                        </form>
                        @if($errors->has('avatar'))
                            <div class="error" style="color: red">
                                {{$errors->first('avatar')}}
                            </div>
                         @endif

                    </div>

                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">Update your short info</div>

                            <div class="card-body">
                                <form action="{{route('Profile.store')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="address" id="" class="form-control" cols="30" rows="5">{{auth()->user()->profile->address}}</textarea>
                                    </div>
                                    @if($errors->has('address'))
                                        <div class="error" style="color: red">
                                            {{$errors->first('address')}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" value="{{Auth::user()->profile->phone_number}}">
                                    </div>
                                    @if($errors->has('phone_number'))
                                        <div class="error" style="color: red">
                                            {{$errors->first('phone_number')}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="">Experience</label>
                                        <textarea name="experience" id="" class="form-control" cols="30" rows="5">{{auth()->user()->profile->experience}}</textarea>
                                    </div>
                                    @if($errors->has('experience'))
                                        <div class="error" style="color: red">
                                            {{$errors->first('experience')}}
                                        </div>
                                     @endif
                                    <div class="form-group">
                                        <label for="">BIODATA</label>
                                        <textarea name="bio" id="" class="form-control" cols="30" rows="5">{{auth()->user()->profile->bio}}</textarea>
                                    </div>
                                    @if($errors->has('bio'))
                                        <div class="error" style="color: red">
                                            {{$errors->first('bio')}}
                                        </div>
                                     @endif
                                    <div>
                                        <button class="btn btn-success" type="submit">Submit</button>
                                    </div>
                                    <br>
                                    <br>
                                    @if(Session::has('massage'))
                                        <div class="alert alert-success">
                                            {{Session::get('massage')}}
                                        </div>
                                    @endif
                                </form>
                            </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">User Details</div>
                            <div class="card-body">
                               <p> Name: {{auth::user()->name}}</p>
                               <p> Email: {{auth::user()->email}}</p>
                               <p> Address: {{auth::user()->profile->address}}</p>
                               <p> Phone Number: {{Auth::user()->profile->phone_number}}</p>
                               <p> Experience: {{auth::user()->profile->experience}}</p>
                               <p> BIO: {{auth::user()->profile->bio}}</p>
                               <p> Member since: {{date('F d Y', strtotime(auth::user()->profile->created_at) )}}</p>
                                @if(!empty(auth::user()->profile->cover_letter))
                                <p>
                                    <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Cover Letter</a>
                                </p>
                                @else
                                    <p>Please upload  your Cover letter </p>
                                @endif
                                @if(!empty(auth::user()->profile->resume))
                                    <p>
                                        <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Resume</a>
                                    </p>
                                @else
                                    <p>Please upload  your resume </p>
                                @endif
                            </div>

                    </div>
                    <div class="card">
                        <form enctype="multipart/form-data" action="{{route('Profile.coverletter')}}" method="post">
                            @csrf
{{--                        <div class="card-header">Update your cover letter</div>--}}
                            <div class="card-body">
                                <h4>Update your cover letter</h4>
                                <input type="file" class="form-control" name="cover_letter"><br>
                                <button class="btn btn-success" type="submit">Upload</button>
                            </div>
                        </form>
                        @if($errors->has('cover_letter'))
                            <div class="error" style="color: red">
                                {{$errors->first('cover_letter')}}
                            </div>
                        @endif

                    </div>
                    <div class="card">
                        <form enctype="multipart/form-data" action="{{route('Profile.resume')}}" method="post">
                            @csrf
{{--                        <div class="card-header">Update your resume</div>--}}
                            <div class="card-body">
                                <h4>Update your resume</h4>
                                <input type="file" class="form-control" name="resume"><br>
                                <button class="btn btn-success" type="submit">Upload</button>
                            </div>
                        </form>
                        @if($errors->has('resume'))
                            <div class="error" style="color:red;">
                                {{$errors->first('resume')}}
                            </div>
                        @endif


                    </div>
                </div>
                </div>
        </div>
    </div>
    <div style="height: 60px;"></div>
@endsection

