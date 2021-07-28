@extends('dashboard.layout.app')

@section('title')
    Admin
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
                        {{__('Admins Table')}}

                    </h2>
                    @include('dashboard.success.success')
                </div>
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{__('Admins Table')}}
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">
                                            <li><a href="{{route('admin.admins.create')}}">{{__('Add New Admin')}}</a></li>
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
                                            <th>{{__('Roles')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Phone')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>{{__('Roles')}}</th>
                                            <th>{{__('Email')}}</th>
                                            <th>{{__('Phone')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach ($admins as $admin)
                                            <tr>
                                                <td>
                                                    @if(!empty($admin->getRoleNames()))
                                                        @foreach($admin->getRoleNames() as $v)
                                                            <label class="badge bg-cyan" >{{ $v }}</label>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>{{$admin->email}}</td>
                                                <td>{{$admin->phone}}</td>

                                                <td class="text-center">
                                                    @if($admin->getRoleNames()->first() !='super-admin')

                                                    <a style="text-decoration:none" href="{{route('admin.admins.edit',$admin->id)}}">
                                                        <i class="material-icons">edit_note</i>
                                                    </a>

                                                    <form style="display: inline-block" action="{{route('admin.admins.destroy',$admin->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="admin-mail" value="{{$admin->email}}">
                                                        <button style="border: none" type="submit">
                                                            <i style="color: #ee2200" class="material-icons">delete</i>
                                                        </button>
                                                    </form>
                                                    @endif
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

