@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} | News
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} News </h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.news.index')}}"><i class="fa fa-reply"></i> News List</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($news)) {{route('admin.news.update',['news' => $news->getId()] )}} @else{{route('admin.news.store')}} @endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        {{ csrf_field() }}
                                        @if(isset($news))
                                            <input type="hidden" name="id" value="{{$news->getId()}}">
                                            <input type="hidden" name="_method" value="PUT">
                                        @endif
                                        <select class="form-control select2" required="required" id="cat_id" name="country">
                                            <option value="">Choose Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->getId()}}" @if(isset($news)) {{$country->getId() == $news->getNewsCountryId()->getId() ? "selected=selected" : "" }} @endif >{{$country->getName()}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>Image</label> <small>(Size : 980 x 980 Px)</small>
                                            {{ csrf_field() }}
                                            @if(isset($news))
                                                <input type="hidden" name="id" value="{{$news->getId()}}">
                                                <input type="hidden" name="_method" value="PUT">
                                            @endif
                                            <input class="filestyle" data-size="sm" placeholder="Browse Image" type="file" name="thumbimage"/>
                                        </div>
                                    </div>
                                    <div class="col-md-5" id="img-preview">
                                        @if(isset($news))
                                            <img class="img-thumbnail thumb-lg" src="{{asset($news->getThumbnail())}}" alt="">
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                    <label>News/Events Heading</label>
                                    <input class="form-control" required="required" placeholder="News heading" type="text" name="title"  value="   @if(isset($news)){{$news->getNewsHeading()}} @endif">
                            </div>
                            <div class="col-md-3">

                                    <label>News/Events Source</label>
                                    <input class="form-control" required="required" placeholder="Source" type="text" name="source"  value="@if(isset($news)){{$news->getSource()}} @else GCR @endif ">
                            </div>
                            <div class="col-md-3">
                                <label>Type</label>
                                <select class="form-control required" required="required" name="type"  data-route="@if(isset($news)) {{route('events-form',['id',$news->getId()])}} @else{{route('events-form')}}@endif">
                                    <option value="">Choose Type</option>
                                    <option value="1"    @if(isset($news)) {{$news->getType()=='1' ? "selected=selected" : "" }} @endif>News</option>
                                    <option value="2"    @if(isset($news)) {{$news->getType()=='2' ? "selected=selected" : "" }} @endif>Events</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix h4"></div>
                       <!--  <div class="row">
                            <div class="col-md-6">
                                    <label>News/Events Linked With Pages</label>

                                    <select class="form-control select2" multiple="multiple" name="pages[]" required="required">
                                        <option value="">Choose Page</option>
                                        @foreach($pages as $page)
                                            <option value="{{$page->getId()}}"    @if(isset($news)) <?php echo in_array($page->getId(),$news->getSelectedPages())?'selected':'' ?>  @endif>{{$page->getName()}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div> -->
                       <div class="row">
                            <div class="col-md-3">
                                <label>Date</label>
                                <input class="form-control" required="required" placeholder="Date" type="date" name="newsdate"  value="@if(isset($news)){{date_format($news->getCreatedAt(),'Y-m-d')}}@else  @endif">
                            </div>
                        </div>
                        <div class="clearfix h4"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>News/Events Description</label>
                                    <textarea rows="5"  id="description" required="required" class="form-control summernote" placeholder="Description" name="description">   @if(isset($news)) {{$news->getNewsSummary()}} @endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                        @if(isset($news))
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$news->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$news->getIsActive()?'':'checked'}}>
                                            <label for="active_0">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Image</label>
                                <button style="float:right;" type="button" class="btn btn-icon waves-effect btn-default waves-light genImg"> <i class="fa fa-plus"></i> </button>
                            </div>
                            <div class="col-md-12 imgGrid">
                                <div class="form-group">
                                    {{ csrf_field() }}
                                    @if (isset($news))
                                        <input type="hidden" name="id" value="{{$news->getId()}}">
                                        <input type="hidden" name="_method" value="PUT">

                                        @foreach($news->getNewsAttachment() as $key=>$value)
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <span class="close fadeDiv">X</span>
                                                    <img class="img-thumbnail thumb-lg" src="{{asset($value->getAttachment())}}" alt=""><br/><br/>
                                                    <input type="hidden" class="imageUrl" value="{{$value->getAttachment()}}" name="imageUrl[]"/>

                                                    <input class="filestyle actimage" data-size="sm" placeholder="Browse Image" type="file" name="actimage[]"/>
                                                </div>
                                            </div>

                                        @endforeach

                                         @else
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <img class="img-thumbnail thumb-lg" src="" alt=""><span class="close fadeDiv">X</span><br/><br/>

                                                <input class="filestyle actimage" data-size="sm" placeholder="Browse Image" type="file" name="actimage[]"/>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{--<div class="col-md-5" id="img-preview">--}}
                                {{--@isset($news)--}}
                                    {{--@foreach($news->getNewsAttachment() as $key=>$value)--}}
                                        {{--<img class="img-thumbnail thumb-lg" src="{{asset($value->getAttachment())}}" alt="">--}}
                                    {{--@endforeach--}}
                                {{--@endisset--}}
                                    {{--<button type="button" class="btn btn-icon waves-effect btn-default waves-light genImg"> <i class="fa fa-plus"></i> </button>--}}
                            {{--</div>--}}
                        </div>



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