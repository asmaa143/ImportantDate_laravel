@extends('dashboard.layout.app')

@section('title')
    Page
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
                    <h2>Add Page</h2>
                </div>

                <!-- CKEditor -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Add Page
                                </h2>
                            </div>
                            <div class="body">
                                <form action="{{route('admin.page.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Title_en</label>
                                        <input type="text" name="title_en">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Title_ar</label>
                                        <input type="text" name="title_ar">
                                    </div>
                                    <div class="form-group">
                                        <label for="">URL</label>
                                        <input type="text" name="slug">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Photo</label>
                                        <input type="file" name="photo">
                                    </div>
                                    <div>
                                        <textarea id="ckeditor" name="desc_en">
                                        </textarea>
                                    </div>

                                    <div class="form-group" style="padding-top:50px">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# CKEditor -->

            </div>
        </section>
@endsection

