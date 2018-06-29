@extends('admin.layouts.adminLayouts2')
@section('title','Change Password')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }}</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($partner)) {{route('admin.partners.update',['partners' => $partner->getId()] )}} @else{{route('admin.partners.store')}} @endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enter Old Password</label>
                                        <input class="form-control" required="required" placeholder="Enter Old Password" type="text" name="title" data-token="<?php echo e(csrf_token()); ?>" id="oldPass" value="@if(isset($partner)){{$partner->getTitle()}} @endif">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enter New Password</label>
                                        <input class="form-control" required="required" placeholder="Enter New Password" type="text" name="title"  value="@if(isset($partner)){{$partner->getTitle()}} @endif">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{ Auth::user()->getemail() }}" name="useremail" id="useremail">
                            <input type="hidden" value="{{ Auth::user()->getid() }}" name="userid" id="userid">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input class="form-control" required="required" placeholder="Confirm New Password" type="text" name="title"  value="@if(isset($partner)){{$partner->getTitle()}} @endif">
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <button type="submit" class="btn btn-default waves-effect waves-light btn-md">
                                Change
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection