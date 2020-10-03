@extends('layouts.main')

@section('content')
    <div style="height: 60px;"></div>
    <div class="container">
        <h1>Features of Company</h1>
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
@endsection
