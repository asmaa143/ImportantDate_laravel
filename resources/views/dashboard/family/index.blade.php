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
                    <h2>
                        {{__('Family Table')}}

                    </h2>
                    @include('dashboard.success.success')
                </div>
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{__('Family Table')}}
                                </h2>
{{--                                <ul class="header-dropdown m-r--5">--}}
{{--                                    <li class="dropdown">--}}
{{--                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"--}}
{{--                                           role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                            <i class="material-icons">more_vert</i>--}}
{{--                                        </a>--}}
{{--                                        <ul class="dropdown-menu pull-right">--}}
{{--                                            <li><a href="">{{__('Add New Family')}}</a></li>--}}
{{--                                            --}}{{--                                            <li><a href="javascript:void(0);">Another action</a></li>--}}
{{--                                            --}}{{--                                            <li><a href="javascript:void(0);">Something else here</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table
                                        class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Nationality')}}</th>
                                            <th>{{__('Country')}}</th>
                                            <th>{{__('Family Type')}}</th>
                                            <th>{{__('Paterfamilias')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Nationality')}}</th>
                                            <th>{{__('Country')}}</th>
                                            <th>{{__('Family Type')}}</th>
                                            <th>{{__('Paterfamilias')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach ($family as $family)
                                        <tr>
                                        <td>{{$family->first_name}} {{$family->last_name}}</td>
                                        <td>{{$family->nationality->name ?? ''}}</td>
                                        <td>{{$family->address}}</td>
                                        <td>@if($family->type == 1)
                                                Wife
                                            @elseif($family->type == 2)
                                                Son
                                            @elseif($family->type == 3)
                                                Daughter
                                            @elseif($family->type == 4)
                                              Driver
                                            @else
                                                Servant
                                            @endif</td>
                                        <td>{{$family->user->first_name}}  {{$family->user->last_name}}</td>

                                        <td class="text-center">
                                            <a style="text-decoration:none" href="{{route('admin.families.show',$family->id)}}">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                            <a style="text-decoration:none" href="{{route('admin.families.edit',$family->id)}}">
                                                <i class="material-icons">edit_note</i>
                                            </a>
                                            <form style="display: inline-block" action="{{route('admin.families.destroy',$family->id)}}" method="POST">
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

