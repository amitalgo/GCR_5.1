<div class="carousel slide">
    <div class="carousel-inner">

        <div class="item active mobSlide @if(Route::current()->getName()!='home') inBner  @endif" style="background-image: url(@yield('banner-image')); background-size: contain; background-position-y: 5px;">
            <div class="">
                <div class="row slide-margin">
                    <div class="col-sm-12">
                        <div class="carousel-content">

                        </div>
						
                    </div>
                </div>

               <!-- <div class="row">
                    <div class="col-sm-12">
                        <div class="nbs-flexisel-container">
                            <div class="nbs-flexisel-inner">
                                <ul id="flexiselDemo3" class="nbs-flexisel-ul" style="display: block; left: -219.6px;">
                                    <li class="nbs-flexisel-item" style="width:250px;">Efficiency</li>
                                    <li class="nbs-flexisel-item" style="width:250px;">Enhanced Profitability </li>
                                    <li class="nbs-flexisel-item" style="width: 250px;">Business Intelligence </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>-->

                <!--<div class="row">
                    <div class="col-sm-12 col-md-12 pdn-left pdn-right">
                        {{--@isset($ads)--}}
                            {{--@foreach($ads as $ad)--}}
                                {{--<div class="banrAd">--}}
                                    {{--<img src="{{asset($ad->getImage())}}" class="img-responsive image">--}}
									{{--<div class="overlay">Add one</div>--}}
                                {{--</div>--}}
                            {{--@endforeach--}}
                        {{--@endisset--}}
                    </div>
                </div>-->
            </div>
			<!--<div class="tp-dottedoverlay yes"></div>-->
		
        </div>
        <!--/.item-->
    </div>
    <!--/.carousel-inner-->
</div>
{{--{{asset("images/front-images/slider/banner.png")}}--}}