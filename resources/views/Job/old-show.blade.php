@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$job->title}}</div>

                    <div class="card-body">
                        <h3>Description</h3>
                        <p>
                            {{$job->description}}
                        </p>
                        <h3>Responsibilities</h3>
                        <p>
                            {{$job->roles}}
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                            {{Session::get('message')}}
                        </div>
                    @endif
                    <div class="card-header">Short Info</div>

                    <div class="card-body">
                        <p>Company name: <a href="{{route('Company.index',[$job->company->id, $job->company->slug])}}">{{$job->company->cname}}</a></p>
                        <p>Address: {{$job->address}}</p>
                        <p>Position: {{$job->position}}</p>
                        <p>Date: {{$job->last_dates}}</p>

                    </div>
                    @if(Auth::user()->user_type=='seeker')
                            @if(!$job->checkApplication())
                                <form action="{{route('Job.apply',[$job->id])}}" method="post">
                                    @csrf
                                    <button class="btn btn-success form-control" type="submit">Apply</button>
                                </form>
                            @endif
                            @if($job->checkApplication())
                                <div class="text-center text-danger">
                                    <h3><b>Already applied</b></h3>
                                </div>
                                {{--                                <form action="{{route('Job.apply',[$job->id])}}" method="post">--}}
                                {{--                                    @csrf--}}
                                {{--                                    <button class="btn btn-success form-control" type="submit">Apply</button>--}}
                                {{--                                </form>--}}
                            @endif
                        @endif

                </div>

            </div>
        </div>
    </div>
@endsection
