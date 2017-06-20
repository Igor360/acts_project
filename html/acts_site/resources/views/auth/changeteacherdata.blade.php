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
          <div class="form-user">
          @if ( $page != null )
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">Зміна анкети</h3></div>
                @if(isset($message))
                    <span>{{ $message }}</span>
                @endif
                <form method = "POST" action="{{ route('changeteacher') }}">
                    {{ csrf_field() }}

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
            <option></option>
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

