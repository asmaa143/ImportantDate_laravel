@extends('dashboard.layout.app')

@section('title')
    Role
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
                <div class="block-header">
                    <h2>{{__('Create Role')}}</h2>
                </div>

                <!-- Vertical Layout -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{__('Create Role')}}
                                </h2>

                            </div>
                            @include('dashboard.error.error')
                            <div class="body">
                                <form method="POST" action="{{route('admin.roles.store')}}">
                                    @csrf
                                    <label for="role">Role</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" id="name" class="form-control" name="name"
                                                   placeholder="Enter your role">
                                        </div>
                                    </div>
                                    <div>
                                        <label style="padding-right: 20px" for="permission">Permissions</label>

                                        <select id="permission" name="permission[]" class="custom-select" multiple>
                                            @foreach($permission as $value)
                                            <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        </select>
                                        <strong  style="color: #ff6d00;margin-top: 15px">please use Enter key when select more than one permission</strong>

{{--                                        @foreach($permission as $value)--}}
{{--                                            <input type="checkbox" id="permission" name="permission[]" value="{{$value->id}}"/>--}}
{{--                                            <label for="permission">{{$value->name}}</label>--}}
{{--                                        @endforeach--}}
                                    </div>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">Create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
