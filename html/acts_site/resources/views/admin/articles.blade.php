@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <div class="col-md-2 sidebar  col-md-offset-1">
                <h3 class="page-header" align="center">@lang('admin.sidebar_title')</h3>
     @include('admin.sidebar')
  </div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
          @if ( $page != null  and $articles != null)
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('admin.page_articles')</h3></div>

                 <form method="GET">
                	<input name = "search_title" placeholder="@lang('admin.enter_search_text')" style = "width: 100%; border-color: #063cc7; color : #063cc7;">
                    <div class="text-right">
                     <select name = "page_search" style=" border-color: #063cc7;">
                        <option selected disabled>@lang('admin.select_page')</option>
                        @foreach ($pages as $p)
                        <option value="{{ $p->page_id }}">{{ $p->Name }}</option>
                        @endforeach
                     </select>
                      <select name = "type" style=" border-color: #063cc7;">
                        <option selected disabled>@lang('admin.select_type_page')</option>
                        @foreach ($types_article as $ta)
                        <option value="{{ $ta->texttype_id }}">{{ $ta->name }}</option>
                        @endforeach
                     </select>
                     <input type="submit" name="seach" class="btn search_btn text-right" value="@lang('admin.search_btn')">
                    </div>
                 </form>

                <table class="table">
                    <caption style="text-align: center;">@lang('admin.article_table.title')</caption>
                <thead>
                <tr>
                <th></th>
                <th>@lang('admin.article_table.article_title')</th>
                <th>@lang('admin.article_table.page')</th>
                <th>@lang('admin.article_table.type_article')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($articles as $article)
                <tr>
                <td>
                    <form method = "POST" action="{{ route('deletearticle') }}">
                    {{ csrf_field() }}
                        <button type="submit" class="btn" name="num" value="{{ $article->article_id }}">
                            <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </button>
                    </form>
                    <a class="btn" href="/admin/articles/change/{{$article->article_id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                </td>
                <td>{{ $article->title }}</td>
                <td>{{ $article->page }}</td>
                <td>{{ $article->type }}</td>
                </tr>
                @endforeach
                </tbody>
                </table>
                <div class = "text-center">
                @if(isset($search_data))
                    {{ $articles->appends($search_data)->links() }}
                @else
                 {{ $articles->links() }}
                @endif
                </div>
                @else
                <div class="panel-heading"><h3 class="page-header" style="margin-top: 10px !important;">@lang('messages.no_data')</h3></div>
                @endif
            </div>
        </div>
    </div>
</div>



@endsection
