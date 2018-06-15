@extends('front-end.layouts.frontLayout')
@section('title','GCR-Cloud | News')
@section('banner-image',asset($banner->getImage()))
@section('content')
    <div class="container">
	<div class="mrTop">
		<div class="news">
		<div class="col-md-10 col-sm-9 col-xs-12 col-pdn mobPdnone">
		{{--{{var_dump($news)}}--}}
			@forelse($news as $new)
			<div class="col-md-4 col-sm-6 clearfix">
				<article class="news-post">
					 <div class="post-img">
						<img src="{{asset($new->getThumbnail())}}" alt="{{$new->getNewsHeading()}}" class="img-responsive">
							<div class="date"> {{ ($new->getSource())?$new->getSource():"GCR" }} {{ $new->getCreatedAt()->format('D d-F-Y')}} </div>
					 </div>
					 
				<div class="atag">
					<a href="{{route('news.list',['id'=>$new->getUrlSlug()])}}" target="_blank">{{$new->getNewsHeading()}}</a>
				</div>
				<div style="height:109px;overflow: hidden;text-align: justify;">
                	{!!strip_tags(\Illuminate\Support\Str::words(trim($new->getNewsSummary()),150,' ...')) !!}
                </div>
				</article>
			</div>
			@empty
			@endforelse
		</div>
	
	<div class="col-md-2 col-sm-3 col-xs-12 side-bar">
	
	
			<div class="heading-side-bar margin-bottom-10">
                <h4>Archives</h4>
              </div>
			 <div class="clearfix"></div>
			 @foreach($sortedData as $key=>$value)
				 <h4 style="color:#848484;font-style:italic;">{{$key}}</h4>
				 <ul class="cate">
				 @foreach($value as $data)
					 <li style="font-style:italic"><strong>{{$data['updateAt']}}</strong> - <a href="{{route('news.list',['id'=>$data['url']])}}" target="_blank">{{$data['heading']}}</a></li>
				 @endforeach
				 </ul>
			 @endforeach

		
	 </div>
	</div>
	
	 
	
		 
			</div>
    </div>
	<style>
	
		.newsRight{border: 1px solid #efefef; background: #fbfbfb; margin: 114px 0 0 0;}
	</style>
@endsection