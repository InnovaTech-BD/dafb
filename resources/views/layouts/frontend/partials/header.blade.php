<div class="navigation-area">
    <div class="top-header">
        <div class="container">
            <div class="row d-block d-md-flex align-items-center justify-content-between">
                <div class="col-md-5">
                    <div class="brand-logo">
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img class="img-fluid" src="{{ asset('images/logo/dafb.png') }}" alt="">
                        </a> 
                    </div><!-- ./brand-logo -->
                </div>
                <div class="col-md-7 d-flex justify-content-between">
                    <div class="search mr-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- ./search -->
                    <div class="lang">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <div class="dropdown">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" id="langBtn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
                                        Language
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="langBtn">
                                        <a class="dropdown-item" href="{{currentPath()}}?lang=en">English </a>
                                        <a class="dropdown-item" href="{{currentPath()}}?lang=bn">বাংলা </a>
                                        <a class="dropdown-item" href="{{currentPath()}}?lang=de">Deutsch</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div><!-- ./language -->
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container -->
    </div><!-- ./top-header -->
    
    <div class="main-nav">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light px-0">
                        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#top-nav" aria-controls="top-nav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="menu collapse navbar-collapse" id="top-nav">
                            <ul class="navbar-menu mx-auto">
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('home') ? 'active':'' }}" href="{{ route('home') }}">{{ __('header.home') }}</a>
                                </li>
                                <li class="nav-item">
                                    <div class="btn-group">
                                        <a class="nav-link {{ Route::is('about') ? 'active':'' }}" href="{{ route('about') }}">{{ __('header.about') }}</a>
                                        <a class="dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            <a class="dropdown-item" href="{{ route('team') }}">{{ __('header.team') }}</a>
                                            <a class="dropdown-item" href="{{ route('gallery') }}">{{ __('header.gallery') }}</a>
                                            <a class="dropdown-item" href="{{ route('report.show','annualreport') }}">{{ __('header.report') }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="btn-group">
                                        <a class="nav-link {{ Route::is('program') ? 'active':'' }}" >{{ __('header.programs') }}</a>
                                        <a class="dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            @foreach ($projects as $project)
                                            <a class="dropdown-item" href="{{ route('program.show',$project->slug) }}">{{$project->headline[Config::get('app.locale')]}}</a>
                                            @endforeach
                                            <a class="dropdown-item" href="{{ route('scholarship') }}">{{__('header.scholarship')}}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="btn-group">
                                        <a class="nav-link {{ Route::is('about') ? 'active':'' }}" >{{ __('header.involved') }}</a>
                                        <a class="dropdown-toggle dropdown-toggle-split" id="dropdownMenuReference" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                            <a class="dropdown-item" href="{{ route('volunteer') }}">{{ __('header.volunteer') }}</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('events') ? 'active':'' }}" href="{{ route('events') }}">{{ __('header.events') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Route::is('contact') ? 'active':'' }}" href="{{ route('contact') }}">{{ __('header.contact') }}</a>
                                </li>
                            </ul>
                        </div><!-- ./menu -->
                    </nav><!-- ./nav -->
                </div><!-- ./col -->
            </div><!-- ./row -->
        </div><!-- ./container -->
    </div><!-- ./main-nav -->
</div><!-- ./navigation-area -->