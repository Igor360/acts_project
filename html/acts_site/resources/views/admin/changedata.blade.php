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
                    <a href="/admin/" class="btn btn-submit"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <h3 class="page-header" style="margin-top: 10px !important; color: black;">Основні дані</h3></div>

@if (isset ($message))
<div class="row" style="text-align: center;">{{ $message }}</div>
@endif
          	  	<form method = "POST" action="{{ route('changeuserdata')}}">
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
   			<input type = "password" name = "password2" >
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

   	  <div class = "row">
         <div class = "col-md-4">
         <span>Чи є адміністратором</span>   
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
         <span>Чи має етюди</span>   
         </div>
         <div class = "col-md-8">
            <select name="hasmaster">
            <option value="0">Ні</option>
            <option value="1">Так</option>
            </select>
         </div>
      </div>
 
 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">Додаткові дані</h3></div>
   <div class = "row">
    <div class="col-md-8">
      <div class = "row">
        <div class = "col-md-6">
        <span>Ім'я</span>   
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "firstname">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-6">
        <span>По батькові</span>    
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "middlename" >
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-6">
        <span>Прізвище</span>   
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "lastname" >
        </div>
    </div>
      </div>
      <div class="col-md-4 text-center" style="border-left: 1px solid #57a2e3">
         <img src="/img/Photo.png" style="height: 140px; border-radius: 5px; margin: 0 auto;">
         <input type = "text" name="photo" placeholder="Посилання на фото" style = "margin-top: 5px;">
         <input type = "file" name="photofile" style = "margin-top: 10px; font-size: 8pt; margin: 0 auto; line-height: 0px;" accept="image/*">
      </div>

   </div>

                  <div class="line"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Посада</span>   
         </div>
         <div class = "col-md-8">
            <select name="position">
            @foreach ($positions as $position)
                <option value="{{ $position->id }}">{{ $position->name }}</option>
            @endforeach
            </select>
         </div>
      </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Професія</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "profession" >
        </div>
    </div>

      <div class = "row">
        <div class = "col-md-4">
        <span>Факультет та кафедра</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "department" >
        </div>
    </div>
    
            <div class="line"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>День та час прийому відвідувачів</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "datetime" >
         </div>
      </div>

     <div class = "row">
         <div class = "col-md-4">
         <span>Кімната</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "room" >
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Стаціонарний телефон</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "phone" >
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Мобільний телефон</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "mobile" >
         </div>
      </div>

            <div class="row"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Професійні інтереси</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "profint" id = "profint"></textarea>
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>Дисципліни</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "disciplines" id = "disciplines"></textarea>
         </div>
      </div>

        <div class = "row">
         <div class = "col-md-4">
         <span>Чи є вчителем</span>   
         </div>
         <div class = "col-md-8">
            <select name="isteacher">
            <option value="1">Так</option>
            <option value="0">Ні</option>
            </select>
         </div>
      </div>

      <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color:black;">Посилання</h3></div>
    <div class = "row">
        <div class = "col-md-4">
        <span>Альттернативний сайт</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "anothersite">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Intellect</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "intellect">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>Poзклад</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "timetable">
        </div>
    </div>

    <input name="id_user" value="{{ $userid }}" type="hidden">
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



 <script src="{{ asset('/bootstrap/js/jquery.js') }}" type="text/javascript" charset="utf-8" ></script>
        {{-- JS Bootstrap --}}
        <script src="{{ asset('/bootstrap/js/bootstrap.js') }}" type="text/javascript" charset="utf-8" ></script>
 <script src="{{ asset ('js/ckeditor/ckeditor.js') }}"  type="text/javascript" charset="utf-8" ></script>
 <script>
      CKEDITOR.replace("profint",{
       language: 'uk',
       uiColor: '#f0f0f0', 
     });
       CKEDITOR.replace("disciplines",{
       language: 'uk',
       uiColor: '#f0f0f0',
     });
      </script>
@endsection