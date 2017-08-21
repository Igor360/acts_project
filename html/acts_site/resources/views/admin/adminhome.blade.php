@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">@lang('admin.sidebar_title')</h3>
     @include('admin.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
          @if ( $page != null )
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('admin.page_main')</h3></div>
                	
                 <form method="GET">
                    <input name = "search_title" placeholder="@lang('admin.enter_user_data')" style = "width: 100%; border-color: #063cc7; color : #063cc7;"> 
                    <div class="text-right">
                     <input type="submit" name="seach" class="btn search_btn text-right" value="@lang('admin.search_btn')">
                    </div>
                 </form>
                

                <table class="table">
                    <caption style="text-align: center;">@lang('admin.users_table.title')</caption>
                <thead>
                <tr>
                <th></th>
                <th>@lang('admin.users_table.email')</th>
                <th>@lang('admin.users_table.username')</th>
                <th>@lang('admin.users_table.changedate')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $u) 
                @if (!$u->isadmin)
                <tr>
                <td>
                    <form method = "POST" action="{{ route('deleteuser') }}">
                    {{ csrf_field() }}
                        <button type="submit" class="btn" name="user_id" value="{{$u->user_id}}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a class="btn" href="/admin/user/change/{{$u->user_id}}/"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                <td>{{ $u->email }}</td>
                <td><a href="/teachstaff/more/{{ $u->teacherid }}">{{ $u->username }}</a></td>
                <td>{{ $u->updated_at }}</td>
                </tr>
                @endif
                @endforeach
                </tbody>
                </table>
                <div class= "text-center">
                @if (isset($search_query))
                  {{ $users->appends($search_query)->links() }}
                @else
                  {{ $users->links() }}
                @endif
                </div>
                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('messages.no_data')</h3></div>
                @endif
            </div>
        </div>
    </div>
</div>



@endsection

