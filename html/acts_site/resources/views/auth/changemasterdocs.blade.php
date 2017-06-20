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
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Етюди магістрів</h3></div>
                	    <table class="table">
                    <caption style="text-align: center;">Етюди</caption>
                <thead>
                <tr>
                <th></th>
                <th>ФІО магістра</th>
                <th>Описання</th>
                <th>Дата публікації</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($works as $work)
                <tr>
                <td>
                    <form method = "POST" action="{{ route('deletemasterdoc') }}">
                    {{ csrf_field() }}
                        <button type="submit" class="btn" name="num" value="{{ $work->id }}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a class="btn" href="/home/masterdocs/change/{{$work->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                <td>{{ $work->name }}</td>
                <td>{{ $work->description }}</td>
                <td>{{ $work->datepublish }}</td>
                </tr>
                @endforeach
                </tbody>
                </table>

                 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Додати етюд</h3></div>
                 <div class="form-user">
                       <form method = "POST" action="{{ route('addmasterdocs') }}">
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
        <div class = "col-md-8">
            <textarea name = "description" id = "description"></textarea>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Повне описання</span>  
        </div>
        <div class = "col-md-8">
            <textarea name = "maintext"  id = "maintext"></textarea>
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

 <script src="{{ asset('/bootstrap/js/jquery.js') }}" type="text/javascript" charset="utf-8" ></script>
        {{-- JS Bootstrap --}}
        <script src="{{ asset('/bootstrap/js/bootstrap.js') }}" type="text/javascript" charset="utf-8" ></script>
 <script src="{{ asset ('js/ckeditor/ckeditor.js') }}"  type="text/javascript" charset="utf-8" ></script>
 <script>
      CKEDITOR.replace("description",{
       language: 'uk',
       uiColor: '#f0f0f0', 
     });
       CKEDITOR.replace("maintext",{
       language: 'uk',
       uiColor: '#f0f0f0',
     });
      </script>

@endsection

