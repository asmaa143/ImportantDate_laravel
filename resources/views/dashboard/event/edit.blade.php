@extends('dashboard.layout.app')

@section('title')
    Event
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
                                    <form method="POST" action="{{route('admin.event.update',$event->id)}}"
                                          class="form-horizontal">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="Email" class="col-sm-2 control-label">Event Name</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control " name="name"
                                                           placeholder="name" value="{{$event->name}}">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="Phone" class="col-sm-2 control-label">Event Date</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="date" class="form-control" name="date"
                                                           placeholder="dd-mm-yyyy" value="{{$event->date->format('Y-m-d')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6" style="margin-left: 25px">
                                                <label for="event">Event Type Select</label>
                                                <div class="select">
                                                    <select id="event" name="type_id" class="form-control">
                                                        <option value="">Select Event Type</option>
                                                        @foreach( $dateSetup as  $type)
                                                            <option value="{{$type->id ?? ''}}"  @if( $eventType === $type->name ) selected='selected' @endif >{{$type->name ??''}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" style="padding-top:70px">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Update</button>
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
