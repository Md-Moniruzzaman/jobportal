@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @foreach($applicants as $applicant)
                    <div class="card-header">{{$applicant->title}}</div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                            @foreach($applicant->users as $user)
                                <tr>
                                    <td><b>Name:</b> {{$user->name}}</td>
                                    <td><b>E-mail:</b> {{$user->email}}</td>
                                    <td><b>Address:</b> {{$user->profile->address}}</td>
                                    <td><b>Phone:</b> {{$user->profile->phone}}</td>
                                    <td><b>BIO:</b> {{$user->profile->bio}}</td>
                                    <td><b>Experience:</b> {{$user->profile->experience}}</td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->resume)}}">resume</a>
                                    </td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->cover_letter)}}">cover letter</a>
                                    </td>

                                </tr>
                             @endforeach
                            </tbody>
                        </table>

                    </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
