@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} | Product Tags
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} Product Tags</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">

                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.products.index')}}"><i class="fa fa-reply"></i> Products</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="{{route('admin.productstags.update',['product-id'=>$product->getId()] )}}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Product</label>
                                    <input class="form-control" required="required" placeholder="" type="text" name="product-name"  value="{{$product->getName()}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tag</label>
                                    <select class="form-control select2 multiple"  name="tagIds[]" multiple="multiple">
                                        <option value="">Choose Tag</option>
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->getId()}}" {{isset($product)&&in_array($tag->getId(), $product->getProductTagIds())?'selected':''}}>{{$tag->getTagName()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Extra Description</label>
                                    <textarea class="form-control" name="extra_description">{{$product->getExtraDescription()}}</textarea>
                                </div>
                        </div>
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