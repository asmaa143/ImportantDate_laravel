@extends('dashboard.layout.app')

@section('title')
   Event
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
                        {{__('Events Table')}}

                    </h2>
                    @include('dashboard.success.success')
                </div>
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{__('Events Table')}}
                                </h2>
{{--                                <ul class="header-dropdown m-r--5">--}}
{{--                                    <li class="dropdown">--}}
{{--                                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">--}}
{{--                                            <i class="material-icons">more_vert</i>--}}
{{--                                        </a>--}}
{{--                                        <ul class="dropdown-menu pull-right">--}}
{{--                                            <li><a href=""></a></li>--}}
{{--                                            --}}{{--                                            <li><a href="javascript:void(0);">Another action</a></li>--}}
{{--                                            --}}{{--                                            <li><a href="javascript:void(0);">Something else here</a></li>--}}
{{--                                        </ul>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Date')}}</th>
                                            <th>{{__('User')}}</th>
                                            <th>{{__('Type')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Date')}}</th>
                                            <th>{{__('User')}}</th>
                                            <th>{{__('Type')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach ($events as $event)
                                            <tr>
                                                <td>{{$event->name ?? ''}}</td>
                                                <td>{{$event->date ?? ''}}</td>
                                                <td>{{$event->user->first_name ?? ''}} {{$event->user->last_name ?? ''}}</td>
                                                <td>{{$event->dateType->name ?? ''}}</td>
                                                <td class="text-center">
                                                    <a style="text-decoration:none" href="{{route('admin.event.edit',$event->id)}}">
                                                        <i class="material-icons">edit_note</i>
                                                    </a>
                                                    <form style="display: inline-block" action="{{route('admin.event.destroy',$event->id)}}" method="POST">
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

