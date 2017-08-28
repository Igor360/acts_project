@include('layouts.header')
@include('layouts.slider')
<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">

@include('article.generateArticle')
     <!-- Section news -->
     <section class = "article_block bounceInUp wow col-xs-12" data-wow-duration="0.5s" data-wow-delay="0.2s" data-wow-offset = "100">
       <h2 class="c__block-title" align="center">@lang('article.news')</h2>
       <div class="news">
@if ($NewsMain != null)
  @foreach ($NewsMain as $news)
        <a class="news__news" href="/read/{{$news->article_id}}">
        <div class="news__news__img">
        <img src="{{ $news->img }}" alt="">
        </div>
        <h3 class="news__news__header">
        {{ $news->title }}
        </h3>
        <span class="news__news__date">
        <?php  echo \App\Articles::ConvertDate($news->date); ?>
        </span>
        </a>
  @endforeach
@endif

</div>
<a href="/archive/news" class="c__button btn" style="margin-left: 40.2%; margin-top: 2.5%; padding-top: 0px;">@lang('article.news_archivebtn')</a>
</section>
<!-- End news -->
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
