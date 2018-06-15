@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} | User
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strrpos(Route::currentRouteName(),".") + 1)) }} Back</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.users.index')}}"><i class="fa fa-reply"></i> Users List</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(isset($user)) {{route('admin.users.update',['users' => $user->getId()] )}} @else{{route('admin.users.store')}} @endif" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">First Name</label>
                                    <input class="form-control" required="required" placeholder="First Name" type="text" name="firstName"  value="@if(isset($user)){{$user->getFirstName()}} @endif">
                                    {{csrf_field()}}
                                    @if(isset($user))
                                        <input type="hidden" name="_method" value="PUT">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Last Name</label>
                                    <input class="form-control" required="required" placeholder="Last Name" type="text" name="lastName"  value="@if(isset($user))){{$user->getLastName()}} @endif">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="control-label">Profile Pic</label>
                                    <input class="filestyle"  id="banner-img" type="file" name="profilePic">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group" id="img-preview">
                                    @if(isset($user))
                                   <img class="img-thumbnail thumb-lg" src="{{asset($user->getProfilePic())}}">
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Contact</label>
                                    <input class="form-control" required="required" placeholder="Contact Number" type="text" name="contactNumber"  value="@if(isset($user)){{$user->getContactNumber()}} @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input class="form-control" required="required" placeholder="Email" type="text" name="email"  value="@if(isset($user)){{$user->getEmail()}} @endif">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label">Password</label>
                                    <input class="form-control" required="required" placeholder="Password" type="password" name="password" value="@if(isset($user)){{$user->getPassword()}} @endif" @if(isset($user)) readonly @endif>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Role</label>
                                    <select class="form-control select2" name="role">
                                        <option value="">Choose Role</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->getId()}}"
                                                    @if(isset($user))
                                                        @foreach($user->getAdminRole() as $roleSelected)
                                                            @if($role->getId()==$roleSelected->getRoleId()->getId()) selected="selected" @else  @endif
                                                                @endforeach
                                                    @endif
                                            >{{$role->getRole()}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Type</label>
                                    <div class="col-md-12">
                                        <div class="checkbox checkbox-success checkbox-inline">
                                            <input class="form-control" type="checkbox" name="isAdmin" id="isAdmin">
                                            <label for="isAdmin"> Is Admin </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>

                        @if(isset($user))
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$user->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$user->getIsActive()?'':'checked'}}>
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