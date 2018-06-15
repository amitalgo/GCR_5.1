@extends('front-end.layouts.frontLayout')
@section('title','GCR-Cloud | About Us')
@section('banner-image',asset($banner->getImage()))

@section('content')

    <div class="inner">
		
		<div class="container valign">
		
        <div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="heding-color"><h2>About GCR</h2><hr/></div>
             {!! $content->getDescription() !!}
            </div>
        </div>
    </div>
    @endsection