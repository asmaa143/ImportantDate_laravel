@extends('dashboard.layout.app')

@section('title')
    Home
@endsection
@section('body')
    <body  class="theme-red" >
@endsection
@section('content')
    @include('dashboard.common.navbar')
    @include('dashboard.common.sidebar')
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>{{__('Dashboard')}}</h2>
            </div>
        </div>
    </section>

@endsection
