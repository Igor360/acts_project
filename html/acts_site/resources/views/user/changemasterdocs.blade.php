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
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('user.page_master_work')</h3></div>
                <form method="GET">
                    <input name = "search_title" placeholder="@lang('user.search_query')" style = "width: 100%; border-color: #063cc7; color : #063cc7;"> 
                    <div class="text-right">
                     <input type="submit" name="seach" class="btn search_btn text-right" value="@lang('admin.search_btn')">
                    </div>
                </form>
                	    <table class="table">
                    <caption style="text-align: center;">@lang('user.master_works.title')</caption>
                <thead>
                <tr>
                <th></th>
                <th>@lang('user.master_works.name')</th>
                <th>@lang('user.master_works.description')</th>
                <th>@lang('user.master_works.date')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($works as $work)
                <tr>
                <td>
                    <form method = "POST" action="{{ route('deletemasterdoc') }}" >
                    {{ csrf_field() }}
                        <button type="submit" class="btn" name="num" value="{{ $work->masterwork_id }}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a class="btn" href="/user/masterdocs/change/{{$work->masterwork_id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                <td>{{ $work->name }}</td>
                <td>{!! $work->description !!}</td>
                <td>{{ $work->datepublish }}</td>
                </tr>
                @endforeach
                </tbody>
                </table>

                <div class = "text-center">
                  @if(isset($search_query))
                    {{ $works->appends($search_query)->links() }}
                  @else
                    {{ $works->links() }}
                  @endif
                </div>

                 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('user.page_add_master_work')</h3></div>
                 <div class="form-user">
            <form method = "POST" action="{{ route('addmasterdocs') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.master_works.name')</span> 
        </div>
        <div class = "col-md-8">
            <input type = "text" name = "name">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.master_works.date')</span>   
        </div>
        <div class = "col-md-8">
            <input type = "date" name = "datepublication">
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.master_works.description')</span>  
        </div>
        <div class = "col-md-8">
            <textarea name = "description" id = "description"></textarea>
        </div>
    </div>

    <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.master_works.full_description')</span>  
        </div>
        <div class = "col-md-8">
            <textarea name = "maintext"  id = "maintext"></textarea>
        </div>
    </div>

     <div class = "row">
        <div class = "col-md-4">
        <span>@lang('user.master_works.add_files')</span>  
        </div>
        <div class = "col-md-8">
            <input type="file" name="filefield[]" multiple="true">        
        </div>
    </div>
       
    <input type="hidden" name="page" value="next">
    <div class = "row text-right">
            <button type="submit" name="Next" class="btn">
          @lang('user.add_btn')
            <i class="fa fa-plus" aria-hidden="true"></i>
            </button>
    </div>
    </form>   
    </div>
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
      </script>

@endsection

