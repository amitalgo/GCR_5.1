@extends('front-end.layouts.frontLayout')
@section('title','Product List')
@section('banner-image',asset($banner->getImage()))
@section('content')
    <div class="container">
        <!--<div class="flt">-->
        <!--    <h2>Products</h2>-->
        <!--<hr>-->
        <!--</div>-->
        <div class="row">
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
            <div class="col-md-8 col-sm-3 col-xs-12">
                <div class="brdCum">
                    <ul>
                        <li><a href="{{route('home')}}">Home</a>/</li>
                        <li> Search /</li>
                         <li> {{$slug}}</li>
                    </ul>
                </div></div>
            <div class="col-md-2 col-sm-2 col-xs-12"></div>
        </div>

        <div class="">

            <span class="col-md-10 col-sm-10 col-xs-12">
                @if(empty($slugDatas['news']) && empty($slugDatas['product']))
                    <div class="text-muted">No search results found for " {{$slug }}".</div>
                    <div class="text-muted">If you are searching for anything specific and need assistance, please send us an email on <span class="text-primary">support-india@gcrcloud.com</span>.</div>
                @else
                    <div class="text-muted">Search results for "<span class="text-primary">{{$slug }} </span> " </div>
                @if(empty($slugDatas['news']))
                    {{--<div class="h2"> No Results Found In News </div>--}}
                @else
                <div class="h4 text-muted"> {{count($slugDatas['news'])}} result(s) found in News</div>
                <hr/>
                @foreach($slugDatas['news'] as $slug)
                    <div class="search-bottom">
                        <a href="{{route('news.list',['id'=>$slug->getUrlSlug()])}}"><strong>  {{$slug->getNewsHeading()}}</strong></a>
                        <p>{!!\Illuminate\Support\Str::words(strip_tags($slug->getNewsSummary()),40,'...')!!}</p>
                    </div>
                @endforeach
                @endif
                @if(empty($slugDatas['product']))
                        {{--<div class="h5">  No Results Found In Product </div>--}}
                    @else
                <div class="h4 text-muted">{{count($slugDatas['product'])}} result(s) found in Solutions </div>
                    <hr/>
                @foreach($slugDatas['product'] as $slug)
                            <div class="search-bottom">
                                {{--$slug->getProductSlug()->getUrlSlug() Amit 18-06-18 --}}
                                <a href="{{route('solution.showProduct',['id'=>$slug->getProductSlug()->getUrlSlug()])}}"><strong>  {{$slug->getName()}}</strong></a>
                                <p>{!!\Illuminate\Support\Str::words(strip_tags($slug->getDescription()),40,'...')!!}</p>
                            </div>
                        @endforeach
                    @endif
                    @endif
            </div>
            <div class="col-md-2 col-md-12 hidden-sm hidden-xs">
                {!! view('front-end.component.ads',['ads'=>$ads]) !!}
            </div>
        </div>





    </div>
@endsection