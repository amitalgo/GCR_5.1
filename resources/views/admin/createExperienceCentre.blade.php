@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} | Experience Centre
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
                <h4 class="page-title"> {{  Ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),'.') + 1))}} Experience Centre </h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.experience-centre.index')}}"><i class="fa fa-reply"></i> Back </a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($experience)) {{route('admin.experience-centre.update',['experience-centre' => $experience->getId()] )}} @else{{route('admin.experience-centre.store')}} @endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Category</label>
                                        {{ csrf_field() }}
                                        @if(isset($experience))
                                            <input type="hidden" name="_method" value="PUT">
                                        @endif
                                        <select class="form-control select2" required="required" id="cat_id" name="category">
                                            <option value="">Choose Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->getId()}}" @if(isset($experience)) {{$experience->getCategoryId()->getId() == $category->getId() ? "selected=selected" : "" }} @endif >{{$category->getName()}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                <hr/>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" required="required" placeholder="Title" type="text" name="title[]"  value="@if(isset($experience)){{$experience->getTitle()}} @endif">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    {{--<label>Solution</label>--}}
                                    {{--<select class="form-control select2" required="required" id="sol_id" name="solution[]">--}}
                                        {{--<option value="">Choose Solution</option>--}}
                                        {{--@foreach($solutions as $solution)--}}
                                            {{--<option value="{{$solution->getId()}}" @if(isset($experience)) {{$experience->getCategoryId()->getId() == $solution->getId() ? "selected=selected" : "" }} @endif >{{$solution->getName()}}</option>--}}
                                        {{--@endforeach--}}

                                    {{--</select>--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label> Tags  </label><br/>--}}
                                        {{--<input class="tagss">--}}
                                        {{--<input class="form-control tags" required="required" type="text" name="tags[]" data-role="tagsinput" placeholder="Add Tags" value="@isset($experience){{$experience->getTag()}} @endisset"/>--}}
                                    {{--</div>--}}

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 parents">
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label> Is Image </label><br/>
                                        <input type="checkbox" class="is_video" name="is_video[]" value="<?php if(isset($experience)){ if($experience->getIsVideo()){ echo 1; }else{echo 0; }} ?>" @if(isset($experience)) @if($experience->getIsVideo()) @else checked @endif @endif />
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group UrlIsHide" @if(isset($experience))@if($experience->getIsVideo()) style="display: block" @else style="display: none" @endif @endif>
                                        <label> URL  </label>
                                        <input class="form-control url" placeholder="You Tube Url" type="text" name="url[]"  value="@if(isset($experience)){{$experience->getMediaUrl()}} @endif" required>
                                    </div>
                                    <div class="form-group ImgAndRedirectLinkIsHide" @if(isset($experience))@if($experience->getIsVideo()) style="display: none" @else style="display: block" @endif @endif>
                                        <label> Upload Image  </label>
                                        <input class="filestyle image" data-size="sm" placeholder="Browse Image" type="file" name="image[]" multiple @if(isset($experience))@if($experience->getIsVideo()) @else  @endif @endif/>
                                        @if(isset($experience))
                                            @if($experience->getIsVideo()) @else <img class="img-thumbnail thumb-lg" src="{{asset($experience->getMediaUrl())}}" alt=""> @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group ImgAndRedirectLinkIsHide" @if(isset($experience))@if($experience->getIsVideo()) style="display: none" @else style="display: block" @endif @endif>
                                        <label> Redirect Link  </label>
                                        <input class="form-control r-link" placeholder="Redirect Link" type="text" name="r-link[]"  value="@if(isset($experience)){{$experience->getLinkRedirect()}} @endif">
                                    </div>
                                </div>
                                <div class="col-sm-1" style="float:left">
                                    <div class="form-group">
                                        <label> </label>
                                        <button type="button" class="btn btn-icon waves-effect btn-default waves-light" onclick="init.addForm( '{{route("experience-form")}}' )"> <i class="fa fa-plus"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="clear-fix"></div>
                        @if(isset($experience))
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$experience->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$experience->getIsActive()?'':'checked'}}>
                                            <label for="active_0">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="addMoreElement"></div>
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