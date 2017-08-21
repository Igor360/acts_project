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
                <div class="panel-heading">
      <a href="/admin/articles/" class="btn btn-submit"> <i class="fa fa-chevron-left" aria-hidden="true"></i></a>
      <h3 class="page-header" style="margin-top: 10px !important; color: black;">@lang('admin.page_chang_article')</h3></div>


@if (isset ($message))
<div class="info-message" style="background-color:{{ $message->has_errors ? '#f6979e' : '#ddd' }};">
 <div class="row"><img src="{{ $message->has_errors ? asset('img/icons/error.png') : asset('img/icons/info.png') }}"> &nbsp{{ $message->text }}</div>
</div>
@endif
  <form method = "POST" action="{{ route('updatearticle')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
   	<div class = "row">
   		<div class = "col-md-4">
   		<span>@lang('article.add_article_form.title')</span>	
   		</div>
   		<div class = "col-md-4">
   			<input type = "text" name = "title" value="{{ $article->title}}">
   		</div>
   	</div>

   	  <div class = "row">
         <div class = "col-md-4">
         <span>@lang('article.add_article_form.page')</span>   
         </div>
         <div class = "col-md-8">
            <select name="page">
            @foreach ($pages as $p)
             @if($p->page_id == $article->page_id)
              <option selected disabled>{{ $p->Name }}</option>
              @break
             @endif
            @endforeach
            @foreach ($pages as $p)
            <option value="{{ $p->page_id }}">{{ $p->Name }}</option>
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
            <textarea id = "description"  name = "description">
            @foreach ($description as $d)
             {{ $d->text }}
            @endforeach
             </textarea>
        </div>
    </div>

      <div class = "row">
        <div class = "col-md-4">
        <span>@lang('article.add_article_form.text')</span>   
        </div>
        <div class = "col-md-8">
            <textarea id = "idtext"  name = "text">
            @foreach ($text as $t)
             {{ $t->text }}
            @endforeach
             </textarea>
        </div>
    </div>


  <div class = "row">
        <div class = "col-md-4">
        <span>@lang('article.add_article_form.is_other_text')</span>   
        </div>
        <div class = "col-md-8">
            <input type="radio" name = "isText" value="1" {{ $article->isText == 1
            ? 'checked = "checked"' : '' }}>@lang('article.is_other_text_check.is')<br>
            <input type="radio" name = "isText" value="0" {{ $article->isText == 0
            ? 'checked = "checked"' : '' }}>@lang('article.is_other_text_check.none')
        </div>
    </div>

    <input type="hidden" name="article" value="{{ $article_id }}">

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
            <span>@lang('admin.message_article')</span>   

             <table class="table">
                <caption style="text-align: center;">@lang('admin.article_files_table.title')</caption>
                <thead>
                <tr>
                <th></th>
                <th>@lang('admin.article_files_table.files')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($files as $file)
                <tr>
                <td>
                    <form method = "POST" action="{{ route ('deletearticlefile') }}" >
                    {{ csrf_field() }}
                      <input type="hidden" name="id_a" value="{{$article_id}}">
                        <button type="submit" class="btn" name="num" value="{{ $file->file_id }}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                </td>
                <td><a href="{{ route('getfile', $file->filename) }}">{{ $file->originalname }}</a></td>
                </tr>
                @endforeach
                </tbody>
                </table>

            <form method = "POST" action="{{ route ('addarticlefiles') }}" enctype="multipart/form-data">  
            {{ csrf_field() }}  
             <input type="hidden" name="id_a" value="{{ $article_id }}">
     <div class = "form-user">
        <div class = "col-md-4">
        <span>@lang('article.add_article_form.add_files')</span>  
        </div>
        <div class = "col-md-8">
            <input type="file" name="filesfield[]" multiple="true">    
        </div>
          <div class = "row text-right">
      <input type="submit" name="add" value="@lang('admin.add_btn')" class = "btn">  
     </div> 
    </div>
   
    </form>
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