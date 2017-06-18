@extends('layouts.app')

@section('changeuserdata')

<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">#АУТС</h3>
     @include('auth.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
          @if ( $page != null )
                <div class="panel-heading">
                <a href="/home/masterdocs/" class="btn btn-submit"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <h3 class="page-header" style="margin-top: 10px !important;">Редагування</h3></div>
                 <div class="form-user">
                       <form method = "POST" action="{{ route('updatemasterdoc') }}">
                {{ csrf_field() }}
    <div class = "row">
        <div class = "col-md-4">
        <span>ФІО магістра</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "name">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Дата публікації</span>   
        </div>
        <div class = "col-md-8">
            <input type = "date" name = "datepublication">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Описання</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "description">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Повне описання</span>  
        </div>
        <div class = "col-md-4">
            <textarea name = "maintext"></textarea>
        </div>
    </div>

    <input type="hidden" name="page" value="{{$id}}">
    <div class = "row text-right">
        <button type="submit" name="Next" class="btn">
            Змінити
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
    </div>
    </form>   
    </div>
                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Дані відсутні</h3></div>
                @endif
            </div>
        </div>
    </div>
</div>



@endsection

