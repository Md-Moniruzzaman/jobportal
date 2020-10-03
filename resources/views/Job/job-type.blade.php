@extends('layouts.main')

@section('content')
    <div style="height: 60px;"></div>
    <div class="container">
        <div class="row">
            <h1>Recent Job</h1>

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
