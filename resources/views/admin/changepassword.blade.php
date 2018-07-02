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
                    <form class="form-horizontal" role="form" id="addForm" action="{{route('admin.password.update')}}" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enter Old Password</label>
                                        <input class="form-control" required="required" placeholder="Enter Old Password" type="password" name="oldPass" data-token="<?php echo e(csrf_token()); ?>" id="oldPass" value="@if(isset($partner)){{$partner->getTitle()}} @endif">
                                    </div>
                                    <div class="alert alert-danger oldPassChkErr" style="padding:5px 15px;display:none;">Error</div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enter New Password</label>
                                        <input class="form-control" required="required" placeholder="Enter New Password" type="text" name="newPass" id="newPass"  value="@if(isset($partner)){{$partner->getTitle()}} @endif" readonly>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{ Auth::user()->getemail() }}" name="useremail" id="useremail">
                            <input type="hidden" value="{{ Auth::user()->getid() }}" name="userid" id="userid">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Confirm New Password</label>
                                        <input class="form-control" required="required" placeholder="Confirm New Password" type="text" name="cNewPass" id="cNewPass"  value="@if(isset($partner)){{$partner->getTitle()}} @endif" readonly>
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