@extends('dashboard.layout.app')

@section('title')
   User
@endsection
@section('body')
    <body  @if (\App::getLocale() == 'en')
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
                    <h2>
                        {{__('Users Table')}}

                    </h2>
                    @include('dashboard.success.success')
                </div>
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{__('Users Table')}}
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{route('admin.users.create')}}">{{__('Add New User')}}</a></li>
                                            {{--                                            <li><a href="javascript:void(0);">Another action</a></li>--}}
                                            {{--                                            <li><a href="javascript:void(0);">Something else here</a></li>--}}
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Mobile')}}</th>
                                            <th>{{__('Nationality')}}</th>
                                            <th>{{__('Country')}}</th>
                                            <th>{{__('Gender')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Mobile')}}</th>
                                            <th>{{__('Nationality')}}</th>
                                            <th>{{__('Country')}}</th>
                                            <th>{{__('Gender')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                        <td>{{$user->first_name}} {{$user->last_name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone_number}}</td>
                                        <td>{{$user->nationality->name ?? ''}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->gender == '1' ? 'Male' :'Female'}}</td>
                                        <td class="text-center">
                                            <a style="text-decoration:none" href="{{route('admin.users.show',$user->id)}}">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a style="text-decoration:none" href="{{route('admin.users.edit',$user->id)}}">
                                                <i class="material-icons">edit_note</i>
                                            </a>
                                            <form style="display: inline-block" action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="admin-mail" value="">
                                                <button style="border: none" type="submit">
                                                    <i style="color: #ee2200" class="material-icons">delete</i>
                                                </button>
                                            </form>
                                        </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Exportable Table -->
            </div>
        </section>
@endsection

