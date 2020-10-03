@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row">
        <h1>Recent Jobs</h1>
        <form action="{{route('alljobs')}}" method="get">
            <div class="form-inline">
                <div class="form-group">
                    <label for="">Keyword &nbsp;&nbsp;</label>
                    <input type="text" name="title" class="form-control">
                </div>&nbsp;&nbsp;
                <div class="form-group">
                    <label for="">Employment type &nbsp;&nbsp;</label>
                    <select name="type" id="" class="form-control">
                        <option value="">select type</option>
                        <option value="Full time">Full time</option>
                        <option value="Part time">Part time</option>
                        <option value="Casual">Casual</option>
                    </select>
                </div> &nbsp;&nbsp;
                <div class="form-group">
                    <label for="">Category &nbsp;&nbsp;</label>
                    <select name="category_id" id="" class="form-control">
                        <option>select</option>
                        @foreach(\App\Category::all() as $cat)
                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div> &nbsp;&nbsp;
{{--                <div class="form-group">--}}
{{--                    <label for="">Address &nbsp;&nbsp;</label>--}}
{{--                    <input type="text" class="form-control" name="address">--}}
{{--                </div> &nbsp;&nbsp;--}}
                <div class="form-group">
                    <button class="btn btn-primary form-control">Search</button>
                </div>
            </div>
        </form>
        <div style="height: 60px;"></div>
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
    <div class="pagination pagination-sm justify-content-center">
    {{$jobs->links()}}
    </div>
 </div>
@endsection
