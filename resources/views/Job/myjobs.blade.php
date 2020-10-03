@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Jobs lists</div>

                    <div class="card-body">
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
                                        <img style="border-radius: 50px" src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100px" height="100px" alt="">
                                    </td>
                                    <td>Company Name: {{$job->title}}</td>
                                    <td>Position:{{$job->position}}<br>{{$job->type}}</td>
                                    <td>address:{{$job->address}}</td>
                                    <td>Date: {{$job->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('Job.edit', [$job->id])}}"><button class="btn btn-success" type="submit">Edit</button></a>
                                        <a href="{{route('Job.delete', [$job->id])}}"><button class="btn btn-warning" type="submit">Delete</button></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
