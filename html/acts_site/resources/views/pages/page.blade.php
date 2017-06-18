
@include('layouts.header')

<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
@if ( isset($Articles))
  @include('article.generateArticle')
@elseif ($page == "news_archive")
  @include('article.generateNews')
@else
<h2 class="c__block-title col-xs-12" style="text-align: left;">Дані відсутні</h2><hr>
@endif   



</div>
</div>
</div>
</div>
<!-- Scroll To Top Button -->
<a href="#" class="scroll-to-top-btn">
 <i class="icon-arrow-up"></i>   
</a><!-- .scroll-to-top-btn -->
<!-- flie Footer -->
@include('layouts.footer')
<!-- end Footer -->




