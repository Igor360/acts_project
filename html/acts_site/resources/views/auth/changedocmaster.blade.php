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
            <input type = "text" name = "name" value="{{ $work->name }}">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Дата публікації</span>   
        </div>
        <div class = "col-md-8">
            <input type = "date" name = "datepublication" value="{{ $work->datepublish }}">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Описання</span>  
        </div>
        <div class = "col-md-8">
            <textarea name = "description" id = "description">{{ $work->description }}</textarea>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Повне описання</span>  
        </div>
        <div class = "col-md-8">
            <textarea name = "maintext" id = "maintext">{{ $work->mainText }}</textarea>
        </div>
    </div>

    <input type="hidden" name="id_mw" value="{{ $id }}">
    <div class = "row text-right">
        <button type="submit" name="Next" class="btn">
            Змінити
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
    </div>
    </form>   
    </div>

        <table class="table">
                <caption style="text-align: center;">Етюди</caption>
                <thead>
                <tr>
                <th></th>
                <th>Файл</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($files as $file)
                <tr>
                <td>
                    <form method = "POST" action="{{ route('deletemasterfile') }}" >
                    {{ csrf_field() }}
                      <input type="hidden" name="id_mw" value="{{$id}}">
                        <button type="submit" class="btn" name="num" value="{{ $file->id }}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
                <td><a href="{{ route('getfile', $file->filename) }}">{{ $file->originalname }}</a></td>
                </tr>
                @endforeach
                </tbody>
                </table>

            <form method = "POST" action="{{ route('addmasterfile') }}" enctype="multipart/form-data">  
            {{ csrf_field() }}  
             <input type="hidden" name="id_mw" value="{{ $id }}">
     <div class = "form-user">
        <div class = "col-md-4">
        <span>Давання файлов</span>  
        </div>
        <div class = "col-md-8">
            <input type="file" name="filefield[]" multiple="true">    
        </div>
          <div class = "row text-right">
      <input type="submit" name="add" value="Додати" class = "btn">  
     </div> 
    </div>
   
    </form>
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

