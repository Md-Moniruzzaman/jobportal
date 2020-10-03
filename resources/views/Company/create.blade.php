@extends('layouts.main')

@section('content')
    <div class="container">
        <div style="height: 60px;"></div>
        <div class="row">
            <div class="col-md-3">

                @if(empty(Auth::user()->company->logo))
                    <img style="border-radius: 50px; width: 100%" src="{{asset('avatar/man.jpg')}}" width="100px" alt="">
                @else
                    <img style="border-radius: 50px; width: 100%" src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100px" alt="">

                @endif

                <div class="card">
                    <form enctype="multipart/form-data" action="{{route('Company.logo')}}" method="post">
                        @csrf
                        {{--                        <div class="card-header">Update your cover letter</div>--}}
                        <div class="card-body">
                            <h4>Change your Company logo</h4>
                            <input type="file" class="form-control" name="logo"><br>
                            <button class="btn btn-success" type="submit">Upload</button>
                        </div>
                    </form>
                    @if($errors->has('logo'))
                        <div class="error" style="color: red">
                            {{$errors->first('logo')}}
                        </div>
                    @endif

                </div>

            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Upload your company information</div>

                    <div class="card-body">
                        <form action="{{route('Company.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" id="" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Number</label>
                                <input type="text" class="form-control" name="phone" value="">
                            </div>
                            @if($errors->has('phone'))
                                <div class="error" style="color: red">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" class="form-control" name="website" value="">
                            </div>
                            @if($errors->has('website'))
                                <div class="error" style="color: red">
                                    {{$errors->first('website')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" class="form-control" name="slogan" value="">
                            </div>
                            @if($errors->has('slogan'))
                                <div class="error" style="color: red">
                                    {{$errors->first('slogan')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" class="form-control" cols="30" rows="5"></textarea>
                            </div>
                            @if($errors->has('description'))
                                <div class="error" style="color: red">
                                    {{$errors->first('description')}}
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
                        <p> <b>Company Name:</b> {{auth::user()->company->cname}}</p>
                        <p> <b>Email: </b>{{auth::user()->email}}</p>
                        <p> <b>Address: </b>{{auth::user()->company->address}}</p>
                        <p> <b>Phone Number: </b>{{Auth::user()->company->phone}}</p>
                        <p> <b>Website: </b>{{auth::user()->company->website}}</p>
                        <p> <b>Company View: </b>
                            <a href="Company/{{auth::user()->company->slug}}">View</a>
                        </p>
                        <p> <b>Slogan:</b> {{auth::user()->company->slogan}}</p>
                        <p><b> Member since:</b> {{date('F d Y', strtotime(auth::user()->company->created_at) )}}</p>
                        @if(!empty(auth::user()->company->cover_photo))
                            <p>
                                <a href="{{Storage::url(Auth::user()->company->cover_photo)}}">Cover photo</a>
                            </p>
                        @else
                            <p>Please upload  your Cover photo </p>
                        @endif

                    </div>
                    <div class="card">
                        <form enctype="multipart/form-data" action="{{route('Company.coverPhoto')}}" method="post">
                            @csrf
                            {{--                        <div class="card-header">Update your cover letter</div>--}}
                            <div class="card-body">
                                <h4>Update your cover photo</h4>
                                <input type="file" class="form-control" name="cover_photo"><br>
                                <button class="btn btn-success" type="submit">Upload</button>
                            </div>
                        </form>
                        @if($errors->has('cover_photo'))
                            <div class="error" style="color: red">
                                {{$errors->first('cover_photo')}}
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div style="height: 60px;"></div>
@endsection

