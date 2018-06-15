@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} | Ads
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} Ads</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">

                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.ads.index')}}"><i class="fa fa-reply"></i> Ads List</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($ad)) {{route('admin.ads.update',['ads' => $ad->getId()] )}} @else{{route('admin.ads.store')}} @endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" required="required" placeholder="Title" type="text" name="title"  value="@if(isset($ad)) {{$ad->getTitle()}} @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Image</label> <small>(Size : 200 x 200 Px)</small>
                                        {{ csrf_field() }}
                                        @if(isset($ad))
                                        <input type="hidden" name="id" value="{{$ad->getId()}}">
                                            <input type="hidden" name="_method" value="PUT">
                                        @endif
                                        <input class="filestyle" id="banner-img" data-size="sm" placeholder="Browse Image" type="file" name="image"/>
                                    </div>
                                </div>
                                <div class="col-md-5" id="img-preview">
                                    @if(isset($ad))
                                    <img class="img-thumbnail thumb-lg" src="{{asset($ad->getImage())}}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="clearfix h4"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Ads Linked With Pages</label>

                                <select class="form-control select2" multiple="multiple" name="pages[]">
                                    <option value="">Choose Page</option>
                                    @foreach($pages as $page)
                                        <option value="{{$page->getId()}}" @if(isset($ad))  <?php echo in_array($page->getId(),$ad->getSelectedPages())?'selected':'' ?>  @endif>{{$page->getName()}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="clearfix h4"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Detail</label>
                                    <textarea rows="5"  id="detail" required="required" class="form-control summernote" placeholder="Detail" name="addDetail">@if(isset($ad))  {{$ad->getAddDetail()}} @endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                        @if(isset($ad))
                        <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$ad->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$ad->getIsActive()?'':'checked'}}>
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