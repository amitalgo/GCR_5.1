@extends('front-end.layouts.frontLayout')
@section('title','GCR-Cloud | Solution List')
@section('banner-image',asset($banner['banner']))
@section('content')

    <div class="container">
	<!--<div class="flt">-->
	<!--	<h2>Solutions</h2>-->
	<!--<hr>-->
	<!--</div>-->
	<div class="row">
		<div class="col-md-2 col-xs-12"></div>
	<div class="col-md-8 col-xs-12">
	<div class="brdCum">
					<ul>
						<li><a href="{{route('home')}}">Home</a>/</li>
						<li>Solutions /</li>
						<li>{{$solutionName}}</li>
					</ul>
				</div></div>
	<div class="col-md-2 col-xs-12"></div>
	</div>
        <div class="">		
			<div class="col-md-2 col-sm-3 col-md-12">

				@if(!$solutiontags->isEmpty())
				<form class="form-horizontal" role="form" id="filterForm" action="{{isset($solutions)&&!empty($solutions)?route('solution.filtersolutions',['id'=>$solutions->getscenarioTitleSlug()->geturlSlug()]):''}}" method="POST">
					{{ csrf_field() }}
					<div class="leftDrop">
						<h3>Filters</h3>
						<div class="pdn">					
							<!-- <h4>Solution</h4> -->
							<div class="checkbox">
						          <label>
						          	<input class="filter-checkbox-all" type="checkbox" value="001" name="solution-tag[]"/>
						          	<span class="cr"><i class="cr-icon fa fa-check"></i></span>
						          		All
						          </label>
						     </div>     
							@foreach($solutiontags as $solutiontag)
						
							@if($solutiontag->getIsActive())
								<div class="checkbox">
						          <label>
						          	
						            <input class="filter-checkbox" type="checkbox" value="{{$solutiontag->getId()}}" name="solution-tag[]" {{isset($selectedTags)&&in_array($solutiontag->getId(), $selectedTags)?'checked':''}}>
										<span class="cr"><i class="cr-icon fa fa-check"></i></span>
										<div class="solu">
										{{$solutiontag->getTagName()}}</div>
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
				@endif
			</div>
			<div class="col-md-8 col-sm-8 col-md-12">
			    <div class="row"><div class="col-md-12"><h4>{{$solutions->getName()}}</h4></div></div>			
			<!-- 	<div class="row">
					@if($solutions->getScenarioDetail())
						@foreach($solutions->getScenarioDetail() as $scenarioDetail)
							<a href="{{route('solution.products',['id'=>$scenarioDetail->getId()])}}">
								<div class="col-md-4 col-md-12">
									<div class="solInerTab">
									<div class="divImg"><img src="{{asset('images/solution-1.jpg')}}" class="img-responsive" alt="solution-1"></div>			<h1>{{$scenarioDetail->getName()}}</h1>
										<p>{{$scenarioDetail->getDescription()}}</p>
									</div>
								</div>
							</a>
						@endforeach	
					@else
						<p>No solutions found..</p>
					@endif
				</div> -->

				<div class="row">
					@if($solutions->getScenarioDetail())
						@foreach($solutions->getScenarioDetail() as $scenarioDetail)
							@if($scenarioDetail->getStatus())
								{{--Amit 12-06-18 --}}
							<a href="{{route('solution.products',['id'=>$scenarioDetail->getScenarioDetailSlug()->getUrlSlug()])}}">
								<div class="col-md-4 col-md-12">
									<div class="solInerTab">
										<?php $file = $scenarioDetail->getImage(); ?>
									<div class="divImg"><img src="{{$scenarioDetail->getScenarioImg()
										}}" class="img-responsive" alt="solution-1"></div>			<h1>{{$scenarioDetail->getName()}}</h1>
										<p>{{$scenarioDetail->getDescription()}}</p>
									</div>
								</div>
							</a>
							@endif
						@endforeach	
					@else
						<p>No solutions found..</p>
					@endif
				</div>
			</div>
			<div class="col-md-2 col-md-12 hidden-sm hidden-xs">
				{!! view('front-end.component.ads',['ads'=>$ads]) !!}
					</div>
		</div>
    
@endsection