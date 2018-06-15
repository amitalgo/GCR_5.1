@extends('front-end.layouts.frontLayout')
@section('title','GCR-Cloud | Product')
@section('banner-image',asset($banner['banner']))
@section('content')

<div class="loader"></div>
    <div class="container">
	<!--<div class="flt">-->
	<!--	<h2>Products</h2>-->
	<!--<hr>-->
	<!--</div>-->
	<div class="row">
		<div class="col-md-2 col-sm-2 col-xs-12"></div>
	<div class="col-md-8 col-sm-3 col-xs-12">
	<div class="brdCum">
					<ul>
						<li><a href="{{route('home')}}">Home</a>/</li>
						<li><a href="{{isset($solutionSlug)&&null!=$solutionSlug?route('solution.index',['id'=>$solutionSlug]):route('solution.show',['id'=>$tagId])}}">Solutions</a>/</li>
						<li> {{$scenarioProducts[0]->getScenarioId()->getName()}}</li>
					</ul>
				</div></div>
	<div class="col-md-2 col-sm-2 col-xs-12"></div>
	</div>
	
        <div class="">
        	<div class="col-md-2 col-sm-3 col-md-12">
        		<!--
        		@if(!$producttags->isEmpty())
				<form class="form-horizontal" role="form" id="filterForm" action="{{route('solution.filterproducts',['id'=>$id])}}" method="POST">
					{{ csrf_field() }}
					<div class="leftDrop">
						<h3>Filters</h3>
						<div class="pdn">						
							<!-- <h4>Product</h4> --
							<div class="checkbox">
						          <label>
						          	<input class="filter-checkbox-all" type="checkbox" />
						          	<span class="cr"><i class="cr-icon fa fa-check"></i></span>
						          		All
						          </label>
						     </div>
							@foreach($producttags as $producttag)
								@if($producttag->getIsActive())
								<div class="checkbox">
						          <label>
						            <input class="filter-checkbox" type="checkbox" value="{{$producttag->getId()}}" name="product-filter[]" {{isset($selectedTags)&&in_array($producttag->getId(), $selectedTags)?'checked':''}}>
										<span class="cr"><i class="cr-icon fa fa-check"></i></span>
										<div class="solu">
										{{$producttag->getTagName()}}</div>
									</label>
						        </div>
						        @endif
							@endforeach
						</div>
					</div>
					<div class="filtr-btn">
						<button type="submit" class="btn btn-sm btn-primary pull-right filter-search">Search</button>
					</div>
				</form>
				@endif-->
			</div> 
			<div class="col-md-8 col-sm-8 col-xs-12">
				@if($scenarioProducts)
				    <div class="row">
				        <div class="col-md-12"><h4>{{$scenarioProducts[0]->getScenarioId()->getName()}}</h4></div>
				    </div>
					@foreach($scenarioProducts as $scenarioProduct)
					@if($scenarioProduct->getProductId()->getStatus())
						<div class="row Products">
							<div class="col-md-4 col-sm-4 col-md-12">
										<div class="Products">
										<ul class="scroller">
									@forelse($scenarioProduct->getProductId()->getProductAttachment() as $attachment)
										<!-- <li>
										<a href="{{$attachment->getScenarioImg()}}" data-title="{{$scenarioProduct->getProductId()->getName()}}" >
											<img src="{{$attachment->getScenarioImg()}}" class="img-responsive" alt="{{$attachment->getType()}}">
										</a>
										</li> -->
										
										<li data-rel="group{{$scenarioProduct->getProductId()->getId()}}">
									@if($attachment->getType()=='video')
										<?php $newstr = 'https://www.youtube.com/embed';?>
										<a href="{{$newstr.substr($attachment->getUrl(), strrpos($attachment->getUrl(),'/')).'?autoplay=0&control=1'}}" data-title="{{$scenarioProduct->getProductId()->getName()}}" data-type="iframe" data-height="700px">
											<img src="{{asset('images/YouTube-Videos.jpg')}}" class="img-responsive" alt="{{$attachment->getType()}}">
										</a>
									@else
										<a class="img-responsive" href="{{$attachment->getScenarioImg()}}" data-title="{{$scenarioProduct->getProductId()->getName()}}" >
											<img src="{{$attachment->getScenarioImg()}}" class="img-responsive" alt="{{$attachment->getType()}}">
										</a>
									@endif
								</li>
								
									@empty
									@endforelse
										</ul>
								</div>
							</div>
							
							<div class="col-md-8 col-sm-8 col-md-12">
								<h1>{{$scenarioProduct->getProductId()->getName()}}</h1>
								<h2>By {{$scenarioProduct->getProductId()->getVender()}}</h2>
                                <?php $description = $scenarioProduct->getProductId()->getDescription().'<br/>'.$scenarioProduct->getProductId()->getExtraDescription(); ?>
								<div class="PDesc"> <p>{!! \Illuminate\Support\Str::words($description, 40,' ...')!!}</p>

									@if(str_word_count($description)>40)

									<a type="button" href="javascript:void(0)" class="more-btn m"  data-attr="{{$description}}"  data-attrshort="{!! \Illuminate\Support\Str::words($description, 40,' ...')!!}">more</a>
									@endif
								</div>
								<div>
									<button type="button" class="btn-primary inquire-btn" data-pid="{{$scenarioProduct->getProductId()->getId()}}"><i class="fa fa-envelope-o" aria-hidden="true"></i>
 Enquire Now</button>
								</div>
							</div>				
						</div>	
						@endif
					@endforeach
				@else
					<div class="row">
						<p>No products found..</p>
					</div>
				@endif
			</div>
			<div class="col-md-2 col-md-12 hidden-sm hidden-xs">
				{!! view('front-end.component.ads',['ads'=>$ads]) !!}
					</div>
		</div>





	</div>
@endsection