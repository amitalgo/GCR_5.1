@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} | Quick Link
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} Quick Links</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">

                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.links.index')}}"><i class="fa fa-reply"></i> Quick Links List</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(@isset($quickLink)) {{route('admin.links.update',['id' => $quickLink->getId()] )}} @else{{route('admin.links.store')}} @endif" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if(isset($quickLink))
                            <input type="hidden" name="_method" value="PUT">
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" required="required" placeholder="Title" type="text" name="title"  value="@if(isset($quickLink)){{$quickLink->getTitle()}} @endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>File</label>
                                        <input class="filestyle" id="file" data-size="sm" placeholder="Browse Image" type="file" name="file"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix h4"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Pages</label>
                                <select class="form-control select2" multiple="multiple" name="pages[]">
                                    <option value="">Choose Page</option>
                                    @foreach($pages as $page)
                                        <option value="{{$page->getId()}}" @if(isset($quickLink)) <?php echo in_array($page->getId(),$quickLink->getSelectedPages())?'selected':'' ?>  @endif>{{$page->getName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                        @if(isset($quickLink))
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$quickLink->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$quickLink->getIsActive()?'':'checked'}}>
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