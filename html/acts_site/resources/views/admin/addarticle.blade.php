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
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">@lang('admin.page_add_article_main')</h3></div>

@if (isset ($message))
<div class="row" style="text-align: center;">{{ $message }}</div>
@endif
  <form method = "POST" action="{{ route('insertarticle')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('article.add_article_form.title')</span>	
   		</div>
   		<div class = "col-md-4">
   			<input type = "text" name = "title" required="">
   		</div>
   	</div>

   	  <div class = "row">
         <div class = "col-md-4">
         <span>@lang('article.add_article_form.page')</span>   
         </div>
         <div class = "col-md-8">
            <select name="page" required="">
            <option></option>
            @foreach ($pages as $p)
            <option value="{{ $p->id }}">{{ $p->Name }}</option>
            @endforeach
            </select>
         </div>
      </div>

 <div class = "row">
         <div class = "col-md-4">
         <span>@lang('article.add_article_form.type_article')</span>   
         </div>
         <div class = "col-md-8">
            <select name="typearticle" required="">
            <option ></option>
            @foreach ($typesarticle as $ta)
            <option value="{{ $ta->id }}">{{ $ta->name }}</option>
            @endforeach
            </select>
         </div>
      </div>
        

<div class="row">
        <div class = "col-md-4">
         <span>@lang('article.add_article_form.photo')</span>   
         </div>
      <div class="col-md-8">
         <input type = "text" name="photo" placeholder="@lang('article.add_article_form.photo_link')" style = "margin-top: 5px;">
         <br>
         <input type = "file" name="photofile" style = "margin-top: 10px; font-size: 8pt; margin: 0 auto; line-height: 0px;" accept="image/*">
      </div>
</div>
 
 <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important; color: black;">@lang('admin.page_add_other_data')</h3></div>

      <div class = "row">
         <div class = "col-md-4">
         <span>@lang('article.add_article_form.description')</span>   
         </div>
         <div class = "col-md-8">
           <textarea id = "description"  name = "description"> </textarea>
         </div>
      </div>

      <div class = "row">
        <div class = "col-md-4">
        <span>@lang('article.add_article_form.text')</span>   
        </div>
        <div class = "col-md-8">
            <textarea id = "idtext"  name = "text"> </textarea>
        </div>
    </div>

 <div class = "row">
        <div class = "col-md-4">
        <span>@lang('article.add_article_form.add_files')</span>  
        </div>
        <div class = "col-md-8">
            <input type="file" name="filesfield[]" multiple="true">        
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


    </div>

    <!-- Scripts -->

        <script src="{{ asset('/bootstrap/js/jquery.js') }}" type="text/javascript" charset="utf-8" ></script>
        {{-- JS Bootstrap --}}
        <script src="{{ asset('/bootstrap/js/bootstrap.js') }}" type="text/javascript" charset="utf-8" ></script>
 <script src="{{ asset ('js/ckeditor/ckeditor.js') }}"  type="text/javascript" charset="utf-8" ></script>
 <script>
      CKEDITOR.replace("idtext",{
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
         CKEDITOR.replace("description",{
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