
@extends('user.home')

@section('main')
@if ($teacher != null)
 <div class="container-fluid">
  <div class="inform">
  <b>{{ $teacher->Profession }}</b><br>
  <div id="main_inf">
    <b>@lang('teachstaff.Consultations'): </b>{{ $teacher->TimeDay}}<br>
    <b>@lang('teachstaff.room'): </b>{{ $teacher->Room }}<br>
    <b>@lang('teachstaff.phone'): </b>{{ $teacher->Phone}}<br>
    <b>@lang('teachstaff.mobile'): </b>{{ $teacher->Mobile }}<br>
    <b>@lang('teachstaff.email'): </b>{{ $teacher->Email }}<br>
  </div>


  <div id="prof_int">

    <span class="detail">@lang('teachstaff.profinterest'):</span>
    <br><br>
     {!! $teacher->ProfInterest !!}
    <br>
    <span class="detail">@lang('teachstaff.disciplines'):</span>
    <br><br>
    {!! $teacher->Discipline !!}
  </div>       
        </div>
</div>
@else
  <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('messages.no_data')</h3></div>
@endif
@endsection