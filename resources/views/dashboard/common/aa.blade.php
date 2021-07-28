
@extends('dashboard.layout.app')

@section('title')
    Nationality
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
                    <h2>
                        {{__('Nationalities Table')}}

                    </h2>
                    @include('dashboard.success.success')
                </div>
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{__('Nationalities Table')}}
                                </h2>
                                <ul class="header-dropdown m-r--5">
                                    <li class="dropdown">
                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                           role="button" aria-haspopup="true" aria-expanded="false">
                                            <i class="material-icons">more_vert</i>
                                        </a>
                                        <ul class="dropdown-menu pull-right">

                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal">Add New Nationality
                                            </button>
                                            <li><a href="{{route('admin.admins.create')}}">{{__('Add New Admin')}}</a></li>
                                            {{--                                            <li><a href="javascript:void(0);">Another action</a></li>--}}
                                            {{--                                            <li><a href="javascript:void(0);">Something else here</a></li>--}}
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover dataTable js-exportable">
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

                                        <tbody class="cont-data">
                                        @foreach($admin as $admin)
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a class="edit" style="text-decoration:none" href=""
                                                       data-route=""
                                                       data-toggle="modal" data-target="#exampleModal2">
                                                        <i class="material-icons">edit_note</i>
                                                    </a>
                                                    <button style="border: none" class="delete"
                                                            data-route="">
                                                        <i style="color: #ee2200" class="material-icons">delete</i>
                                                    </button>
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

