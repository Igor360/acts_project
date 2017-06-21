@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">#АУТС</h3>
     @include('admin.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-12 panel panel-default">
            <div class = "form-user">
          @if ( $page != null )
                <div class="panel-heading">
      <a href="/admin/articles/" class="btn btn-submit"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
      <h3 class="page-header" style="margin-top: 10px !important; color: black;">Редагування статті</h3></div>

@if (isset ($message))
<div class="row" style="text-align: center;">{{ $message }}</div>
@endif
  <form method = "POST" action="{{ route('updatearticle')}}">
                {{ csrf_field() }}
   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Заголовок</span>	
   		</div>
   		<div class = "col-md-4">
   			<input type = "text" name = "title" value="{{ $article->title}}">
   		</div>
   	</div>

   	  <div class = "row">
         <div class = "col-md-4">
         <span>Сторінка</span>   
         </div>
         <div class = "col-md-8">
            <select name="page">
            <option></option>
            @foreach ($pages as $p)
            <option value="{{ $p->id }}">{{ $p->Name }}</option>
            @endforeach
            </select>
         </div>
      </div>
        

<div class="row">
        <div class = "col-md-4">
         <span>Фото</span>   
         </div>
      <div class="col-md-8">
         <input type = "text" name="photo" placeholder="Посилання на фото" style = "margin-top: 5px;">
         <br>
         <input type = "file" name="photofile" style = "margin-top: 10px; font-size: 8pt; margin: 0 auto; line-height: 0px;" accept="image/*">
      </div>
</div>
 
 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">Додаткові дані</h3></div>


      <div class = "row">
        <div class = "col-md-4">
        <span>Описання</span>   
        </div>
        <div class = "col-md-8">
            <textarea id = "description"  name = "description">
            @foreach ($description as $d)
            {{  $d->text }}
            @endforeach
             </textarea>
        </div>
    </div>

      <div class = "row">
        <div class = "col-md-4">
        <span>Текст</span>   
        </div>
        <div class = "col-md-8">
            <textarea id = "idtext"  name = "text">
            @foreach ($text as $t)
            {{  $t->text }}
            @endforeach
             </textarea>
        </div>
    </div>


  <div class = "row">
        <div class = "col-md-4">
        <span>Додатковий текст</span>   
        </div>
        <div class = "col-md-8">
            <input type="radio" name = "isText" value="1" {{ $article->isText == 1
            ? 'checked = "checked"' : '' }}>Є<br>
            <input type="radio" name = "isText" value="0" {{ $article->isText == 0
            ? 'checked = "checked"' : '' }}>Нема
        </div>
    </div>

    <input type="hidden" name="article" value="{{ $article_id }}">

    <div class = "row text-right">
        <button type="submit" name="Save" class="btn">
            Зберегти
            <i class="fa fa-sign-in" aria-hidden="true"></i>
        </button>
    </div>
    </form>
               @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">Дані відсутні</h3></div>
                @endif
            </div>
            <span>*Якщо ви хочете бачити кнопку "Детальніше" то поставте галочку навпроти пункту "Додатковий текст"<br> Під додатковим текстом розуміється пункт "Текст"</span>   
            </div>

        </div>
    </div>
</div>

    </div>

    <!-- Scripts -->

        <script src="{{ asset('/bootstrap/js/jquery.js') }}" type="text/javascript" charset="utf-8" ></script>
        {{-- JS Bootstrap --}}
        <script src="{{ asset('/bootstrap/js/bootstrap.js') }}" type="text/javascript" charset="utf-8" ></script>
 <script src="{{ asset ('js/ckeditor/ckeditor.js') }}"  type="text/javascript" charset="utf-8" ></script>
 <script>
      CKEDITOR.replace("idtext",{
       language: 'uk',
       uiColor: '#f0f0f0',
        filebrowserBrowseUrl : '/elfinder/ckeditor' 
     });
       CKEDITOR.replace("description",{
       language: 'uk',
       uiColor: '#f0f0f0',
     });
      </script>
@endsection