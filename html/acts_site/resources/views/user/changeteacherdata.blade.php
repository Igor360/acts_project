@extends('layouts.app')

@section('changeuserdata')

<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">@lang('user.sidebar_title')</h3>
     @include('user.sidebar')  
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
          <div class="form-user">
          @if ( $page != null )
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">@lang('user.page_teacher_data')</h3></div>
@if (isset ($message))
<div class="info-message" style="background-color:{{ $message->has_errors ? '#f6979e' : '#ddd' }};">
 <div class="row"><img src="{{ $message->has_errors ? asset('img/icons/error.png') : asset('img/icons/info.png') }}"> &nbsp{{ $message->text }}</div>
</div>
@endif
                <form method = "POST" action="{{ route('changeteacher') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}

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

    <div class = "row">
        <div class = "col-md-6">
        <span>@lang('teachstaff.middle_name')</span>    
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "middlename" placeholder="{{ $teacher->MiddleName }}">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-6">
        <span>@lang('teachstaff.last_name')</span>   
        </div>
        <div class = "col-md-6">
            <input type = "text" name = "lastname"  placeholder="{{ $teacher->LastName }}">
        </div>
    </div>
      </div>
      <div class="col-md-4 text-center" style="border-left: 1px solid #57a2e3">
         <img src="{{ $teacher->Photo }}" style="height: 140px; border-radius: 5px; margin: 0 auto;">
         <input type = "text" name="photo" placeholder="Посилання на фото" style = "margin-top: 5px;">
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
             @if ($teacher->position_id == $position->position_id)
              <option disabled selected>{{ $position->name }}</option>
             @endif
            @endforeach
            @foreach ($positions as $position)
                <option value="{{ $position->position_id }}">{{ $position->name }}</option>
            @endforeach
            </select>
         </div>
      </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.profession')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "profession" placeholder="{{ $teacher->Profession }}">
        </div>
    </div>

      <div class = "row">
        <div class = "col-md-4">
        <span>@lang('teachstaff.faculty')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "department" placeholder="{{ $teacher->Department }}">
        </div>
    </div>
    
            <div class="line"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.datetime')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "datetime" placeholder="{{ $teacher->TimeDay }}">
         </div>
      </div>

     <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.room')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "room" placeholder="{{ $teacher->Room }}">
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.phone')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "phone" placeholder="{{ $teacher->Phone }}">
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.mobile')</span>   
         </div>
         <div class = "col-md-8">
            <input type = "text" name = "mobile" placeholder="{{ $teacher->Mobile }}">
         </div>
      </div>

            <div class="row"></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.profinterest')</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "profint" id = "profint">{{ $teacher->ProfInterest}}</textarea>
         </div>
      </div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('teachstaff.disciplines')</span>   
         </div>
         <div class = "col-md-8">
            <textarea name = "disciplines" id = "disciplines">{{ $teacher->Discipline }}</textarea>
         </div>
      </div>

    <div class = "row text-right">
        <button type="submit" name="Save" class="btn">
            @lang('user.save_btn')
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
 <script src="{{ asset ('js/tinymce/tinymce.min.js') }}"  type="text/javascript" charset="utf-8" ></script>
 <script>
tinymce.init({
    selector: '#profint',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars',
    'insertdatetime nonbreaking save table contextmenu directionality',
    'textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'forecolor backcolor',
  image_advtab: true,
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ],
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
 });
   tinymce.init({
    selector: '#disciplines',
  height: 300,
  theme: 'modern',
  plugins: [
    'advlist autolink lists link image charmap preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars',
    'insertdatetime nonbreaking save table contextmenu directionality',
    'textcolor colorpicker textpattern imagetools'
  ],
  toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  toolbar2: 'forecolor backcolor',
  image_advtab: true,
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tinymce.com/css/codepen.min.css'
  ],
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
 });
      </script>
@endsection

