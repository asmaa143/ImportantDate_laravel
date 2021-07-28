@extends('dashboard.layout.app')

@section('title')
    User
@endsection
@section('body')
    <body @if (\App::getLocale() == 'en')
          dir="ltr"
          @else
          dir="rtl"
          @endif
          class="theme-red">
    @endsection
    @section('content')
        @include('dashboard.common.navbar')
        @include('dashboard.common.sidebar')
        <section class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <h2>USER DETAILS</h2>
                </div>
                <!-- Default Example -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    User Dates
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                           role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            @if($user->dates->count() > 0)
                                <div class="body">
                                    <div class="row">
                                        @if($user->IDDate->count()>0)
                                            <div class="col-xs-6 col-md-3" style="margin-top: 20px">
                                                <a class="text-center" style="text-decoration: none">
                                                    <h4>{{$user->IDDate->first()->date}}</h4>
                                                </a>
                                                <h5 class="text-center">IDDate</h5>
                                            </div>
                                        @endif
                                        @if($user->residenceDate->count()>0)
                                            <div class="col-xs-6 col-md-3" style="margin-top: 20px">
                                                <a class="text-center" style="text-decoration: none">
                                                    <h4>{{$user->residenceDate->first()->date}}</h4>
                                                </a>
                                                <h5 class="text-center">Residence Date</h5>
                                            </div>
                                        @endif
                                        @if($user->licenceDate->count()>0)
                                            <div class="col-xs-6 col-md-3" style="margin-top: 20px">
                                                <a class="text-center" style="text-decoration: none">
                                                    <h4>{{$user->licenceDate->first()->date}}</h4>
                                                </a>
                                                <h5 class="text-center">Licence Date</h5>
                                            </div>
                                        @endif
                                        @if($user->carDate->count()>0)
                                            <div class="col-xs-6 col-md-3" style="margin-top: 20px">
                                                <a class="text-center" style="text-decoration: none">
                                                    <h4>{{$user->carDate->first()->date}}</h4>
                                                </a>
                                                <h5 class="text-center">Car Date</h5>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- #END# Default Example -->
                <!-- Custom Content -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    User Photo

                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                           role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            @if($user->photos->count() > 0)
                                <div class="body">
                                    <div class="row">
                                        @if($user->personalCard->count() > 0)
                                            <div class="col-xs-8 col-md-4">
                                                <div class="thumbnail">
                                                    <img
                                                        src="{{asset('Upload/dashboard/photo/'.$user->personalCard->first()->src)}}"
                                                        width="210px">
                                                    <div class="caption">
                                                        <h3>Personal Card</h3>
                                                        <p>
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-primary waves-effect"
                                                               role="button">BUTTON</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($user->birth->count() > 0)
                                            <div class="col-xs-8 col-md-4">
                                                <div class="thumbnail">
                                                    <img
                                                        src="{{asset('Upload/dashboard/photo/'.$user->birth->first()->src)}}"
                                                        width="210px">
                                                    <div class="caption">
                                                        <h3>Birth</h3>

                                                        <p>
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-primary waves-effect"
                                                               role="button">BUTTON</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($user->residence->count() > 0)
                                            <div class="col-xs-8 col-md-4">
                                                <div class="thumbnail">
                                                    <img
                                                        src="{{asset('Upload/dashboard/photo/'.$user->residence->first()->src)}}"
                                                        width="210px">
                                                    <div class="caption">
                                                        <h3>Residence</h3>
                                                        <p>
                                                            <a href="javascript:void(0);"
                                                               class="btn btn-primary waves-effect"
                                                               role="button">BUTTON</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- #END# Custom Content -->

                <!-- Disabled Items -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    USER FAMILY
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                           role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="javascript:void(0);">Action</a></li>
                                            <li><a href="javascript:void(0);">Another action</a></li>
                                            <li><a href="javascript:void(0);">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="list-group">
                                    @if($user->has_wife===1)
                                        <a href="{{route('admin.family-create',$user->id)}}" class="list-group-item"> Create Wife Date</a>
                                    @endif
                                    @if($user->has_sons===1)
                                        <a href="{{route('admin.family-create',$user->id)}}" class="list-group-item"> Create Son Data</a>
                                    @endif
                                    @if($user->has_driver===1)
                                        <a href="{{route('admin.family-create',$user->id)}}" class="list-group-item"> Create driver Date</a>
                                    @endif
                                    @if($user->has_servant===1)
                                        <a href="{{route('admin.family-create',$user->id)}}" class="list-group-item">Create servant Date</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Disabled Items -->
            </div>
        </section>
@endsection











