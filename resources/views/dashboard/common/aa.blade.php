
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

        <!-- The core Firebase JS SDK is always required and must be listed first -->
        <script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-app.js"></script>

        <!-- TODO: Add SDKs for Firebase products that you want to use
            https://firebase.google.com/docs/web/setup#available-libraries -->
        <script src="https://www.gstatic.com/firebasejs/8.9.0/firebase-analytics.js"></script>

        <script>
            // Your web app's Firebase configuration
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            var firebaseConfig = {
                apiKey: "AIzaSyBw4c_lmb8w6j-4xZwBzTdDuPJtystxRVI",
                authDomain: "important-date.firebaseapp.com",
                projectId: "important-date",
                storageBucket: "important-date.appspot.com",
                messagingSenderId: "288136838233",
                appId: "1:288136838233:web:f1fa6b95b583589fecc548",
                measurementId: "G-QMEMYT305X"
            };
            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);
            firebase.analytics();
        </script>

@endsection

