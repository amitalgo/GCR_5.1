<div class="RightSideBr">
    <h1>News</h1>
    <div class="clearfix"></div>
	
	
	 
	<div class="setPos">
		<?php $seenews=0; ?>
    @forelse($news as $new)
    <?php $seenews++; ?>
	<div class="news-mar-bot">
		<div class="new-img"><img src="{{asset($new->thumbnail)}}" class="img-responsive" alt="right-side-img"></div>
	<div class="even-text">
		<a href="{{route('news.list',['id'=>$new->url_slug])}}" target="_blank">{{\Illuminate\Support\Str::words($new->news_heading,7,'')}} </a>
	</div>
	</div>
	<div class="clearfix"></div>
	@empty
        No News Found
    @endforelse
    @if($seenews>0)
		<div class="seebtn"><a href="{{route('news')}}" target="_blank">see more</a></div>
		@endif
   </div>
    
		
<div class="clearfix"></div>

<div class="event">
    <h1>Events</h1>
    <div class="clearfix"></div>
<div class="setPos">
	<?php $see=0 ?>
    @forelse($events as $event)
    <?php $see++ ;?>
	<div class="news-mar-bot">
	<div class="new-img"><img src="{{asset($event->thumbnail)}}" class="img-responsive" alt="right-side-img"></div>
    <div class="even-text">
		<a href="{{route('news.list',['id'=>$event->url_slug])}}" target="_blank">{{\Illuminate\Support\Str::words($event->news_heading,7,'')}}</a>
	</div>
    
	</div>
	<div class="clearfix"></div>
	 @empty
        No Events Found
    @endforelse
		
		@if($see>0)
		<span class="seebtn"><a href="{{route('news')}}" target="_blank">see more</a></span>
		@endif
	</div>
	</div>
 
   
</div>