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
          @if ( $page != null )
                <div class="panel-heading">
                <a href="/user/masterdocs/" class="btn btn-submit"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <h3 class="page-header" style="margin-top: 10px !important;">@lang('user.page_change')</h3></div>
                 <div class="form-user">
                       <form method = "POST" action="{{ route('updatemasterdoc') }}">
                {{ csrf_field() }}
    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.master_works.title')</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "name" value="{{ $work->name }}">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.master_works.date')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "date" name = "datepublication" value="{{ $work->datepublish }}">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.master_works.description')</span>  
        </div>
        <div class = "col-md-8">
            <textarea name = "description" id = "description">{{ $work->description }}</textarea>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.master_works.full_description')</span>  
        </div>
        <div class = "col-md-8">
            <textarea name = "maintext" id = "maintext">{{ $work->mainText }}</textarea>
        </div>
    </div>

    <input type="hidden" name="id_mw" value="{{ $id }}">
    <div class = "row text-right">
        <button type="submit" name="Next" class="btn">
            @lang('user.change_btn')
            <i class="fa fa-chevron-right" aria-hidden="true"></i>
        </button>
    </div>
    </form>   
    </div>

        <table class="table">
                <caption style="text-align: center;">@lang('user.master_files.title')</caption>
                <thead>
                <tr>
                <th></th>
                <th>@lang('user.master_files.files')</th>
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
        <span>@lang('user.master_works.add_files')</span>  
        </div>
        <div class = "col-md-8">
            <input type="file" name="filefield[]" multiple="true">    
        </div>
          <div class = "row text-right">
      <input type="submit" name="add" value="@lang('user.add_btn')" class = "btn">  
     </div> 
    </div>
   
    </form>
                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('messages.no_data')</h3></div>
                @endif
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
    selector: '#description',
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
    selector: '#maintext',
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

