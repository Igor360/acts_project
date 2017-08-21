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
          @if ( $page != null )
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('user.page_change_conference')</h3></div>
                   <form method="GET">
                    <input name = "search_title" placeholder="@lang('user.search_query_conference')" style = "width: 100%; border-color: #063cc7; color : #063cc7;"> 
                    <div class="text-right">
                     <input type="submit" name="seach" class="btn search_btn text-right" value="@lang('admin.search_btn')">
                    </div>
                 </form>
                	  <table class="table">
                    <caption style="text-align: center;">@lang('user.conference_table.title')</caption>
                <thead>
                <tr>
                <th></th>
                <th>@lang('user.conference_table.type')</th>
                <th>@lang('user.conference_table.date_publish')</th>
                <th>@lang('user.conference_table.name')</th>
                <th>@lang('user.conference_table.link')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($conferences as $conference)
                <tr>
                <td>
                    <form method = "POST" action="{{ route('deleteconference') }}">
                    {{ csrf_field() }}
                        <button type="submit" class="btn" name="numconference" value="{{ $conference->work_id }}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a class="btn" href="/user/changeconference/{{$conference->work_id}}/"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                <td>{{ $conference->type }}</td>
                <td>{{ $conference->datePublish }}</td>
                <td>{{ $conference->title }}</td>
                <td>{{ $conference->link }}</td>
                </tr>
                @endforeach
                </tbody>
                </table>
                <div class="text-center">
                @if(isset($search_query))
                  {{ $conferences->appends($search_query)->links() }}
                @else
                 {{ $conferences->links() }}
                @endif
                </div>
                 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('user.page_add_conference')</h3></div>
                 <div class="form-user">
                       <form method = "POST" action="{{ route('addconference') }}">
                {{ csrf_field() }}
    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.conference_add.type')</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "type" required="">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.conference_add.date_publish')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "date" name = "datepublication" required="">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.conference_add.name')</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "name" required="">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.conference_add.link')</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "link">
        </div>
    </div>

    <input type="hidden" name="page" value="next">
    <div class = "row text-right">
        <button type="submit" name="Next" class="btn">
            @lang('user.add_btn')
            <i class="fa fa-plus" aria-hidden="true"></i>
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

