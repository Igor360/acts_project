    <?php  
  require_once('ConvertDate.php');
   ?>
     
       <h2 class="c__block-title" style="text-align: left;">Новини</h2>
       <div class="news">
@if ($NewsMain != null)
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
@endif
</div>
