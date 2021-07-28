@extends('dashboard.layout.app')

@section('title')
    Admin
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
                                            @error('roles')
                                            <li style="list-style: none" class="text-danger">
                                                <i class="material-icons">play_arrow</i>
                                                {{$message}}
                                            </li>
                                            @enderror
                                            <form method="POST" action="{{route('admin.admins.update',$admin->id)}}" class="form-horizontal">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="Email" class="col-sm-2 control-label">Email</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="email" class="form-control "  name="email" placeholder="Email" value="{{$admin->email}}">

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="Phone" class="col-sm-2 control-label">Phone</label>
                                                    <div class="col-sm-10">
                                                        <div class="form-line">
                                                            <input type="text" class="form-control"  name="phone" placeholder="Phone" value="{{$admin->phone}}" >
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-grouo">
                                                    <div class="col-sm-6" style="margin-left: 25px">
                                                        <label for="roles">Rule Select</label>
                                                        <div class="select">
                                                            <select id="roles" name="roles">
                                                                @foreach($roles as  $id=>$role)
                                                                    <option value="{{$id}}"  @if($adminRole=== $role) selected='selected' @endif>{{$role}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

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
                                            <form method="POST" action="{{route('admin.change-password')}}" class="form-horizontal">
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
