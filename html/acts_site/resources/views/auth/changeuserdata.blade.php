@extends('layouts.app')

@section('changeuserdata')

<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">#АУТС</h3>
     @include('auth.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-12 panel panel-default">
            <div class = "form-user">
          @if ( $page != null )
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">Зміна даних користувача</h3></div>

@if (isset ($message))
<div class="row" style="text-align: center;">{{ $message }}</div>
@endif
          	  	<form method = "POST" action="{{ route('changeuser')}}">
                {{ csrf_field() }}
   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Логін</span>	
   		</div>
   		<div class = "col-md-4">
   			<input type = "text" name = "username">
   		</div>
   	</div>

@if (isset ($password_error))
<div class="row" style="text-align: center;">{{ $password_error }}</div>
@endif

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Пароль</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Повторіть пароль</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password2">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Електронна адреса</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "email" name = "email">
   		</div>
   	</div>
   	<input type="hidden" name="page" value="next">
   	<div class = "row text-right">
   		<button type="submit" name="Next" class="btn">
   			Змінити
   			<i class="fa fa-chevron-right" aria-hidden="true"></i>
   		</button>
   	</div>
   	</form>

                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Дані відсутні</h3></div>
                @endif
            </div>
            </div>
        </div>
    </div>
</div>



@endsection

