@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} | Solution Tags
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} Solution Tags</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">

                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.solutions.index')}}"><i class="fa fa-reply"></i> Solutions</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($stag)) {{route('admin.solutions.update',['solutions' => $stag->getId()] )}} @else{{route('admin.solutions.store')}} @endif" method="POST">
                        {{ csrf_field() }}
                        @if(isset($stag))
                            <input type="hidden" name="_method" value="PUT">
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Solution</label>
                                    <input class="form-control" required="required" placeholder="Solution" type="text" name="solution"  value="@if(isset($stag)){{$stag->getName() }} @endif">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="form-control select2 multiple"  name="tags[]" multiple="multiple" required="required">
                                        <option value="">Choose Tag</option>
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->getId()}}" {{isset($stag)&&in_array($tag->getId(), $stag->getSelectedTagsByCategory())?'selected':''}}>{{$tag->getTagName()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
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