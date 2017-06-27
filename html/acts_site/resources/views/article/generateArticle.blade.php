<?php   
use App\Text as Text; 
use App\ArticleFiles;
?>
@if ($Articles != null)
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
              $texts = Text::where('article_id', $article->id)->where('type_id',2)->get();
            else
              $texts = Text::where('article_id', $article->id)->orderBy('type_id', 'desc')->get();

             foreach ($texts as $text)
             {
              echo "<p>".$text->text."</p>";
             }

             if ($page == 'more')
             {
               
                $files = ArticleFiles::getFiLes($article->id,$article->img);
                if ($files != null)
                 { 
                  echo "<hr>";
                  echo "<span><b>Файли:</b><br></span>";
                  foreach ($files as $file)
                    echo "<a href=".route('getfile', $file->filename)."> {$file->originalname}</a><br>";
                  }

             }
        ?>
      <br>
     </div>
  @if ($article->isText and $page != 'more')
  			<p class="text-right"><a class="social-url" href = "/read/{{$article->id}}"><button type = "button" class = "btn btn-default">Детальнiше</button></a></p> 
     @endif

    </section>    <br>  
  @endforeach
@else
	<h2 class="c__block-title col-xs-12" style="text-align: left;">Дані відсутні</h2><hr>
@endif