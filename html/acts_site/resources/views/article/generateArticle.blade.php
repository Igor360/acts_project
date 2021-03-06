<?php
use App\Text as Text;
use App\ArticleFiles;
?>
@if (isset($Articles))
@if (count($Articles) > 0)
	@foreach ($Articles as $article)
	   <section class = "article_block">
  	 @if ($article != "NULL")
 		 <h2 class="c__block-title col-xs-12" style="text-align: left;">{{ $article->title }}</h2>
 		 @endif
     <div class = "row">
      @if ($article->img != null)
  			<img class="presentation" data-wow-duration="2s" src="{{$article->img}}" alt="" height="300px" width="200px" align="center"><br>
      @endif
          <?php

            if($page != "more")
              $texts = Text::where('article_id', $article->article_id)->where('texttype_id',2)->get();
            else
              $texts = Text::where('article_id', $article->article_id)->orderBy('texttype_id', 'desc')->get();

             foreach ($texts as $text)
             {
              echo "<p>".$text->text."</p>";
             }

                $files = ArticleFiles::getFiLes($article->article_id,$article->img);
                if ($files != null)
                 {
                  echo "<hr>";
                  echo "<span><b>Файли:</b><br></span>";
                  foreach ($files as $file)
                    echo "<a href=".route('getfile', $file->filename)."> {$file->originalname}</a><br>";
                  }


        ?>
      <br>
     </div>
     @if ($article->isText and $page != 'more')
  			<p class="text-right"><a class="social-url" href = "/read/{{$article->article_id}}"><button type = "button" class = "btn btn-default">@lang('article.article_morebtn')</button></a></p>
     @endif

    </section>    <br>
  @endforeach
@else
	<h2 class="c__block-title col-xs-12" style="text-align: left;">@lang('messages.no_data')</h2><hr>
@endif
@else
<h2 class="c__block-title col-xs-12" style="text-align: left;">@lang('messages.no_data')</h2><hr>
@endif
