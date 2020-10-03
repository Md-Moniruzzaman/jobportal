@extends('layouts.main')

@section('content')
    <div style="height: 60px;"></div>
    <div class="container">
        <div class="col-md-12">
            <div class="company-logo">
                @if(empty(Auth::user()->company->cover_photo))
                    <img style="width: 100%" src="{{asset('avatar/man.jpg')}}" width="100px" height="200px" alt="">
                @else
                    <img style="width: 100%" src="{{asset('uploads/coverphoto')}}/{{Auth::user()->company->cover_photo}}" width="100px" alt="">

                @endif
            </div>
            <div class="company-desc">
                <br>
                @if(empty(Auth::user()->company->logo))
                    <img style="border-radius: 50px" src="{{asset('avatar/man.jpg')}}" width="100px" alt="">
                @else
                    <img style="border-radius: 50px" src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100px" height="100px" alt="">

                @endif
                <br>
                <h1>{{$company->cname}}</h1>
                <p>
                <p> <b>Description-</b>{{$company->description}}&nbsp;</p>
                <p><b>Address-</b>{{$company->address}}&nbsp;</p>
                <p><b>Phone-</b>{{$company->phone}}&nbsp;</p>
                <p><b>Website-</b>{{$company->website}};</p>
                </p>
            </div>

        </div>
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
            @foreach($company->jobs as $job)
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
    <div style="height: 60px;"></div>
@endsection
