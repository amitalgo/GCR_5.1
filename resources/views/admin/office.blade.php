@extends('admin.layouts.adminLayouts2')
@section('title')
    {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} | Office
@endsection

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> {{ ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1)) }} Office </h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.office.index')}}"><i class="fa fa-reply"></i> Office List</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="@if(@isset($office)) {{route('admin.office.update',['office' => $office->getId()] )}} @else{{route('admin.office.store')}} @endif" method="POST">


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Office Name</label>
                                        {{ csrf_field() }}
                                        @if(isset($office))
                                            <input type="hidden" name="id" value="{{$office->getId()}}">
                                            <input type="hidden" name="_method" value="PUT">
                                        @endif
                                        <input class="form-control" required="required" placeholder="Office Name" type="text" name="office_name" value="@if(isset($office)){{$office->getOfficeName()}}@endif"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Head Office</label>
                                        <input class="form-control" required="required" placeholder="HeadOffice City Name" type="text" name="head_office" value="@if(isset($office)){{$office->getHeadOffice()}}@endif"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Contact Person</label>
                                        <input class="form-control" required="required" placeholder="Contact Person Name" type="text" name="contact_person" value="@if(isset($office)){{$office->getContactPerson()}}@endif"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input class="form-control" required="required" placeholder="Contact Number" type="text" name="contact_number" value="@if(isset($office)){{$office->getContactNo()}}@endif"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Country</label>

                                        <select class="form-control select2" required="required" id="cat_id" name="country">
                                            <option value="">Choose Country</option>
                                            @foreach($countries as $country)
                                                <option value="{{$country->getName()}}" @if(isset($office)) {{$country->getName() == $office->getCountry() ? "selected=selected" : "" }} @endif >{{$country->getName()}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" required="required" placeholder="Email" type="text" name="email" value="@if(isset($office)){{$office->getEmail()}}@endif"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input class="form-control"  placeholder="City" type="text" name="city" value="@if(isset($office)){{$office->getCity()}}@endif"/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>State</label>
                                        <input class="form-control"  placeholder="State" type="text" name="state" value="@if(isset($office)){{$office->getState()}}@endif"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Pincode</label>
                                        <input class="form-control" required="required" placeholder="Pincode" type="text" name="pincode" value="@if(isset($office)){{$office->getPincode()}}@endif"/>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Primary Address</label>
                                        <textarea rows="5"  id="address1" required="required" class="form-control" placeholder="Primary Address" name="address1">@if(isset($office)) {{$office->getAddress1()}} @endif</textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Secondary Address</label>
                                        <textarea rows="5"  id="address2"  class="form-control" placeholder="Secondary Address" name="address2">@if(isset($office)){{$office->getAddress2()}} @endif</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                        @if(isset($office))
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="cat">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" {{$office->getIsActive()?'checked':''}}>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" {{$office->getIsActive()?'':'checked'}}>
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