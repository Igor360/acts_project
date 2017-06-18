<?php 
  require_once('generateText.php');
?>
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
             foreach (AddTextStyles($article->id) as $text)
             {
              echo $text->text;
              echo "<br><br>";
             }
        ?>
      <br>

      @if ($article->isText)
  			<p class="text-right"><a class="social-url" href = ""><button type = "button" class = "btn btn-default">Детальнiше</button></a></p>
     @endif
    </section>    <br>  
  @endforeach
@else
	<h2 class="c__block-title col-xs-12" style="text-align: left;">Дані відсутні</h2><hr>
@endif