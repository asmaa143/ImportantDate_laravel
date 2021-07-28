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
                                            {{--                                            <li><a href="">{{__('Add New Nationality')}}</a></li>--}}
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
                                            <th>{{__('Name_en')}}</th>
                                            <th>{{__('Name_ar')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>{{__('Name_en')}}</th>
                                            <th>{{__('Name_ar')}}</th>
                                            <th>{{__('Actions')}}</th>
                                        </tr>
                                        </tfoot>

                                        <tbody class="cont-data">
                                        @foreach($rows as $row)
                                            <tr id="{{$row->id}}" class="text-center">
                                                <td>{{$row->name_en}}</td>
                                                <td>{{$row->name_ar}}</td>
                                                <td>
                                                    <a class="edit" style="text-decoration:none" href=""
                                                       data-route="{{route('admin.nationality.edit',$row->id)}}"
                                                       data-toggle="modal" data-target="#exampleModal2">
                                                        <i class="material-icons">edit_note</i>
                                                    </a>
                                                    <button style="border: none" class="delete"
                                                            data-route="{{route('admin.nationality.destroy',$row->id)}}">
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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="addnation">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New Nationality</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul id="error" class="list-unstyled"></ul>
                            <div class="form-group">
                                <label>Name_En</label>
                                <input type="text" name="name_en" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Name_Ar</label>
                                <input type="text" name="name_ar" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save changes" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form id="updatenation">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Nationality</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul id="errorUpdate" class="list-unstyled"></ul>
                            <div class="form-group">
                                <label>Name_En</label>
                                <input type="text" id="name_en" name="name_en" class="form-control">
                                <input type="hidden" id="id" name="id">
                            </div>


                            <div class="form-group">
                                <label>Name_Ar</label>
                                <input type="text" id="name_ar" name="name_ar" class="form-control">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="Save changes" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

        <script>
            $("#addnation").submit(function (e) {
                e.preventDefault();
                var formData = $('#addnation').serialize();
                $.ajax({
                    url: "{{route('admin.nationality.store')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "POST",
                    data: formData,
                    success: function (dataBack) {
                        $("#error").html("<li class='alert alert-success text-center p-1'> Added Success </li>");
                        $(".cont-data").prepend(dataBack)
                        $('#exampleModal').modal('hide')

                    }, error: function (xhr, status, error) {
                        $("#error").html('')
                        $.each(xhr.responseJSON.errors, function (key, item) {
                            $("#error").append("<li class='alert alert-danger text-center p-1'>" + item + " </li>");

                        })

                    }
                })

            })

            $(document).on("click", ".edit", function () {
                var route = $(this).attr("data-route");
                $.ajax({
                    type: "get",
                    url: route,
                    data_type: "JSON",
                    success: function (data) {
                        $("#id").val(data.id);
                        $("#name_en").val(data.name_en);
                        $("#name_ar").val(data.name_ar);

                    }
                })
            })

            $("#updatenation").submit(function (e) {
                e.preventDefault();
                var formData = $('#updatenation').serialize();
                var idRow = $("#id").val();
                $.ajax({
                    url: "/admin/nationality/" + idRow,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: "PATCH",
                    data: formData,
                    success: function (dataBack) {
                        $("#errorUpdate").html("<li class='alert alert-success text-center p-1'> Added Success </li>");
                        $("#" + idRow).empty().prepend(dataBack)
                        $('#exampleModal2').modal('hide')

                    }, error: function (xhr, status, error) {
                        $("#errorUpdate").html('')
                        $.each(xhr.responseJSON.errors, function (key, item) {
                            $("#errorUpdate").append("<li class='alert alert-danger text-center p-1'>" + item + " </li>");

                        })

                    }
                })

            })


            $(document).on("click", ".delete", function () {
                var route = $(this).attr("data-route");
                $.ajax({
                    type: "DELETE",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                    url: route,
                    success: function (data) {
                        alert(data.success);
                        $("#" + data.id).remove();
                    }
                })
            })
        </script>



@endsection

