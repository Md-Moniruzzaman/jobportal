
<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->


    <div class="site-navbar-wrap js-site-navbar bg-white">

        <div class="container">
            <div class="site-navbar bg-light">
                <div class="py-1">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <h2 class="mb-0 site-logo"><a href="/">Job<strong class="font-weight-bold">Finder</strong> </a></h2>
                        </div>
                        <div class="col-10">
                            <nav class="site-navigation text-right" role="navigation">
                                <div class="container">
                                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                                        <li><a href="{{route('Category.categoryCreate')}}">For Candidates</a></li>
                                        <li class="has-children">
                                            <a href="{{route('Category.categoryCreate')}}">For Employees</a>
                                            <ul class="dropdown arrow-top">
                                                <li><a href="category">Category</a></li>
                                                <li><a href="User/profile">Browse Candidates</a></li>
                                                <li><a href="{{route('Job.create')}}">Post a Job</a></li>
                                                <li><a href="{{route('Company.create')}}">Employeer Profile</a></li>
{{--                                                <li class="has-children">--}}
{{--                                                    <a href="#">More Links</a>--}}
{{--                                                    <ul class="dropdown">--}}
{{--                                                        <li><a href="#">Browse Candidates</a></li>--}}
{{--                                                        <li><a href="#">Post a Job</a></li>--}}
{{--                                                        <li><a href="#">Employeer Profile</a></li>--}}
{{--                                                    </ul>--}}
{{--                                                </li>--}}

                                            </ul>
                                        </li>
                                        <li><a href="{{route('company')}}">Company</a></li>
                                        <li><a href="contacts">Contact</a></li>
                                        <li><!-- Button trigger modal -->
                                            @if(!Auth::check())
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                login
                                            </button>
                                              @else
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                @if( Auth::user()->user_type =='Employee')
                                                    {{Auth::user()->company->cname}}
                                                @endif

                                                @if( Auth::user()->user_type =='seeker')
                                                    {{ Auth::user()->name }}
                                                @endif

                                                <span class="caret"></span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                @if(Auth::user()->user_type=='Employee')
                                                    <a class="dropdown-item text-primary" href="{{ route('Company.create') }}">
                                                        {{ __('Company') }}
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('Job.myjobs') }}">
                                                        {{ __('My Jobs') }}
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('Job.applicants') }}">
                                                        {{ __('Applicants') }}
                                                    </a>
                                                @endif
                                                @if(Auth::user()->user_type=='seeker')
                                                    <a class="dropdown-item text-primary" href="{{ route('Profile.index') }}">
                                                        {{ __('Profile') }}
                                                    </a>
                                                @endif
                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>

                                        @endif
                                        </li>


{{--                                        <a href="new-post.html"><span class="bg-primary text-white py-3 px-4 rounded">--}}
{{--                                                    <span class="icon-plus mr-3"></span>Post New Job</span></a>--}}
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="height: 60px;"></div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login Here</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
{{--                    <button type="submit" class="btn btn-primary">login</button>--}}
                </div>
            </div>
        </div>
    </div>
