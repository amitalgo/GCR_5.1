@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} | Tags
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} Tags</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">

                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.tags.index')}}"><i class="fa fa-reply"></i> Tags List</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($tag)) {{route('admin.tags.update',['tag' => $tag->getId()] )}} @else{{route('admin.tags.store')}} @endif" method="POST">
                        {{ csrf_field() }}
                        @if(isset($tag))
                            <input type="hidden" name="_method" value="PUT">
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" required="required" placeholder="Title" type="text" name="title"  value="@if(isset($tag)){{$tag->getTagName()}} @endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control"  name="parent-tag">
                                    <option value="">Choose Tag</option>
                                    @foreach($tags as $parentTag)
                                        <option value="{{$parentTag->getId()}}" {{isset($tag)&&$tag->getParent()!=null&&$tag->getParent()->getId()==$parentTag->getId()?'selected':''}}>{{$parentTag->getTagName()}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="5"  id="detail" class="form-control summernote" placeholder="" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>    
                            @if(isset($tag))
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="active">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$tag->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$tag->getIsActive()?'':'checked'}}>
                                            <label for="active_0">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
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