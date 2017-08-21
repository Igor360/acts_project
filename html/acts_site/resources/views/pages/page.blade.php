
@include('layouts.header')

<div class="container-fluid">
 <div class = "container" id="main">
  <div class = "row">
   <div class = "col-sm-12 col-md-12 col-xs-12 main">
@if (isset($Articles))
	@if ($Articles != null)
  		@include('article.generateArticle')
	@else
		<h2 class="c__block-title col-xs-12" style="text-align: left;">@lang('messages.no_data')
		</h2><hr>
	@endif	
@elseif ($page == "news_archive")
  @include('article.generateNews')
@else
<h2 class="c__block-title col-xs-12" style="text-align: left;">@lang('messages.no_data')
</h2><hr>
@endif
  @if (isset($Articles) and $page != 'more')
   	<div class="text-center">
  	@if (isset($search_query))
  		{{ $Articles->appends($search_query)->links() }}
  	@else
       {{ $Articles->links() }}
    @endif
    </div>
  @endif
  @if (isset($NewsMain))
  	<div class="text-center">
		{{ $NewsMain->links() }}
    </div>
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




