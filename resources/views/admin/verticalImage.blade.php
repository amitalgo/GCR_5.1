@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} | Vertical Images
@endsection

@section('content')
{{--{{dd($vertical->getVerticalImages())}}--}}
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }}  Vertical Images</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.verticals.index')}}"><i class="fa fa-reply"></i> Vertical Listt</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="{{route('admin.verticals.update',['verticals' => $vertical->getId()] )}}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vertical Name</label>
                                    <input class="form-control" required="required" placeholder="Vertical" type="text" name="vertical"  readonly="readonly" value="@if(isset($vertical)){{$vertical->getName()}} @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                @if($vertical->getVerticalImages()) <?php $images =  json_decode($vertical->getVerticalImages()->getImage(),true); ?> @endif
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Tiles Image</label> <small>(Size : 300 x 300 Px)</small>
                                        {{ csrf_field() }}
                                        <input type="hidden" name="_method" value="PUT">
                                        <input class="filestyle" id="banner-img" data-size="sm" placeholder="Browse Image" type="file" name="image"/>
                                        <input type="hidden" name="image-txt" value="@if($vertical->getVerticalImages()){{$images['tiles']}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-5" id="img-preview">
                                        @if($vertical->getVerticalImages())
                                        <img class="img-thumbnail thumb-lg" src="{{asset($images['tiles'])}}" alt="">
                                            @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Banner Image</label> <small>(Size : 846 x 300 Px)</small>
                                        <input class="filestyle" id="banner-img-m" data-size="sm" placeholder="Browse Image" type="file" name="m-image"/>
                                        <input type="hidden" name="m-image-txt" value="@if($vertical->getVerticalImages()){{$images['banner']}}@endif">
                                    </div>
                                </div>
                                <div class="col-md-7" id="img-preview">
                                    @if($vertical->getVerticalImages())
                                        <img class="img-thumbnail thumb" src="{{asset($images['banner'])}}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="clear-fix"></div>


                        <div class="row">
                            <button type="submit" class="btn btn-default waves-effect waves-light btn-md">
                                Submit
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection