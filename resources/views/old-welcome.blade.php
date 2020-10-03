@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Recent Jobs</h1><br>
{{--            <form action="" method="">--}}
{{--                <div class="form-inline">--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Keyword &nbsp;&nbsp;</label>--}}
{{--                        <input type="text" name="title" class="form-control">--}}
{{--                    </div>&nbsp;&nbsp;--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Employment type &nbsp;&nbsp;</label>--}}
{{--                        <select name="type" id="" class="form-control">--}}
{{--                            <option value="">select type</option>--}}
{{--                            <option value="Full time">Full time</option>--}}
{{--                            <option value="Part time">Part time</option>--}}
{{--                            <option value="Casual">Casual</option>--}}
{{--                        </select>--}}
{{--                    </div> &nbsp;&nbsp;--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Category &nbsp;&nbsp;</label>--}}
{{--                        <select name="category_id" id="" class="form-control">--}}
{{--                            <option>select</option>--}}
{{--                            @foreach(\App\Category::all() as $cat)--}}
{{--                                <option value="{{$cat->id}}">{{$cat->name}}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </div> &nbsp;&nbsp;--}}
{{--                    <div class="form-group">--}}
{{--                        <label for="">Address &nbsp;&nbsp;</label>--}}
{{--                        <input type="text" class="form-control" name="address">--}}
{{--                    </div> &nbsp;&nbsp;--}}
{{--                    <div class="form-group">--}}
{{--                        <button class="btn btn-primary form-group">Search</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
            <table class="table">
                <thead>
                <th>Logo</th>
                <th>Company Name</th>
                <th>Position</th>
                <th>Address</th>
                <th>date</th>
                <th>Action</th>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>
                            @if(empty(Auth::user()->company->logo))
                                <img style="border-radius: 10px;" src="{{asset('avatar/man.jpg')}}" width="100px" alt="">
                            @else
                                <img style="border-radius: 50px;" src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100px" alt="">

                            @endif

                            {{--                            <img src="{{asset('avatar/man.jpg')}}" width="80" alt="">--}}
                        </td>
                        <td> {{$job->company->cname}}</td>
                        <td>{{$job->position}}<br>{{$job->type}}</td>
                        <td>{{$job->address}}</td>
                        <td> {{$job->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('Job.show', [$job->id, $job->slug])}}"><button class="btn btn-success" type="submit">Apply</button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
            <div>
                <a href="{{route('alljobs')}}">
                    <button style="width: 100%;" class="btn btn-success btn-lg">Brows all jobs</button>
                </a>
            </div>
        <br><br>
        <h1>Features of Company</h1>
        <div class="container">
            <div class="row">
                @foreach($companies as $company)
                <div class="col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$company->cname}}</h5>
                            <p class="card-text">{{str_limit( $company->description,20)}}</p>
                            <a href="{{route('Company.index',[$company->id, $company->slug])}}" class="btn btn-primary">Visit Company</a>
                        </div>
                    </div>
                </div>
                 @endforeach

            </div>

        </div>
    </div>
@endsection
