@extends('dashboard.layout.app')

@section('title')
    Family
@endsection
@section('body')
    <body
        @if (\App::getLocale() == 'en')
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
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-9">
                        <div class="card">
                            <div class="body">
                                @include('dashboard.error.error')
                                <div class="tab-content">
                                    <form method="POST" action="{{route('admin.families.update',$family->id)}}"
                                          class="form-horizontal" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="first_name" class="col-sm-2 control-label">First
                                                        Name</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control " name="first_name"
                                                                   placeholder="first_name"
                                                                   value="{{$family->first_name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="last_name" class="col-sm-2 control-label">Last
                                                        Name</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control " name="last_name"
                                                                   placeholder="last_name" value="{{$family->last_name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="address" class="col-sm-2 control-label">Address</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="address"
                                                                   placeholder="Adress" value="{{$family->address}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-xs-6 col-md-3">
                                                <div class="form-group">
                                                    <div class="col-sm-6" style="margin-left: 25px">
                                                        <label for="nation">Naionality Select</label>
                                                        <div class="select">
                                                            <select id="nation" name="nationality_id">
                                                                <option value="">Select Nationality</option>
                                                                @foreach($nationality as $nation)
                                                                    <option value="{{$nation->id}}" @if($userNationality === $nation->name) selected='selected' @endif>{{$nation->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="personalCard"
                                                           class="col-sm-3 control-label">personalCard</label>
                                                    <input type="file" class="form-control" id="personalCard"
                                                           name="personalCard" value="">
                                                </div>
                                            </div>

                                            <div class="col-xs-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="birth"
                                                           class="col-sm-3 control-label">Birth</label>
                                                    <input type="file" class="form-control" id="birth"
                                                           name="birth" value="{{old('birth')}}">
                                                </div>
                                            </div>

                                            <div class="col-xs-6 col-md-3">
                                                <div class="form-group">
                                                    <label for="residence"
                                                           class="col-sm-3 control-label">Residence</label>
                                                    <input type="file" class="form-control" id="residence"
                                                           name="residence" value="{{old('residence')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div  class="col-xs-6 col-md-3">
                                                <div class="col-xs-3" style="margin-top: 20px">
                                                    <h2 class="card-inside-title">IDDate</h2>
                                                    <div class="input-group date" id="bs_datepicker_component_container">
                                                        <div class="form-line">
                                                            <input type="date" name="date1" class="form-control"
                                                                   placeholder="dd-mm-yyyy"  @if($family->IDDate->count()>0) value="{{$family->IDDate->first()->date}}" @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="col-xs-6 col-md-3">
                                                <div class="col-xs-3" style="margin-top: 20px">
                                                    <h2 class="card-inside-title">Residence Date</h2>
                                                    <div class="input-group date" id="bs_datepicker_component_container">
                                                        <div class="form-line">
                                                            <input type="date" name="date2" class="form-control"
                                                                   placeholder="dd-mm-yyyy" @if($family->residenceDate->count()>0) value="{{$family->residenceDate->first()->date}}" @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div  class="col-xs-6 col-md-3">
                                                <div class="col-xs-3" style="margin-top: 20px">
                                                    <h2 class="card-inside-title">licence Date</h2>
                                                    <div class="input-group date" id="bs_datepicker_component_container">
                                                        <div class="form-line">
                                                            <input type="date" name="date3" class="form-control"
                                                                   placeholder="dd-mm-yyyy"  @if($family->licenceDate->count()>0) value="{{$family->licenceDate->first()->date}}" @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div  class="col-xs-6 col-md-3">
                                                <div class="col-xs-3" style="margin-top: 20px">
                                                    <h2 class="card-inside-title">Car Date</h2>
                                                    <div class="input-group date" id="bs_datepicker_component_container">
                                                        <div class="form-line">
                                                            <input type="date" name="date4" class="form-control"
                                                                   placeholder="dd-mm-yyyy" @if($family->carDate->count()>0) value="{{$family->carDate->first()->date}}" @endif>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group" >
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

@endsection
