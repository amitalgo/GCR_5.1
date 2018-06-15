@extends('front-end.layouts.frontLayout')
@section('title','GCR-Cloud | Privacy policy')
@section('banner-image',asset($banner->getImage()))

@section('content')


    <div class="container-fluid" style=" padding-right: 0px;  padding-left:0px;">

        <div class="col-md-10 col-sm-10 col-xs-12">
            {!! $content->getDescription() !!}

        </div>
        <div class="col-md-2 col-md-12 hidden-sm hidden-xs">
            {!! view('front-end.component.ads',['ads'=>$ads]) !!}
        </div>
    </div>
@endsection