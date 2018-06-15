<div class="row lanMrag">
    <div class="col-xs-12 col-sm-6 col-md-7 ">
        <h1>{{$product->getName()}}</h1>

        <h2>{{$product->getVendor()}}</h2>
		<div class="col-xs-12 col-sm-6 col-md-5 carousel-hide">

        <div id="myCarousel" class="vertical-slider carousel vertical slide col-md-12 carousel-hide" data-ride="carousel">
              <!-- Carousel items -->
            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                <!-- Bottom Carousel Indicators -->
                <ol class="carousel-indicators">
                    @foreach($product->getLandingProductImages() as $key=>$productImage)
                        <li data-target="#quote-carousel" data-slide-to="{{$key}}" class="<?=$key==0?'active':''?>"></li>
                    @endforeach
                    {{--<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>--}}
                    {{--<li data-target="#quote-carousel" data-slide-to="1"></li>--}}
                    {{--<li data-target="#quote-carousel" data-slide-to="2"></li>--}}
                </ol>

                <!-- Carousel Slides / Quotes -->
                <div class="carousel-inner">

                    @foreach($product->getLandingProductImages() as $key=>$productImage)
                        <div class="item <?=$key==0?'active':''?>">
                            <blockquote>
                                <img src="{{asset($productImage->getMediaUrl())}}" class="thumbnail" alt="Image" />
                            </blockquote>
                        </div>
                    @endforeach
                </div>

                {{--<!-- Carousel Buttons Next/Prev -->--}}
                {{--<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>--}}
                {{--<a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>--}}
            </div>
        </div>
    </div>
		
        <p>{!!$product->getDescription() !!}</p>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-5 hidden-xs">

        <div id="myCarousel" class="vertical-slider carousel vertical slide col-md-12" data-ride="carousel">
            <br />
            <!-- Carousel items -->
            <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                <!-- Bottom Carousel Indicators -->
                <ol class="carousel-indicators">
                    @foreach($product->getLandingProductImages() as $key=>$productImage)
                        <li data-target="#quote-carousel" data-slide-to="{{$key}}" class="<?=$key==0?'active':''?>"></li>
                    @endforeach
                    {{--<li data-target="#quote-carousel" data-slide-to="0" class="active"></li>--}}
                    {{--<li data-target="#quote-carousel" data-slide-to="1"></li>--}}
                    {{--<li data-target="#quote-carousel" data-slide-to="2"></li>--}}
                </ol>

                <!-- Carousel Slides / Quotes -->
                <div class="carousel-inner">

                    @foreach($product->getLandingProductImages() as $key=>$productImage)
                        <div class="item <?=$key==0?'active':''?>">
                            <blockquote>
                                <img src="{{asset($productImage->getMediaUrl())}}" class="thumbnail" alt="Image" />
                            </blockquote>
                        </div>
                    @endforeach
                </div>

                {{--<!-- Carousel Buttons Next/Prev -->--}}
                {{--<a data-slide="prev" href="#quote-carousel" class="left carousel-control"><i class="fa fa-chevron-left"></i></a>--}}
                {{--<a data-slide="next" href="#quote-carousel" class="right carousel-control"><i class="fa fa-chevron-right"></i></a>--}}
            </div>
        </div>
    </div>
</div>