
@include('layouts.header')

<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
@if ( isset($docs))
@foreach ($docs as $doc) 
	   <section class = "article_block">
 		 <h2 class="c__block-title col-xs-12" style="text-align: left;">{{ $doc->name }}</h2>
         {!! $doc->description !!}
      <br>
  		<p class="text-right"><a class="social-url" href = "/masterdocs/more/{{$doc->masterwork_id}}/"><button type = "button" class = "btn btn-default">@lang('article.article_morebtn')</button></a></p>
    </section>    <br>  
  @endforeach
@elseif (isset($doc))
 <section class = "article_block">
 		 <h2 class="c__block-title col-xs-12" style="text-align: left;">{{ $doc->name }}</h2>
         {!! $doc->description !!}
      <br>
      <hr>
      {!! $doc->mainText !!}
       
                <hr>
                <span><b>@lang('article.files'):</b><br></span>
                @foreach ($files as $file)
                <a href="{{ route('getfile', $file->filename) }}">{{ $file->originalname }}</a><br>
                @endforeach
               
    </section>
@else
<h2 class="c__block-title col-xs-12" style="text-align: left;">@lang('messages.no_data')</h2><hr>
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


