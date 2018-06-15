<div class="leftSideBr">
    <h3>INDUSTRY</h3>

    <div class="leftscrol">



        <div style="overflow: hidden; position: relative;" id="news-container">
        <ul style="position: absolute; margin: 0pt; padding: 0pt; top: 0px;">
    	    @foreach($verticals as $vertical)
                <li style="margin: 0pt; padding: 0pt; height:30px; display: list-item;">
                    <div><a href="{{route('solution.index', ['solutionId'=>$vertical->getScenarioTitleSlug()->getUrlSlug()])}}">{{$vertical->getName()}}</a></div>
                </li>
                @endforeach
    		</ul>
    </div>
	
    </div>
    <div class="clearfix"></div>
    <h4>About GCR</h4>
    <div class="clearfix"></div>
    <p>{{strip_tags(\Illuminate\Support\Str::words($abouts->getDescription(), 19,' ...'))}} <a href="{{route('about-GCR')}}" style="color:#0197d9;">Read more</a></p>
</div>