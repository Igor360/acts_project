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
          @if ( $page != null and $work != null)
                <div class="panel-heading">
                <a href="{{ $page == 'publications' ? '/user/changepublications/' : '/user/changeconference/'}}" class="btn btn-submit"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <h3 class="page-header" style="margin-top: 10px !important;">@lang('user.page_change')</h3></div>
                 <div class="form-user">
                       <form method = "POST" action="{{ $page == "publications" ? route('updatepublication') : route('updateconference') }}">
                {{ csrf_field() }}
    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.work_change.type')</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "type"  placeholder="{{ $work->type }}">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.work_change.date_publish')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "date" name = "datepublication" placeholder="{{ $work->datePublish }}">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.work_change.name')</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "name" placeholder="{{ $work->title }}">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.work_change.link')</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "link" placeholder="{{ $work->link }}">
        </div>
    </div>

    <input type="hidden" name="page" value="{{$id_publication}}">
    <div class = "row text-right">
        <button type="submit" name="Next" class="btn">
            @lang('user.change_btn')
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
    </div>
    </form>  
    </div>
                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('messages.no_data')</h3></div>
                @endif
            </div>
        </div>
    </div>
</div>



@endsection

