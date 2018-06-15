@extends('admin.layouts.adminLayouts2')
@section('title','Banner|Setting')

@section('content')
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Landing Banner</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#page" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">Banner</span>
                        </a>
                    </li>

                </ul>
                <div class="tab-content">
                    <form name="pageForm" class="validateForm" action="@if(isset($banner)) {{route('admin.landingbanners.update',['landingbanners' => $banner->getId()] )}} @else{{route('admin.landingbanners.store')}} @endif" method="POST" enctype="multipart/form-data">
                    <div class="tab-pane active" id="page">

                            {{ csrf_field() }}
                        @if(isset($banner))
                            <input type="hidden" name="_method" value="PUT">
                        @endif
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Banner Title</label>
                                        <input type="text" value="{{isset($banner)?$banner->getTitle():'' }}" name="title" class="form-control" placeholder="Banner Title" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea rows="3" class="form-control" placeholder="Page Content Here.." name="description" required>{{isset($banner)?$banner->getDescription():'' }}</textarea>
                                    </div>
                                </div>
                            </div>

                    </div>
                        <hr/>
                        <h3><u>Banner Caraousel</u></h3>
                        <div class="clearfix"></div>
                    <div class="tab-pane" id="banner">
                        <div class="parents">
                            @if(!isset($banner))
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Image Title</label>
                                    <input class="required form-control"  parsley-trigger="change" required="required" placeholder="Heading" type="text" name="bannerimage-title[]">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Show Button</label><br/>

                                    <div class="checkbox checkbox-inline">
                                        <input type="radio" id="inlineCheckbox1" name="showButton[]" value="0">
                                        <label for="inlineCheckbox1"> Click on CheckBox if you want to show the button on banner image. </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Button Link</label>
                                    <input class="required form-control"  placeholder="www.gcrcloud.co.in/contact" type="url" name="anchor_url[]">
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label>Button Text</label>
                                    <input class="required form-control"  placeholder="Contact Us" type="text" name="anchor_text[]">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Banner Image</label> <small>(Size : 1920 X 900 Px)</small>
                                        <input class="filestyle" id="banner-img" data-size="sm" placeholder="Browse Banner Image" type="file" name="image[]">

                                    </div>
                                </div>
                                <div class="col-md-7" id="img-preview">

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Banner Image Description</label>
                                    <textarea rows="4"  id="banner_description" required="required" class="form-control" placeholder="Type Imaqe Description" name="banner_image_description[]"></textarea>
                                </div>
                            </div>
                        </div>
                        @endif
                                @if(isset($banner))
                            @foreach($banner->getLandingBannerImages() as $bannerImage)
                                <div style="border-radius: 5px;border:1px solid #ccc;margin: 5px;padding: 8px" class="mainBannerImageDiv" id="carousel_{{$bannerImage->getId()}}">
                                    <div class="clearfix"></div>
                                    <button type="button" class="btn btn-icon waves-effect btn-danger waves-light mainBannerImageRemoveButton" data-id="{{$bannerImage->getId()}}" data-route="{{route('admin.landingbanners.destroy',['landingbanners' => $bannerImage->getId()])}}" data-token="{{ csrf_token() }}"> <i class="fa fa-trash"></i> </button>
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image Title</label>
                                                <input class="required form-control"  parsley-trigger="change" required="required" placeholder="Heading" type="text" name="bannerimage-title[]" value="{{$bannerImage->getTitle()}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Show Button</label><br/>

                                                <div class="checkbox checkbox-inline">
                                                    <input type="checkbox" id="inlineCheckbox_{{$bannerImage->getId()}}" name="showButton[]"  {{$bannerImage->getShowButton()?'checked':''}}>
                                                    <label for="inlineCheckbox_{{$bannerImage->getId()}}"> Click on CheckBox if you want to show the button on banner image. </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Button Link</label>
                                                <input class="required form-control"  placeholder="www.gcrcloud.co.in/contact" type="url" name="anchor_url[]" value="{{$bannerImage->getButtonUrl()}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            <div class="form-group">
                                                <label>Button Text</label>
                                                <input class="required form-control"  placeholder="Contact Us" type="text" name="anchor_text[]" value="{{$bannerImage->getButtonText()}}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Banner Image</label> <small>(Size : 1920 X 900 Px)</small>
                                                    <input class="filestyle" id="banner-img" data-size="sm" placeholder="Browse Banner Image" type="file" name="image[]" value="{{$bannerImage->getMediaUrl()}}">
                                                    <input type="hidden" name="url[]" value="{{$bannerImage->getMediaUrl()}}">
                                                </div>
                                            </div>
                                            <div class="col-md-7" id="img-preview">

                                                <img class="img-thumbnail thumb-lg"
                                                     src="{{asset($bannerImage->getMediaUrl())}}" alt="">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Banner Image Description</label>
                                                <textarea rows="4"  id="banner_description" required="required" class="form-control" placeholder="Type Imaqe Description" name="banner_image_description[]">{{$bannerImage->getDescription()}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    @endforeach
                                @endif
                        </div>

                        <div class="clearfix"></div>
                        <div class="addMoreElement"></div>
                        <div class="clearfix"></div>
                        @if(isset($banner))
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$banner->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$banner->getIsActive()?'':'checked'}}>
                                            <label for="active_0">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="clearfix"></div>


                        <div class="row">
                            <div class="col-sm-1" style="float:left">
                                <div class="form-group">
                                    <label> </label>
                                    <button type="button" class="btn btn-icon waves-effect btn-default waves-light" onclick="init.addForm( '{{route("landingbannerform")}}' )"> <i class="fa fa-plus"></i> </button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-default waves-effect waves-light btn-md">
                                Submit
                            </button>
                        </div>

                    </div>
                </div>



            </div>
        </div>
        </form>
        <!-- end row -->
    </div>

@endsection
