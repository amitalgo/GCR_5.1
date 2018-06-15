@extends('front-end.layouts.frontLayout')
@section('title','Product')
{{--@section('banner-image',asset($banner['banner']))--}}
@section('banner-image',asset($banner->getImage()))
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-8 col-sm-3 col-xs-12">
                <div class="brdCum">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a>/</li>
                        <li>Products / </li>
                        <li>{{$scenarioProduct->getName()}}</li>
                    </ul>
                </div></div>
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
        </div>

        <div class="">

            <div class="col-md-10 col-sm-10 col-xs-12">

                    <div class="row">
                        <div class="col-md-12"><h4>{{$scenarioProduct->getName()}}</h4></div>
                    </div>


                        <div class="row Products">
                            <div class="col-md-4 col-sm-4 col-md-12">
                                <div class="Products">
                                    <ul class="scroller">

                                    @forelse($scenarioProduct->getProductAttachment() as $attachment)
                                        <!-- <li>
										<a href="{{$attachment->getScenarioImg()}}" data-title="{{$scenarioProduct->getName()}}" >
											<img src="{{$attachment->getScenarioImg()}}" class="img-responsive" alt="{{$attachment->getType()}}">
										</a>
										</li> -->

                                            <li>
                                                @if($attachment->getType()=='video')
                                                    <?php $newstr = 'https://www.youtube.com/embed';?>
                                                    <a href="{{$newstr.substr($attachment->getUrl(), strrpos($attachment->getUrl(),'/')).'?autoplay=0&control=1'}}" data-title="{{$scenarioProduct->getName()}}" data-type="iframe" data-height="700px">
                                                        <img src="{{asset('images/YouTube-Videos.jpg')}}" class="img-responsive" alt="{{$attachment->getType()}}">
                                                    </a>
                                                @else
                                                    <a class="img-responsive" href="{{$attachment->getScenarioImg()}}" data-title="{{$scenarioProduct->getName()}}" >
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
                                <h1>{{$scenarioProduct->getName()}}</h1>
                                <h2>By {{$scenarioProduct->getVender()}}</h2>
                                <p>{!! $scenarioProduct->getDescription();!!} </p>
                                <div>
                                    <button type="button" class="btn btn-primary inquire-btn" data-pid="{{$scenarioProduct->getId()}}">Enquire Now</button>
                                </div>
                            </div>
                        </div>


            </div>
            <div class="col-md-2 col-md-12 hidden-sm hidden-xs">
                {!! view('front-end.component.ads',['ads'=>$ads]) !!}
            </div>
        </div>





    </div>
@endsection