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
          @if ( $page != null  and $teacher != null and $user != null )
                <div class="panel-heading">
                    <a href="/admin/" class="btn btn-submit"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <h3 class="page-header" style="margin-top: 10px !important; color: black;">@lang('admin.page_add_main_data')</h3></div>

@if (isset ($message))
<div class="row" style="text-align: center;">{{ $message }}</div>
@endif
          	  	<form method = "POST" action="{{ route('changeuserdata_admin')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.user_login')</span>	
   		</div>
   		<div class = "col-md-4">
   			<input type = "text" name = "username" placeholder="{{ $user->username }}">
   		</div>
   	</div>

    @if ($errors->has('username'))
      <span class="help-block">
       <strong>{{ $errors->first('username') }}</strong>
      </span>
     @endif

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.user_password')</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password">
   		</div>
   	</div>

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth.repeat_password')</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "password" name = "password__confirmation" >
   		</div>
   	</div>

    @if ($errors->has('password'))
      <span class="help-block">
       <strong>{{ $errors->first('password') }}</strong>
      </span>
     @endif

   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('auth,user_email')</span>	
   		</div>
   		<div class = "col-md-8">
   			<input type = "email" name = "email" placeholder="{{ $user->email }}">
   		</div>
   	</div>

   	 @if ($errors->has('email'))
      <span class="help-block">
       <strong>{{ $errors->first('email') }}</strong>
      </span>
     @endif

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('auth.is_admin.question')</span>   
         </div>
         <div class = "col-md-8">
            <select name="isadmin">
            <option value="0" {{ !$user->isadmin ? 'selected' : ''}}>@lang('auth.is_admin.no')</option>
            <option value="1" {{ $user->isadmin ? 'selected' : ''}}>@lang('auth.is_admin.yes')</option>
            </select>
         </div>
      </div>

    @if ($errors->has('isadmin'))
      <span class="help-block">
       <strong>{{ $errors->first('isadmin') }}</strong>
      </span>
     @endif

         <div class = "row">
         <div class = "col-md-4">
         <span>@lang('auth.has_etudes.question')</span>   
         </div>
         <div class = "col-md-8">
            <select name="hasmaster">
            <option  {{ !$user->hasmasters ? 'selected' : ''}} value="0">@lang('auth.has_etudes.no')</option>
            <option  {{ $user->hasmasters ? 'selected' : ''}} value="1">@lang('auth.has_etudes.yes')</option>
            </select>
         </div>
      </div>

    @if ($errors->has('hasmaster'))
      <span class="help-block">
       <strong>{{ $errors->first('hasmaster') }}</strong>
      </span>
     @endif
 
 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">@lang('admin.page_add_other_data')</h3></div>
   <div class = "row">
    <div class="col-md-8">
      <div class = "row">
        <div class = "col-md-6">
        <span>@lang('teachstaff.first_name')</span>   
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "firstname" placeholder="{{ $teacher->FirstName }}">
        </div>
    </div>

     @if ($errors->has('firstname'))
      <span class="help-block">
       <strong>{{ $errors->first('firstname') }}</strong>
      </span>
     @endif

    <div class = "row">
        <div class = "col-md-6">
        <span>@lang('teachstaff.middle_name')</span>    
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "middlename" placeholder="{{ $teacher->MiddleName }}">
        </div>
    </div>

    @if ($errors->has('middlename'))
      <span class="help-block">
       <strong>{{ $errors->first('middlename') }}</strong>
      </span>
     @endif

    <div class = "row">
        <div class = "col-md-6">
        <span>@lang('teachstaff.last_name')</span>   
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "lastname" placeholder="{{ $teacher->LastName }}">
        </div>
    </div>

    @if ($errors->has('lastname'))
      <span class="help-block">
       <strong>{{ $errors->first('lastname') }}</strong>
      </span>
     @endif

      </div>
      <div class="col-md-4 text-center" style="border-left: 1px solid #57a2e3">
         <img src="{{ $teacher->Photo }}" style="height: 140px; border-radius: 5px; margin: 0 auto;">
         <input type = "text" name="photo" placeholder="@lang('teachstaff.photo_link')" style = "margin-top: 5px;">
         <input type = "file" name="photofile" style = "margin-top: 10px; font-size: 8pt; margin: 0 auto; line-height: 0px;" accept="image/*">
    @if ($errors->has('photo'))
      <span class="help-block">
       <strong>{{ $errors->first('photo') }}</strong>
      </span>
     @endif

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
             @if($position->id == $teacher->position_id)
              <option disabled selected>{{ $position->name }}</option>
              @break
             @endif
            @endforeach
            @foreach ($positions as $position)
                <option value="{{ $position->id }}">{{ $position->name }}</option>
            @endforeach
            </select>
         </div>
      </div>

      @if ($errors->has('position'))
      <span class="help-block">
       <strong>{{ $errors->first('position') }}</strong>
      </span>
     @endif

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.profession')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "profession" placeholder="{{ $teacher->Profession }}">
        </div>
    </div>

    @if ($errors->has('profession'))
      <span class="help-block">
       <strong>{{ $errors->first('profession') }}</strong>
      </span>
     @endif

      <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.faculty')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "department" placeholder="{{ $teacher->Department }}">
        </div>
    </div>
    
      @if ($errors->has('department'))
      <span class="help-block">
       <strong>{{ $errors->first('department') }}</strong>
      </span>
     @endif

            <div class="line"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.datetime')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "datetime" placeholder="{{ $teacher->TimeDay }}">
         </div>
      </div>

      @if ($errors->has('datetime'))
      <span class="help-block">
       <strong>{{ $errors->first('datetime') }}</strong>
      </span>
     @endif

     <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.room')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "room" placeholder="{{ $teacher->Room }}">
         </div>
      </div>

      @if ($errors->has('room'))
      <span class="help-block">
       <strong>{{ $errors->first('room') }}</strong>
      </span>
     @endif

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.phone')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "phone" placeholder="{{ $teacher->Phone }}">
         </div>
      </div>

      @if ($errors->has('phone'))
      <span class="help-block">
       <strong>{{ $errors->first('phone') }}</strong>
      </span>
     @endif

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.mobile')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "mobile" placeholder="{{ $teacher->Mobile }}">
         </div>
      </div>

    @if ($errors->has('mobile'))
      <span class="help-block">
       <strong>{{ $errors->first('mobile') }}</strong>
      </span>
     @endif

            <div class="row"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.profinterest')</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "profint" id = "profint">{{ $teacher->ProfInterest }}</textarea>
         </div>
      </div>

      @if ($errors->has('profint'))
      <span class="help-block">
       <strong>{{ $errors->first('profint') }}</strong>
      </span>
     @endif
          
      <div class = "row">         
         <div class = "col-md-4">         
         <span>@lang('teachstaff.disciplines')</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "disciplines" id = "disciplines">{{ $teacher->Discipline }}</textarea>
         </div>
      </div>

    @if ($errors->has('disciplines'))
      <span class="help-block">
       <strong>{{ $errors->first('disciplines') }}</strong>
      </span>
     @endif

        <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.is_teacher.question')</span>   
         </div>
         <div class = "col-md-8">
            <select name="isteacher">
            <option {{ $teacher->isteacher ? 'selected' : '' }} value="1">@lang('teachstaff.is_teacher.yes')</option>
            <option {{ !$teacher->isteacher ? 'selected' : '' }} value="0">@lang('teachstaff.is_teacher.no')</option>
            </select>
         </div>
      </div>

      @if ($errors->has('isteacher'))
      <span class="help-block">
       <strong>{{ $errors->first('isteacher') }}</strong>
      </span>
     @endif

      <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color:black;">@lang('admin.page_add_links')</h3></div>
    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.website')</span>  
        </div>
        <div class = "col-md-4">
            <input type = "text" name = "anothersite" placeholder="{{ $links->AnotherSite }}">
        </div>
    </div>

    @if ($errors->has('anotersite'))
      <span class="help-block">
       <strong>{{ $errors->first('anothersite') }}</strong>
      </span>
     @endif

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.intellect')</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "intellect" placeholder="{{ $links->Intellect }}">
        </div>
    </div>

    @if ($errors->has('intellect'))
      <span class="help-block">
       <strong>{{ $errors->first('intellect') }}</strong>
      </span>
     @endif

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.timetable')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "timetable" placeholder="{{ $links->TimeTable }}">
        </div>
    </div>

    @if ($errors->has('timetable'))
      <span class="help-block">
       <strong>{{ $errors->first('timetable') }}</strong>
      </span>
     @endif

    <input name="id_user" value="{{ $userid }}" type="hidden">
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