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
                                @include('dashboard.error.error')
                                <div class="tab-content">
                                    <form method="POST" action="{{route('admin.admins.store')}}"
                                          class="form-horizontal">
                                        @csrf
                                        <div class="form-group">
                                            <label for="Email" class="col-sm-2 control-label">Email</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="email" class="form-control " name="email"
                                                           placeholder="Email" value="{{old('email')}}">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="Phone" class="col-sm-2 control-label">Phone</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="phone"
                                                           placeholder="Phone" value="{{old('phone')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Password" class="col-sm-2 control-label">Password</label>

                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" name="password">
                                                </div>
                                            </div>
                                        </div>
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
                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-left: 25px">
                                                <label for="roles">Rule Select</label>
                                                <div class="select">
                                                    <select id="roles" name="roles">
                                                        <option value="">Select Rule</option>
                                                        @foreach($roles as  $id=>$role)
                                                            <option value="{{$id}}" >{{$role}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group" style="padding-top:70px">
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
