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
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Зміна публікацій</h3></div>
                	
                <table class="table">
                    <caption style="text-align: center;">Публікації</caption>
                <thead>
                <tr>
                <th></th>
                <th>Тип</th>
                <th>Дата публікації</th>
                <th>Назва</th>
                <th>Посилання на скачування</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($publications as $publication)
                <tr>
                <td>
                    <form method = "POST" action="{{ route('deletepublication') }}">
                    {{ csrf_field() }}
                        <button type="submit" class="btn" name="numpublication" value="{{ $publication->id }}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a class="btn" href="/user/changepublications/{{$publication->id}}/"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                <td>{{ $publication->type }}</td>
                <td>{{ $publication->datePublish }}</td>
                <td>{{ $publication->title }}</td>
                <td>{{ $publication->link }}</td>
                </tr>
                @endforeach
                </tbody>
                </table>

                 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Додати публікацію</h3></div>
                 <div class="form-user">
                       <form method = "POST" action="{{ route('addpublication') }}">
                {{ csrf_field() }}
    <div class = "row">
        <div class = "col-md-4">
        <span>Тип</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "type" required="">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Дата публікації</span>   
        </div>
        <div class = "col-md-8">
            <input type = "date" name = "datepublication" required="">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Назва публікації</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "name" required="">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Посилання на файл</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "link">
        </div>
    </div>

    <input type="hidden" name="page" value="next">
    <div class = "row text-right">
        <button type="submit" name="Next" class="btn">
            Додати
            <i class="fa fa-plus" aria-hidden="true"></i>
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

