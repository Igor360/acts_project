@extends('layouts.app')

@section('changeuserdata')

<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">@lang('user.sidebar_title')</h3>
     @include('user.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="form-user">
          @if ( $page != null )
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color:black;">@lang('user.page_change_links')</h3></div>
@if (isset ($message))
<div class="info-message" style="background-color:{{ $message->has_errors ? '#f6979e' : '#ddd' }};">
 <div class="row"><img src="{{ $message->has_errors ? asset('img/icons/error.png') : asset('img/icons/info.png') }}"> &nbsp{{ $message->text }}</div>
</div>
@endif
                <form method = "POST" action="{{ route('changelinks') }}">
                {{ csrf_field() }}
    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.website')</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "anothersite" placeholder="{{ $links->AnotherSite }}">
        </div>
    </div>

    @if ($errors->has('anothersite'))
      <span class="help-block">
       <strong>{{ $errors->first('anothersite') }}</strong>
      </span>
     @endif

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.intellect')</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "intellect" placeholder="{{ $links->Intellect }}">
        </div>
    </div>

    @if ($errors->has('intellect')) 
      <span class="help-block">
       <strong>{{ $errors->first('intellect') }}</strong>
      </span>
     @endif

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.timetable')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "timetable" placeholder="{{ $links->TimeTable }}">
        </div>
    </div>

    @if ($errors->has('timetable'))
      <span class="help-block">
       <strong>{{ $errors->first('timetable') }}</strong>
      </span>
     @endif

    <input type="hidden" name="page" value="next">
    <div class = "row text-right">
        <button type="submit" name="Next" class="btn">
            @lang('user.change_btn')
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
    </div>
    </form>	 
                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('messages.no_data')</h3></div>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>



@endsection

