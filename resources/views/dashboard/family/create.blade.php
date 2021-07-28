@extends('dashboard.layout.app')

@section('title')
    Family
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
                                    <form method="POST" action="{{route('admin.families.store')}}"
                                          class="form-horizontal" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="id[]" value="{{$user->id}}">
                                        <div style="margin: 25px">
                                            <button class="btn btn-success" id="addMore"><i class="glyphicon glyphicon-plus"></i>Add more Family</button>
                                        </div>
                                        <div class="form-group">
                                            <label for="type" class="col-sm-2 control-label">Family Type</label>
                                            <input name="type[]" type="radio" id="wife"
                                                   value="{{\App\Models\Family::TYPE_WIFE}}"/>
                                            <label for="wife">Wife</label>
                                            <input name="type[]" type="radio" id="son"
                                                   value="{{\App\Models\Family::TYPE_SON}}"/>
                                            <label for="son">Son</label>
                                            <input name="type[]" type="radio" id="daughter"
                                                   value="{{\App\Models\Family::TYPE_DAUGHTER}}"/>
                                            <label for="daughter">Daughter</label>
                                            <input name="type[]" type="radio" id="driver"
                                                   value="{{\App\Models\Family::TYPE_DRIVER}}"/>
                                            <label for="driver">Driver</label>
                                            <input name="type[]" type="radio" id="servant"
                                                   value="{{\App\Models\Family::TYPE_SERVANT}}"/>
                                            <label for="servant">Servant</label>
                                        </div>


                                        <div id="form">
                                            <div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="first_name" class="col-sm-2 control-label">First
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control "
                                                                       name="first_name[]"
                                                                       placeholder="first_name"
                                                                       value="{{old('first_name[]')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="last_name" class="col-sm-2 control-label">Last
                                                            Name</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control "
                                                                       name="last_name[]"
                                                                       placeholder="last_name"
                                                                       value="{{old('last_name[]')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="address"
                                                               class="col-sm-2 control-label">Address</label>
                                                        <div class="col-sm-10">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control"
                                                                       name="address[]"
                                                                       placeholder="Adress"
                                                                       value="{{old('address[]')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <div class="col-sm-6" style="margin-left: 25px">
                                                            <label for="nation">Naionality Select</label>
                                                            <div class="select">
                                                                <select id="nation" name="nationality_id[]">
                                                                    <option value="">Select Nationality</option>
                                                                    @foreach($nationality as $nation)
                                                                        <option
                                                                            value="{{$nation->id}}">{{$nation->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-xs-8 col-md-4">
                                                    <div class="form-group">
                                                        <label for="personalCard"
                                                               class="col-sm-3 control-label">personalCard</label>
                                                        <input type="file" class="form-control" id="personalCard"
                                                               name="personalCard[]" value="{{old('personalCard[]')}}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-8 col-md-4">
                                                    <div class="form-group">
                                                        <label for="birth"
                                                               class="col-sm-3 control-label">Birth</label>
                                                        <input type="file" class="form-control" id="birth"
                                                               name="birth[]" value="{{old('birth[]')}}">
                                                    </div>
                                                </div>

                                                <div class="col-xs-8 col-md-4">
                                                    <div class="form-group">
                                                        <label for="residence"
                                                               class="col-sm-3 control-label">Residence</label>
                                                        <input type="file" class="form-control" id="residence"
                                                               name="residence[]" value="{{old('residence[]')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="col-xs-3" style="margin-top: 20px">
                                                        <h2 class="card-inside-title">IDDate</h2>
                                                        <div class="input-group date"
                                                             id="bs_datepicker_component_container">
                                                            <div class="form-line">
                                                                <input type="date" name="date1[]" class="form-control"
                                                                       placeholder="dd-mm-yyyy"
                                                                       value="{{old('date1[]')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="col-xs-3" style="margin-top: 20px">
                                                        <h2 class="card-inside-title">Residence Date</h2>
                                                        <div class="input-group date"
                                                             id="bs_datepicker_component_container">
                                                            <div class="form-line">
                                                                <input type="date" name="date2[]" class="form-control"
                                                                       placeholder="dd-mm-yyyy"
                                                                       value="{{old('date2[]')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="col-xs-3" style="margin-top: 20px">
                                                        <h2 class="card-inside-title">licence Date</h2>
                                                        <div class="input-group date"
                                                             id="bs_datepicker_component_container">
                                                            <div class="form-line">
                                                                <input type="date" name="date3[]" class="form-control"
                                                                       placeholder="dd-mm-yyyy"
                                                                       value="{{old('date3[]')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-6 col-md-3">
                                                    <div class="col-xs-3" style="margin-top: 20px">
                                                        <h2 class="card-inside-title">Car Date</h2>
                                                        <div class="input-group date"
                                                             id="bs_datepicker_component_container">
                                                            <div class="form-line">
                                                                <input type="date" name="date4[]" class="form-control"
                                                                       placeholder="dd-mm-yyyy"
                                                                       value="{{old('date4[]')}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">
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
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

        <script>


            $(function () {
                var i = 1;
                $("#addMore").click(function (e) {
                    i++;
                    e.preventDefault();

                    $("#form").append("<div id='remove"+i+"'>'<div class='row clearfix'><div class='col-sm-6'><div class='form-group'>" +
                        "<label for='first_name' class='col-sm-2 control-label'>First Name</label>" +
                        "<div class='col-sm-10'><div class='form-line'>" +
                        "<input type='text' class='form-control' name='first_name[]' placeholder='first_name' value='{{old("first_name[]")}}'>" +
                        "</div></div></div></div>" +
                        " <div class='col-sm-6'><div class='form-group'><label for='last_name' class='col-sm-2 control-label'>LastName</label>" +
                        " <div class='col-sm-10'> <div class='form-line'><input type='text' class='form-control' name='last_name[]' placeholder='last_name' value='{{old("last_name[]")}}'> " +
                        "</div></div></div></div></div>"+
                        "<div class='row clearfix'><div class='col-sm-6'><div class='form-group'>" +
                        "<label for='address' class='col-sm-2 control-label'>Address</label>" +
                        "<div class='col-sm-10'><div class='form-line'>" +
                        "<input type='text' class='form-control' name='address[]' placeholder='address' value='{{old("address[]")}}'>" +
                        "</div></div></div></div>" +
                        " <div class='col-sm-6'><div class='form-group'> <div class='col-sm-6' style='margin-left: 25px'>" +
                        " <label for='nation'>Nationality Select</label><div class='select'> <select id='nation' name='nationality_id[]'> " +
                        "<option value=''>Select Nationality</option>@foreach($nationality as $nation) <option value='{{$nation->id}}'>{{$nation->name}}</option>@endforeach" +
                        " </select></div></div></div></div></div>"+
                        '<div class="row clearfix"><div class="col-xs-8 col-md-4"><div class="form-group"><label for="personalCard" class="col-sm-3 control-label">personalCard</label>' +
                        '<input type="file" class="form-control" id="personalCard" name="personalCard[]" value="{{old('personalCard[]')}}"></div></div>' +
                        '<div class="col-xs-8 col-md-4"><div class="form-group"><label for="birth" class="col-sm-3 control-label">Birth</label>' +
                        '<input type="file" class="form-control" id="birth" name="birth[]" value="{{old('birth[]')}}"></div></div>' +
                        '<div class="col-xs-8 col-md-4"><div class="form-group"> <label for="residence" class="col-sm-3 control-label">Residence</label>' +
                        '<input type="file" class="form-control" id="residence" name="residence[]" value="{{old('residence[]')}}"></div></div></div>'+
                        '<div class="row clearfix"><div  class="col-xs-6 col-md-3"><div class="col-xs-3" style="margin-top: 20px">' +
                        '<h2 class="card-inside-title">IDDate</h2><div class="input-group date" id="bs_datepicker_component_container"><div class="form-line">' +
                        '<input type="date" name="date1[]" class="form-control" placeholder="dd-mm-yyyy" value="{{old('date1[]')}}"></div></div></div></div>' +
                        '<div  class="col-xs-6 col-md-3"><div class="col-xs-3" style="margin-top: 20px"><h2 class="card-inside-title">Residence Date</h2>' +
                        '<div class="input-group date" id="bs_datepicker_component_container"><div class="form-line">' +
                        '<input type="date" name="date2[]" class="form-control" placeholder="dd-mm-yyyy" value="{{old('date2[]')}}"></div></div></div></div>' +
                        '<div  class="col-xs-6 col-md-3"><div class="col-xs-3" style="margin-top: 20px"><h2 class="card-inside-title">licence Date</h2>' +
                        '<div class="input-group date" id="bs_datepicker_component_container"><div class="form-line">' +
                        '<input type="date" name="date3[]" class="form-control" placeholder="dd-mm-yyyy" value="{{old('date3[]')}}"></div></div></div></div>' +
                        '<div  class="col-xs-6 col-md-3"><div class="col-xs-3" style="margin-top: 20px"><h2 class="card-inside-title">Car Date</h2>' +
                        '<div class="input-group date" id="bs_datepicker_component_container"><div class="form-line">' +
                        '<input type="date" name="date4[]" class="form-control" placeholder="dd-mm-yyyy" value="{{old('date4[]')}}"></div></div></div></div></div>'+
                        '<div><button  id="' + i + '" type="button" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove-sign"></i></button></div></div></div>')
                });

                $(document).on('click', '.remove', function () {
                    var button_id = $(this).attr("id");
                    $('#remove'+ button_id + '').remove();
                });
            });


        </script>


@endsection
