@extends('layouts.main')

@section('content')

    <div class="site-section bg-light">
            <div class="container">
                <div class="row">

                    <div class="col-md-12 col-lg-8 mb-5">



                        <div class="p-5 bg-white">

                            <div class="mb-4 mb-md-5 mr-5">
                                <div class="job-post-item-header d-flex align-items-center">
                                    <h2 class="mr-3 text-black h4">{{$job->position}}</h2>
                                    <div class="badge-wrap">
                                        <span class="border border-warning text-warning py-2 px-4 rounded">{{$job->type}}</span>
                                    </div>
                                </div>
                                <div class="job-post-item-body d-block d-md-flex">
                                    <div class="mr-3"><span class="fl-bigmug-line-portfolio23">
                                        </span> <a href="#">{{$job->company->cname}}</a></div>
                                    <div><span class="fl-bigmug-line-big104"></span> <span>{{$job->address}}</span></div>
                                </div>
                            </div>



                            <div class="img-border mb-5">
                                <a href="https://vimeo.com/28959265" class="popup-vimeo image-play">
                  <span class="icon-wrap">
                    <span class="icon icon-play"></span>
                  </span>
                                    <img src="{{asset('partial/images/hero_2.jpg')}}" alt="Image" class="img-fluid rounded">
                                </a>
                            </div>
                            <p>{{$job->description}}</p>

                            @if(Auth::user()->user_type=='seeker')
                                @if(!$job->checkApplication())
                                    <form action="{{route('Job.apply',[$job->id])}}" method="post">
                                        @csrf
                                        <button class="btn btn-success form-control" type="submit">Apply</button>
                                    </form>
                                @endif
                                @if($job->checkApplication())
                                    <div class="text-center">
                                        <h3 class="text-warning"><b>Already applied</b></h3>
                                    </div>
                                    {{--                                <form action="{{route('Job.apply',[$job->id])}}" method="post">--}}
                                    {{--                                    @csrf--}}
                                    {{--                                    <button class="btn btn-success form-control" type="submit">Apply</button>--}}
                                    {{--                                </form>--}}
                                @endif
                            @endif
{{--                            <p class="mt-5"><a href="#" class="btn btn-primary  py-2 px-4">Apply Job</a></p>--}}
                        </div>
                    </div>

                    <div class="col-lg-4">


                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Job Details</h3>
                            <p>Company name: <a href="{{route('Company.index',[$job->company->id, $job->company->slug])}}">{{$job->company->cname}}</a></p>
                            <p>Address: {{$job->address}}</p>
                            <p>Position: {{$job->position}}</p>
                            <p>Date: {{$job->last_dates}}</p>
                            <p><a href="{{route('Company.index',[$job->company->id, $job->company->slug])}}" class="btn btn-primary  py-2 px-4">Visit Company</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
