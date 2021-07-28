<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf_token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
    <!-- Favicon-->
    <link rel="icon" href="{{asset('dashboard/favicon.ico')}}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet"
          type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">


    <!-- Bootstrap Core Css -->
    @if (App::getLocale() == 'en')
        <link href="{{asset('dashboard/theme/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('dashboard/theme/plugins/bootstrap/css/bootstraprtl.css')}}" rel="stylesheet">
    @endif

    <!-- Waves Effect Css -->
    @if (App::getLocale() == 'en')
        <link href="{{asset('dashboard/theme/plugins/node-waves/waves.css')}}" rel="stylesheet"/>
    @else
        <link href="{{asset('dashboard/theme/plugins/node-waves/wavesrtl.css')}}" rel="stylesheet"/>
    @endif

    <!-- Animation Css -->
    @if (App::getLocale() == 'en')
        <link href="{{asset('dashboard/theme/plugins/animate-css/animate.css')}}" rel="stylesheet"/>
    @else
        <link href="{{asset('dashboard/theme/plugins/animate-css/animatertl.css')}}" rel="stylesheet"/>
    @endif


    <!-- Wait Me Css -->
    <link href="{{asset('dashboard/theme')}}/plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="{{asset('dashboard/theme')}}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Sweet Alert Css -->
    <link href="{{asset('dashboard/theme')}}/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="{{asset('dashboard/theme')}}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom Css -->
    @if (App::getLocale() == 'en')
        <link href="{{asset('dashboard/theme/css/style.css')}}" rel="stylesheet">
    @else
        <link href="{{asset('dashboard/theme/css/stylertl.css')}}" rel="stylesheet">
    @endif

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    @if (App::getLocale() == 'en')
        <link href="{{ URL::asset('dashboard/theme/css/themes/all-themes.css') }}" rel="stylesheet">
    @else
        <link href="{{ URL::asset('dashboard/theme/css/themes/rtl-all-themes.css') }}" rel="stylesheet">
@endif

    <!-- Compiled and minified CSS -->
{{--    <link href="{{asset('dashboard/theme/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css')}}" rel="stylesheet" />--}}
    <!-- Bootstrap Select Css -->
{{--    <link href="{{asset('dashboard/theme/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />--}}
    <!-- Dropzone Css -->
{{--    <link href="{{asset('dashboard/theme/plugins/dropzone/dropzone.css')}}" rel="stylesheet">--}}
{{--    <!-- Multi Select Css -->--}}
{{--    <link href="{{asset('dashboard/theme/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">--}}


</head>

@yield('body')
@yield('content')

<!-- Jquery Core Js -->
<script src="{{asset('dashboard/theme')}}/plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="{{asset('dashboard/theme')}}/plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
{{--<script src="{{asset('dashboard/theme')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>--}}

<!-- Slimscroll Plugin Js -->
<script src="{{asset('dashboard/theme')}}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>


<!-- Jquery Validation Plugin Css -->
<script src="{{asset('dashboard/theme')}}/plugins/jquery-validation/jquery.validate.js"></script>

<!-- JQuery Steps Plugin Js -->
<script src="{{asset('dashboard/theme')}}/plugins/jquery-steps/jquery.steps.js"></script>

<!-- Sweet Alert Plugin Js -->
<script src="{{asset('dashboard/theme')}}/plugins/sweetalert/sweetalert.min.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{asset('dashboard/theme')}}/plugins/node-waves/waves.js"></script>

<!-- Autosize Plugin Js -->
<script src="{{asset('dashboard/theme')}}/plugins/autosize/autosize.js"></script>

<!-- Moment Plugin Js -->
<script src="{{asset('dashboard/theme')}}/plugins/momentjs/moment.js"></script>

{{--<!-- Bootstrap Material Datetime Picker Plugin Js -->--}}
{{--<script src="{{asset('dashboard/theme')}}/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>--}}

{{--<!-- Bootstrap Datepicker Plugin Js -->--}}
{{--<script src="{{asset('dashboard/theme')}}/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>--}}

<!-- Jquery DataTable Plugin Js -->
<script src="{{asset('dashboard/theme')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="{{asset('dashboard/theme')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="{{asset('dashboard/theme')}}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="{{asset('dashboard/theme')}}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="{{asset('dashboard/theme')}}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="{{asset('dashboard/theme')}}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="{{asset('dashboard/theme')}}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="{{asset('dashboard/theme')}}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="{{asset('dashboard/theme')}}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

<!-- Custom Js -->
<script src="{{asset('dashboard/theme')}}/js/admin.js"></script>
{{--<script src="{{asset('dashboard/theme')}}/js/pages/forms/basic-form-elements.js"></script>--}}
<script src="{{asset('dashboard/theme')}}/js/pages/tables/jquery-datatable.js"></script>
<script src="{{asset('dashboard/theme')}}/js/pages/forms/form-wizard.js"></script>


<!-- Demo Js -->
<script src="{{asset('dashboard/theme')}}/js/demo.js"></script>


{{--<!-- Multi Select Plugin Js -->--}}
{{--<script src="{{asset('dashboard/theme/plugins/multi-select/js/jquery.multi-select.js')}}"></script>--}}

{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>--}}

{{--<script src="{{asset('dashboard/theme/plugins/dropzone/dropzone.js')}}"></script>--}}


{{--<!-- Jquery CountTo Plugin Js -->--}}
{{--<script src="{{asset('dashboard/theme/plugins/jquery-countto/jquery.countTo.js')}}"></script>--}}

{{--<!-- Morris Plugin Js -->--}}
{{--<script src="{{asset('dashboard/theme/plugins/raphael/raphael.min.js')}}"></script>--}}
{{--<script src="{{asset('dashboard/theme/plugins/morrisjs/morris.js')}}"></script>--}}


{{--<!-- Bootstrap Datepicker Plugin Js -->--}}
{{--<script src="{{asset('dashboard/theme/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>--}}
<!-- Custom Js -->
{{--<script src="{{asset('dashboard/theme/js/pages/index.js')}}"></script>--}}
{{--<script src="{{asset('dashboard/theme/js/pages/examples/profile.js')}}"></script>--}}
{{--<script src="{{asset('dashboard/theme/js/pages/forms/basic-form-elements.js')}}"></script>--}}
{{--<script src="{{asset('dashboard/theme/js/pages/forms/advanced-form-elements.js')}}"></script>--}}

</body>

</html>

