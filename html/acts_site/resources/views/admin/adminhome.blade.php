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
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Головна</h3></div>
                	
                <table class="table">
                    <caption style="text-align: center;">Користувачі</caption>
                <thead>
                <tr>
                <th></th>
                <th>Електрона адреса</th>
                <th>Логін</th>
                <th>Дата внесення змін</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $u) 
                @if (!$u->isadmin)
                <tr>
                <td>
                    <form method = "POST" action="{{ route('deleteuser') }}">
                    {{ csrf_field() }}
                        <button type="submit" class="btn" name="user_id" value="{{$u->id}}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a class="btn" href="/admin/user/change/{{$u->id}}/"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->username }}</td>
                <td>{{ $u->updated_at }}</td>
                </tr>
                @endif
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

