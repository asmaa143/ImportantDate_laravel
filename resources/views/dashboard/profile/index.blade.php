@extends('dashboard.layout.app')

@section('title')
    Profile
@endsection
@section('body')
    <body
        @if (\App::getLocale() == 'en')
        dir="ltr"
        @else
        dir="rtl"
        @endif
        class="theme-red" >
    @endsection
    @section('content')
        @include('dashboard.common.navbar')
        @include('dashboard.common.sidebar')
        <section class="content">
            <div class="container-fluid">
                @include('dashboard.success.success')
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-3">
                        <div class="card profile-card">
                            <div class="profile-header">&nbsp;</div>
                            <div class="profile-body">
                                <div class="image-area">
                                    <img src="{{asset('dashboard/theme')}}/images/user-lg.jpg" alt="AdminBSB - Profile Image" />
                                </div>
                                <div class="content-area">
                                    <p>{{ Auth::guard('admin')->user()->role  ?? ""}}</p>
                                    <p>{{ Auth::guard('admin')->user()->email }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="card card-about-me">
                            <div class="header">
                                <h2>ABOUT ME</h2>
                            </div>
                            <div class="body">
                                <ul>
                                    <li>
                                        <div class="title">
                                            <i class="material-icons">phone_iphone</i>
                                           Phone-Number
                                        </div>
                                        <div class="content">
                                            {{ Auth::guard('admin')->user()->phone }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="card">
                            <div class="body">
                                <div>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                        <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                    </ul>

                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                            @error('email')
                                            <li style="list-style: none" class="text-danger">
                                                <i class="material-icons">play_arrow</i>
                                                {{$message}}
                                            </li>
                                            @enderror
                                            @error('phone')
                                            <li style="list-style: none" class="text-danger">
                                                <i class="material-icons">play_arrow</i>
                                                {{$message}}
                                            </li>
                                            @enderror
                                            <form class="form-horizontal" action="{{route('admin.profile-setting.update',Auth::guard('admin')->user()->id)}}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <label for="Email" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="email" class="form-control "  name="email" placeholder="Email" value="{{ old('email', Auth::guard('admin')->user()->email) }}">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="Phone" class="col-sm-2 control-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control"  name="phone" placeholder="Phone" value="{{ old('phone', Auth::guard('admin')->user()->phone) }}" >
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">

                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-2 col-sm-10">
                                                        <button type="submit" class="btn btn-danger">Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                            @error('current')
                                            <li style="list-style: none" class="text-danger">
                                                <i class="material-icons">play_arrow</i>
                                                {{$message}}
                                            </li>
                                            @enderror
                                            @error('password')
                                            <li style="list-style: none" class="text-danger">
                                                <i class="material-icons">play_arrow</i>
                                                {{$message}}
                                            </li>
                                            @enderror
                                            <form class="form-horizontal" action="{{route('admin.profile-password')}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="current" class="col-sm-3 control-label">Current Password</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" id="current" name="current" placeholder="Old Password" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="col-sm-3 control-label">New Password</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password_confirmation" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-line">
                                                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="New Password (Confirm)" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <button type="submit" class="btn btn-danger">Change</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
