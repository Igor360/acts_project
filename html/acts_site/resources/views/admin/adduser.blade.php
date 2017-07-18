@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">@lang('admin.sidebar_title')</h3>
     @include('admin.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="col-md-12 panel panel-default">
            <div class = "form-user">
          @if ( $page != null )
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">@lang('admin.page_add_main_data')</h3></div>

@if (isset ($message))
<div class="row" style="text-align: center;">{{ $message }}</div>
@endif
          	  	<form method = "POST" action="{{ route('adminadduser')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.user_login')</span>	
   		</div>
   		<div class = "col-md-4">
   			<input type = "text" name = "username" required="">
   		</div>
   	</div>

@if (isset ($password_error))
<div class="row" style="text-align: center;">{{ $password_error }}</div>
@endif

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.user_password')</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password" required="">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.repeat_password')</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password2" required="">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.user_email')</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "email" name = "email" required="">
   		</div>
   	</div>

   	  <div class = "row">
         <div class = "col-md-4">
         <span>@lang('auth.is_admin.question')</span>   
         </div>
         <div class = "col-md-8">
            <select name="isadmin">
            <option selected disabled></option>
            <option value="0">@lang('auth.is_admin.no')</option>
            <option value="1">@lang('auth.is_admin.yes')</option>
            </select>
         </div>
      </div>

         <div class = "row">
         <div class = "col-md-4">
         <span>@lang('auth.has_etudes.question')</span>   
         </div>
         <div class = "col-md-8">
            <select name="hasmaster">
            <option value="0">@lang('auth.has_etudes.no')</option>
            <option value="1">@lang('auth.has_etudes.yes')</option>
            </select>
         </div>
      </div>
 
 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">@lang('admin.page_add_other_data')</h3></div>
   <div class = "row">
    <div class="col-md-8">
      <div class = "row">
        <div class = "col-md-6">
        <span>@lang('teachstaff.first_name')</span>   
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "firstname">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-6">
        <span>@lang('teachstaff.middle_name')</span>    
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "middlename" >
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-6">
        <span>@lang('teachstaff.last_name')</span>   
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "lastname" >
        </div>
    </div>
      </div>
      <div class="col-md-4 text-center" style="border-left: 1px solid #57a2e3">
         <img src="/img/Photo.png" style="height: 140px; border-radius: 5px; margin: 0 auto;">
         <input type = "text" name="photo" placeholder="@lang('teachstaff.photo_link')" style = "margin-top: 5px;">
         <input type = "file" name="photofile" style = "margin-top: 10px; font-size: 8pt; margin: 0 auto; line-height: 0px;" accept="image/*">
      </div>

   </div>

                  <div class="line"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.position')</span>   
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
        <span>@lang('teachstaff.profession')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "profession" >
        </div>
    </div>

      <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.faculty')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "department" >
        </div>
    </div>
    
            <div class="line"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.datetime')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "datetime" >
         </div>
      </div>

     <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.room')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "room" >
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.phone')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "phone" >
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.mobile')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "mobile" >
         </div>
      </div>

            <div class="row"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.profinterest')</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "profint" id = "profint"></textarea>
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.disciplines')</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "disciplines" id = "disciplines"></textarea>
         </div>
      </div>

        <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.is_teacher.question')</span>   
         </div>
         <div class = "col-md-8">
            <select name="isteacher">
            <option value="1">@lang('teachstaff.is_teacher.yes')</option>
            <option value="0">@lang('teachstaff.is_teacher.no')</option>
            </select>
         </div>
      </div>

      <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color:black;">@lang('admin.page_add_links')</h3></div>
    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.website')</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "anothersite">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.intellect')</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "intellect">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.timetable')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "timetable">
        </div>
    </div>


    <div class = "row text-right">
        <button type="submit" name="Save" class="btn">
            @lang('admin.save_btn')
            <i class="fa fa-sign-in" aria-hidden="true"></i>
        </button>
    </div>
    </form>




                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('messages.no_data')</h3></div>
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
       language: '<?php 
  switch (\App::getLocale()) {
    case 'en':
     echo 'en';
      break;
    
    default:
     echo 'uk';
      break;
    } 
    ?>',
       uiColor: '#f0f0f0', 
     });
       CKEDITOR.replace("disciplines",{
       language: '<?php 
  switch (\App::getLocale()) {
    case 'en':
     echo 'en';
      break;
    
    default:
     echo 'uk';
      break;
    } 
    ?>',
       uiColor: '#f0f0f0',
     });
      </script>
@endsection