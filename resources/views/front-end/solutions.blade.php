@extends('front-end.layouts.frontLayout')
@section('title','GCR-Cloud | Solutions')
@section('banner-image',asset($banner->getImage()))
@section('content')
    <div class="container">
    <!--<div class="flt">-->
    <!--    <h2>Solutions</h2>-->
    <!--<hr>-->
    <!--</div>-->
    <div class="row">
        <div class="col-md-2 col-xs-12"></div>
    <div class="col-md-8 col-xs-12">
    <div class="brdCum">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a>/</li>
                        <li>Solutions</li>
                    </ul>
                </div></div>
    <div class="col-md-2 col-xs-12"></div>
    </div>
        <div class="">  
            <div class="col-md-2 col-sm-3 col-md-12">
                <form class="form-horizontal" role="form" id="filterFormS" action="{{route('solution.filter',['id'=>$id])}}" method="POST">
                    {{ csrf_field() }}
                    <div class="leftDrop">
                        <h3>Filters</h3>
                        <div class="pdn">                   
                            <!-- <h4>Solution</h4> -->
                            @foreach($solutiontags as $solutiontag)
                                <div class="checkbox">
                                  <label>
                                    <input class="filter-checkbox" type="checkbox" value="{{$solutiontag->getId()}}" name="solution-tag[]" {{isset($selectedTags)&&in_array($solutiontag->getId(), $selectedTags)?'checked':''}}>
                                        <span class="cr"><i class="cr-icon fa fa-check"></i></span>
										<div class="solu">
                                        {{$solutiontag->getTagName()}}</div>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filtr-btn">
                        <button type="submit" class="btn btn-sm btn-primary pull-right filter-search">Search</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8 col-sm-8 col-md-12">           
               <!--  <div class="row">
                    @if($tagCategories)     
                        @foreach($tagCategories as $tagCategory)
                            <a href="{{route('solution.products',['id'=>$tagCategory->getScenarioId()->getId()])}}">
                                <div class="col-md-4 col-md-12">
                                    <div class="solInerTab">
                                    <div class="divImg"><img src="{{asset('images/solution-1.jpg')}}" class="img-responsive" alt="solution-1"></div>            <h1>{{$tagCategory->getScenarioId()->getName()}}</h1>
                                        <p>{{$tagCategory->getScenarioId()->getDescription()}}</p>
                                    </div>
                                </div>
                            </a>
                        @endforeach 
                    @else
                        <p>No solutions found..</p>
                    @endif
                </div> -->
                  <div class="row">
                    @if($tagCategories)
                        @foreach($tagCategories as $tagCategory)
                      
                            <a href="{{route('solution.products',['id'=>$tagCategory->getScenarioId()->getId()])}}">
                                <div class="col-md-4 col-md-12">
                                    <div class="solInerTab">
                                        <div class="divImg"><img src="{{$tagCategory->getScenarioId()->getScenarioImg()}}" class="img-responsive" alt="solution-1"></div>            <h1>{{$tagCategory->getScenarioId()->getName()}}</h1>
                                        <p>{{$tagCategory->getScenarioId()->getDescription()}}</p>
                                    </div>
                                </div>
                            </a>
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