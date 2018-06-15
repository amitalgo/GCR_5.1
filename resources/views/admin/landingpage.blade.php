@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} | Landing Page
@endsection

@section('content')
    <style>
        .form-horizontal .form-group{
            margin-right: 4px!important;

        }
    </style>
    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{  Ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),'.') + 1))}} Landing Page </h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.landingpages.index')}}"><i class="fa fa-reply"></i> Back </a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($landingpage)) {{route('admin.landingpages.update',['landingpages' => $landingpage->getId()] )}} @else{{route('admin.landingpages.store')}} @endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-8">
                                {{ csrf_field() }}
                                @if(isset($landingpage))
                                    <input type="hidden" name="_method" value="PUT">
                                @endif
                                <div class="col-sm-12">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" required="required" placeholder="Title" type="text" name="title"  value="@if(isset($landingpage)){{$landingpage->getTitle()}} @endif">
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix"></div>
                                <div class="col-sm-12">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Content</label>
                                            <textarea class="form-control summernote" rows="12" name="content">@if(isset($landingpage)){{$landingpage->getContent()}}@endif</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear-fix"></div>

                                @if(isset($landingpage))
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                            <div class="col-md-6">
                                                <div class="radio radio-success radio-inline">
                                                    <input type="radio" id="active_1" name="active" value="1" {{$landingpage->getIsActive()?'checked':''}}>
                                                    <label for="active_1">Active</label>
                                                </div>
                                                <div class="radio radio-danger radio-inline">
                                                    <input type="radio" id="active_0" name="active" value="0" {{$landingpage->getIsActive()?'':'checked'}}>
                                                    <label for="active_0">Inactive</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                            </div>
                            <div class="col-sm-4">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label>Theme</label>
                                        <select class="form-control select2" required="required" id="cat_id" name="theme">
                                            <option value="">Choose Theme</option>
                                            @foreach($themes as $theme)
                                            <option value="{{$theme->getId()}}" @if(isset($landingpage)) {{$landingpage->getLandingThemeId()->getId() == $theme->getId() ? "selected=selected" : "" }} @endif >{{$theme->getName()}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Banner</label>
                                        <select class="form-control select2" required="required" id="cat_id" name="banner">
                                            <option value="">Choose Banner</option>
                                            @foreach($banners as $banner)
                                            <option value="{{$banner->getId()}}" @if(isset($landingpage)) {{$landingpage->getLandingPageBannerId()->getId() == $banner->getId() ? "selected=selected" : "" }} @endif >{{$banner->getTitle()}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input class="form-control" required="required" placeholder="Meta Title" type="text" name="meta-title"  value="@if(isset($landingpage)){{$landingpage->getMetaTitle()}} @endif">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <input class="form-control" required="required" placeholder="Meta Keyword" type="text" name="meta-keyword"  value="@if(isset($landingpage)){{$landingpage->getMetaKey()}} @endif">
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" rows="3" required="required" placeholder="Meta Description" name="meta-description">@if(isset($landingpage)){{$landingpage->getMetaDescription()}}@endif</textarea>
                                    </div>
                                    <div class="form-group" style="background: #dde4e3;padding: 10px;border-radius: 5px !important;">
                                        <label><strong>Shortcodes</strong> </label><br/>
                                        <small>Copy and paste below shortcodes to display products</small><br/>
                                       <small>Multiple Product</small> : <small>[product limit=4 order=DESC]</small><br/>
                                        <small>Single Product</small> : <small>[product id=1]</small>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-default waves-effect waves-light btn-md">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <script>
        $(document).ready(function () {

        })
    </script>
@endsection