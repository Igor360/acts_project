<?php   use App\Text as Text; ?>
@if ($Articles != null)
	@foreach ($Articles as $article) 
	   <section class = "article_block">
  	 @if ($article != "NULL")
 		 <h2 class="c__block-title col-xs-12" style="text-align: left;">{{ $article->title }}</h2>
 		 @endif
      @if ($article->img != null)
  			<img class="presentation" data-wow-duration="2s" src="{{$article->img}}" alt="" height="300px" width="200px" align="center"><br>
      @endif
          <?php

            if($page == "more")
              $texts = Text::where('article_id', $article->id)->where('type_id',2)->get();
            else
              $texts =Text::where('article_id', $article->id)->get();

             foreach ($texts as $text)
             {
              echo "<p>".$text->text."</p>";
             }
        ?>
      <br>

  @if ($article->isText and $page != 'more')
  			<p class="text-right"><a class="social-url" href = "/read/{{$article->id}}"><button type = "button" class = "btn btn-default">Детальнiше</button></a></p> 
     @endif
    </section>    <br>  
  @endforeach
@else
	<h2 class="c__block-title col-xs-12" style="text-align: left;">Дані відсутні</h2><hr>
@endif