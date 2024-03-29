@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} | Testimonial
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} Testimonial</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.testimonials.index')}}"><i class="fa fa-reply"></i> Testimonials List</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($testimonial)) {{route('admin.testimonials.update',['testimonials' => $testimonial->getId()] )}} @else{{route('admin.testimonials.store')}} @endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" required="required" placeholder="Name" type="text" name="name"  value="@if(isset($testimonial)){{$testimonial->getName()}} @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Image</label>
                                        {{ csrf_field() }}  <small>(Size : 300 x 300 Px)</small>
                                        @if(isset($testimonial))
                                            <input type="hidden" name="id" value="{{$testimonial->getId()}}">
                                            <input type="hidden" name="_method" value="PUT">
                                        @endif
                                        <input class="filestyle" id="banner-img" data-size="sm" placeholder="Browse Image" type="file" name="image"/>
                                    </div>
                                </div>
                                <div class="col-md-5" id="img-preview">
                                    @if(isset($testimonial))
                                        <img class="img-thumbnail thumb-lg" src="{{asset($testimonial->getImage())}}" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation</label>
                                    <input class="form-control" required="required" placeholder="Designation" type="text" name="designation"  value="@if(isset($testimonial)){{$testimonial->getDesignation()}} @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input class="form-control" required="required" placeholder="Company Name" type="text" name="companyName"  value="@if(isset($testimonial)){{$testimonial->getCompanyName()}} @endif">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Testimonial</label>
                                    <textarea rows="5"  id="testimonial" required="required" class="form-control summernote" placeholder="Description" name="testimonial">@if(isset($testimonial)) {{$testimonial->getTestimonial()}} @endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                        @if(isset($testimonial))
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$testimonial->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$testimonial->getIsActive()?'':'checked'}}>
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