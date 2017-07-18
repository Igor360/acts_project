    <?php  
  require_once('ConvertDate.php');
   ?>
     
       <h2 class="c__block-title" style="text-align: left;">@lang('article.news')</h2>
       <div class="news">
@if (count($NewsMain) > 0)
  @foreach ($NewsMain as $news) 
        <a class="news__news" href="/read/{{$news->id}}">
        <div class="news__news__img">
        <img src="{{ $news->img }}" alt="">
        </div>
        <h3 class="news__news__header">
        {{ $news->title }}
        </h3>
        <span class="news__news__date">
        <?php  echo ConvertDate($news->date); ?>
        </span>
        </a>
  @endforeach
@else
  <h2 class="c__block-title col-xs-12" style="text-align: left;">@lang('messages.no_data')</h2><hr>
@endif
</div>
