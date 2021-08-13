@extends('dashboard.layout.app')

@section('title')
   Family
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
                    <h2>FAMILY DETAILS</h2>
                </div>
                <!-- Default Example -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Family Dates
                                </h2>
{{--                                <ul class="header-dropdown m-r--5">--}}
{{--                                    <li class="dropdown">--}}
{{--                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"--}}
{{--                                           role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                            <i class="material-icons">more_vert</i>--}}
{{--                                        </a>--}}
{{--                                        <ul class="dropdown-menu pull-right">--}}
{{--                                            <li><a href="javascript:void(0);">Action</a></li>--}}
{{--                                            <li><a href="javascript:void(0);">Another action</a></li>--}}
{{--                                            <li><a href="javascript:void(0);">Something else here</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                            @if($family->dates->count() > 0)
                                <div class="body">
                                    <div class="row">
                                        @if($family->IDDate->count()>0)
                                            <div class="col-xs-6 col-md-3" style="margin-top: 20px">
                                                <a class="text-center" style="text-decoration: none">
                                                    <h4>{{$family->IDDate->first()->date}}</h4>
                                                </a>
                                                <h5 class="text-center">IDDate</h5>
                                            </div>
                                        @endif
                                        @if($family->residenceDate->count()>0)
                                            <div class="col-xs-6 col-md-3" style="margin-top: 20px">
                                                <a class="text-center" style="text-decoration: none">
                                                    <h4>{{$family->residenceDate->first()->date}}</h4>
                                                </a>
                                                <h5 class="text-center">Residence Date</h5>
                                            </div>
                                        @endif
                                        @if($family->licenceDate->count()>0)
                                            <div class="col-xs-6 col-md-3" style="margin-top: 20px">
                                                <a class="text-center" style="text-decoration: none">
                                                    <h4>{{$family->licenceDate->first()->date}}</h4>
                                                </a>
                                                <h5 class="text-center">Licence Date</h5>
                                            </div>
                                        @endif
                                        @if($family->carDate->count()>0)
                                            <div class="col-xs-6 col-md-3" style="margin-top: 20px">
                                                <a class="text-center" style="text-decoration: none">
                                                    <h4>{{$family->carDate->first()->date}}</h4>
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
                                    Family Photo

                                </h2>
{{--                                <ul class="header-dropdown m-r--5">--}}
{{--                                    <li class="dropdown">--}}
{{--                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"--}}
{{--                                           role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                            <i class="material-icons">more_vert</i>--}}
{{--                                        </a>--}}
{{--                                        <ul class="dropdown-menu pull-right">--}}
{{--                                            <li><a href="javascript:void(0);">Action</a></li>--}}
{{--                                            <li><a href="javascript:void(0);">Another action</a></li>--}}
{{--                                            <li><a href="javascript:void(0);">Something else here</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                            @if($family->photos->count() > 0)
                                <div class="body">
                                    <div class="row">
                                        @if($family->personalCard->count() > 0)
                                            <div class="col-xs-8 col-md-4">
                                                <div class="thumbnail">
                                                    <img
                                                        src="{{asset('Upload/dashboard/photo/'.$family->personalCard->first()->src)}}"
                                                        width="210px">
                                                    <div class="caption">
                                                        <h3>Personal Card</h3>
{{--                                                        <p>--}}
{{--                                                            <a href="javascript:void(0);"--}}
{{--                                                               class="btn btn-primary waves-effect"--}}
{{--                                                               role="button">BUTTON</a>--}}
{{--                                                        </p>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($family->birth->count() > 0)
                                            <div class="col-xs-8 col-md-4">
                                                <div class="thumbnail">
                                                    <img
                                                        src="{{asset('Upload/dashboard/photo/'.$family->birth->first()->src)}}"
                                                        width="210px">
                                                    <div class="caption">
                                                        <h3>Birth</h3>

{{--                                                        <p>--}}
{{--                                                            <a href="javascript:void(0);"--}}
{{--                                                               class="btn btn-primary waves-effect"--}}
{{--                                                               role="button">BUTTON</a>--}}
{{--                                                        </p>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($family->residence->count() > 0)
                                            <div class="col-xs-8 col-md-4">
                                                <div class="thumbnail">
                                                    <img
                                                        src="{{asset('Upload/dashboard/photo/'.$family->residence->first()->src)}}"
                                                        width="210px">
                                                    <div class="caption">
                                                        <h3>Residence</h3>
{{--                                                        <p>--}}
{{--                                                            <a href="javascript:void(0);"--}}
{{--                                                               class="btn btn-primary waves-effect"--}}
{{--                                                               role="button">BUTTON</a>--}}
{{--                                                        </p>--}}
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


            </div>
        </section>
@endsection











