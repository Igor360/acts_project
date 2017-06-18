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
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">Додовання статті</h3></div>

@if (isset ($message))
<div class="row" style="text-align: center;">{{ $message }}</div>
@endif
  <form method = "POST" action="{{ route('changeuser')}}">
                {{ csrf_field() }}
   	<div class = "row">
   		<div class = "col-md-4">
   		<span>Заголовок</span>	
   		</div>
   		<div class = "col-md-4">
   			<input type = "text" name = "username" required="">
   		</div>
   	</div>

   	  <div class = "row">
         <div class = "col-md-4">
         <span>Сторінка</span>   
         </div>
         <div class = "col-md-8">
            <select name="isadmin">
            <option value="0">Ні</option>
            <option value="1">Так</option>
            </select>
         </div>
      </div>

         <div class = "row">
         <div class = "col-md-4">
         <span>Тип статті</span>   
         </div>
         <div class = "col-md-8">
            <select name="hasmaster">
            <option value="0">Ні</option>
            <option value="1">Так</option>
            </select>
         </div>
      </div>

<div class="row">
      <div class="col-md-12 text-center">
         <img src="/img/Photo.png" style="height: 140px; border-radius: 5px; margin: 0 auto;">
         <input type = "text" name="photo" placeholder="Посилання на фото" style = "margin-top: 5px;">
         <input type = "file" name="photofile" style = "margin-top: 10px; font-size: 8pt; margin: 0 auto; line-height: 0px;" accept="image/*">
      </div>
</div>
 
 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">Додаткові дані</h3></div>

      <div class = "row">
        <div class = "col-md-6">
        <span>Текст</span>   
        </div>
        <div class = "col-md-6">
            <textarea name = "text"></textarea>
        </div>
    </div>


    <div class = "row">
         <div class = "col-md-4">
         <span>Елемент тексту</span>   
         </div>
         <div class = "col-md-8">
            <select name="hasmaster">
            <option value="0">Ні</option>
            <option value="1">Так</option>
            </select>
         </div>
      </div>
  


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
            </div>
        </div>
    </div>
</div>
@endsection