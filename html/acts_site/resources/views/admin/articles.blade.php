@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">#АУТС</h3>
     @include('admin.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
          @if ( $page != null )
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Статті</h3></div>
                	
                <table class="table">
                    <caption style="text-align: center;">Всі статті</caption>
                <thead>
                <tr>
                <th></th>
                <th>Заголовок</th>
                <th>Сторінка</th>
                <th>Тип станні</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($articles as $article) 
                <tr>
                <td>
                    <form method = "POST" action="">
                    {{ csrf_field() }}
                        <button type="submit" class="btn" name="numpublication" value="">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a class="btn" href="/home/changepublications//"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->page }}</td>
                <td>{{ $article->type }}</td>
                </tr>
                @endforeach
                </tbody>
                </table>
                

                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Дані відсутні</h3></div>
                @endif
            </div>
        </div>
    </div>
</div>



@endsection

