@extends('dashboard.layout.app')

@section('title')
    User
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
                                    <form method="POST" action="{{route('admin.users.store')}}"
                                          class="form-horizontal" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="first_name" class="col-sm-2 control-label">First
                                                        Name</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control " name="first_name"
                                                                   placeholder="first_name"
                                                                   value="{{old('first_name')}}">
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
                                                                   placeholder="last_name" value="{{old('last_name')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Email" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="email" class="form-control " name="email"
                                                                   placeholder="Email" value="{{old('email')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Phone" class="col-sm-2 control-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control" name="phone_number"
                                                                   placeholder="Phone" value="{{old('phone_number')}}">
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
                                                                   placeholder="Adress" value="{{old('address')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="gender" class="col-sm-2 control-label">Gender</label>
                                                    <input name="gender" type="radio" id="male"
                                                           value="{{\App\Models\User::GENDER_MALE}}"/>
                                                    <label for="male">Male</label>
                                                    <input name="gender" type="radio" id="female"
                                                           value="{{\App\Models\User::GENDER_FEMALE}}"/>
                                                    <label for="female">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Password"
                                                           class="col-sm-2 control-label">Password</label>

                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" name="password">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="Confirm Password" class="col-sm-2 control-label">Confirm
                                                        Password</label>

                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control"
                                                                   name="password_confirmation">
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
                                                                    <option
                                                                        value="{{$nation->id ??''}}">{{$nation->name ??''}}</option>
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
                                                               name="personalCard" value="{{old('personalCard')}}">
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
                                                                   placeholder="dd-mm-yyyy" value="{{old('date1')}}">
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
                                                                   placeholder="dd-mm-yyyy" value="{{old('date2')}}">
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
                                                                   placeholder="dd-mm-yyyy" value="{{old('date3')}}">
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
                                                                   placeholder="dd-mm-yyyy" value="{{old('date4')}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div><span>Do You Have ?</span></div>
                                        <input type="checkbox" id="wife" name="has_wife" value="1">
                                        <label for="wife"> Wife </label><br>
                                        <input type="checkbox" id="son" name="has_sons" value="1">
                                        <label for="son">Son</label><br>
                                        <input type="checkbox" id="driver" name="has_driver" value="1">
                                        <label for="driver">Driver</label><br>
                                        <input type="checkbox" id="servant" name="has_servant" value="1">
                                        <label for="servant">Servant</label><br>
                                        <div class="form-group" >
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Create</button>
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
