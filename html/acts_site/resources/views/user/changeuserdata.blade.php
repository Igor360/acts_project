@extends('layouts.app')

@section('changeuserdata')

<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">@lang('user.sidebar_title')</h3>
     @include('user.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-12 panel panel-default">
            <div class = "form-user">
          @if ( $page != null )
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">@lang('user.page_change_user_data')</h3></div>

@if (isset ($message))
<div class="row" style="text-align: center;">{{ $message }}</div>
@endif
          	  	<form method = "POST" action="{{ route('changeuser')}}">
                {{ csrf_field() }}
   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.user_login')</span>	
   		</div>
   		<div class = "col-md-4">
   			<input type = "text" name = "username" placeholder="{{ $user->username }}">
   		</div>
   	</div>

@if (isset ($password_error))
<div class="row" style="text-align: center;">{{ $password_error }}</div>
@endif

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.user_password')</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.repeat_password')</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password2">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.user_email')</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "email" name = "email" placeholder="{{ $user->email }}">
   		</div>
   	</div>
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

