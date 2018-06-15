@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} | Landing Product
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} Landing Product</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.landingproducts.index')}}"><i class="fa fa-reply"></i> Landing Product List</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($product)) {{route('admin.landingproducts.update',['testimonials' => $product->getId()] )}} @else{{route('admin.landingproducts.store')}} @endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" required="required" placeholder="Name" type="text" name="name"  value="@if(isset($product)){{$product->getName()}} @endif">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vendor</label>
                                    <input class="form-control" required="required" placeholder="Vendor Name" type="text" name="vendor"  value="@if(isset($product)){{$product->getVendor()}} @endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="col-md-6">
                                        <label>Image</label> <small>(Size : 1024 x 768 Px)</small>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" id="addBtn"><i class="fas fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                            @if(isset($product))

                                <div id="imageSection">
                                    @foreach($product->getLandingProductImages() as $productImage)
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <span class="close removeBtn">X</span>
                                                <img class="thumb-lg imgPreview" src="{{asset($productImage->getMediaUrl())}}"/>
                                                <input type="hidden" class="imageUrl" value="{{$productImage->getMediaUrl()}}" name="productImageUrl[]"/>
                                                <input class="filestyle actimage" data-size="sm" placeholder="Browse Image" type="file" name="productImage[]"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div id="imageSection">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <img class="thumb-lg imgPreview" />
                                            <input class="filestyle actimage" data-size="sm" placeholder="Browse Image" type="file" name="productImage[]"/>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="5"  id="description" required="required" class="form-control summernote" placeholder="Description" name="description">@if(isset($product)) {{$product->getDescription()}} @endif</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                @if(isset($product))
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$product->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$product->getIsActive()?'':'checked'}}>
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

                        {{ csrf_field() }}
                        @if(isset($product))
                            <input type="hidden" name="id" value="{{$product->getId()}}">
                            <input type="hidden" name="_method" value="PUT">
                        @endif
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection