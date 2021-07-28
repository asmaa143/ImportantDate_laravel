@extends('dashboard.layout.app')

@section('title')
    Dates Setup
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
                                    <form method="POST" action="{{route('admin.date-setup.update',$dateSetup->id)}}"
                                          class="form-horizontal">
                                        @csrf
                                        @method('PUT')

                                        <div class="form-group">
                                            <label for="date" class="col-sm-2 control-label">Date Name</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" name="name"
                                                           placeholder="Date Name" value="{{$dateSetup->name}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-left: 30px; margin-top: 50px">
                                            <div class="col-sm-10" style="margin-top: 15px">
                                                <div class="select">
                                                    <label for="reminder">Reminder Start Date Select</label>
                                                    <select id="reminder" name="reminder_start" onChange="return updateSetReminder()">
                                                        <option selected="selected" value="">Select Reminder time</option>
                                                        <option @if($dateSetup->reminder_start == '1') selected='selected' @endif  data-live="1" value="{{\App\Models\DateSetup::REMINDER_DAYS}}" >Days</option>
                                                        <option @if($dateSetup->reminder_start == '2') selected='selected' @endif data-live="2" value="{{\App\Models\DateSetup::REMINDER_WEEKS}}" >Weeks</option>
                                                        <option @if($dateSetup->reminder_start == '3') selected='selected' @endif data-live="3" value="{{\App\Models\DateSetup::REMINDER_MONTHS}}" >Months</option>
                                                        <option @if($dateSetup->reminder_start == '4') selected='selected' @endif data-live="4" value="{{\App\Models\DateSetup::REMINDER_YEARS}}" >Years</option>
                                                    </select>
                                                    <label style="margin-left: 50px">Enter Number </label>
                                                    <input style="width:50px" type="number" min="1" name="number" value="{{$dateSetup->number}}">
                                                    <input style="width: 60px;border: none" type="text" id="Reminder-Select" value="" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" style="margin-top: 50px">
                                            <label for="Phone" class="col-sm-2 control-label">Frequency</label>
                                            <div class="col-sm-10">
                                                <input style="width:50px" type="number" min="1" name="frequency"
                                                       value="{{$dateSetup->frequency}}">
                                            </div>
                                        </div>

                                        <div class="form-group" style="padding-top:50px">
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


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script>

            function updateSetReminder(){
                var ddl = document.getElementById("reminder");
                var selectedOption = ddl.options[ddl.selectedIndex];
                var liveMemberData = selectedOption.getAttribute("data-live");
                var textBox = document.getElementById("Reminder-Select");
                if(liveMemberData=="1" ){
                    textBox.value = "Days";
                }
                else if(liveMemberData=="2" ){
                    textBox.value = "Weeks";
                }
                else if(liveMemberData=="3" ){
                    textBox.value = "Months";
                }
                else if(liveMemberData=="4" ){
                    textBox.value = "Years";
                }
                else{
                    textBox.value = "";
                }
            }



        </script>

@endsection
