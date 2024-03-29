@extends('admin.layouts.adminLayouts2')
@section('title','Country Setting')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Country Setting</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

    <div class="row">

        @if(in_array('country.create', $isAuthorize))
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Add Country</b></h4>
                <p class="text-muted m-b-30 font-13">
                    Ex : India,USA.
                </p>
                <form class="form-horizontal" role="form" id="addForm" action="{{route('admin.country.store')}}" method="post">
                    <div class="form-group">
                        <label class="col-md-2 control-label" for="cat">Country : </label>
                        <div class="col-md-6">
                            {{ csrf_field() }}
                            <input id="country" name="country" class="form-control shaz-validator-text" required="" placeholder="Ex : India">
                        </div>
                        <button type="submit" class="btn btn-inverse waves-effect waves-light">Submit</button>
                    </div>
                </form>
            </div>
        </div>
            @endif
    </div>



    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b>Country List</b></h4>
                {{--<p class="text-muted m-b-30 font-13">--}}
                    {{--Country List--}}
                {{--</p>--}}

                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th data-toggle="true">Id</th>
                        <th>Country</th>
                        <th data-hide="phone, tablet">Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody class="responseData">
                            @forelse($countries as $country )
                    <tr>
                        <td data-id="{{$country->getId()}}" class="editTd">
                            {{$country->getId()}}
                        </td>
                        <td data-name="{{$country->getName()}}" class="editTd">
                            {{$country->getName()}}
                        </td>
                        <td data-active="{{$country->getIsActive()?1:0}}" class="editTd">
                            <span class="label label-table label-{{$label = $country->getIsActive()?"success":"danger"}}">
                                  {{$labelText = $country->getIsActive()?"Active":"Inactive"}}
                            </span>
                        </td>
                        <td>
                            @if(in_array('country.edit', $isAuthorize))
                            <a href="#dataEdit" class="btn btn-icon waves-effect waves-light btn-white dataEdit" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="200" data-overlayColor="#36404a">
                                <i class="fa fa-edit"></i>
                            </a>
                            @endif
                            &nbsp;&nbsp;&nbsp;
                            <!-- <button class="btn btn-icon waves-effect waves-light btn-white	">		<i class="fa fa-remove"></i>
                            </button> -->
                        </td>
                    </tr>
                    @empty
                    @endforelse
                    </tbody>
                </table>






            </div>
        </div>
    </div>
    </div>





    <!-- Modal -->
    <div id="dataEdit" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();">
            <span>&times;</span><span class="sr-only">Close</span>
        </button>
        <h4 class="custom-modal-title">Edit Category</h4>
        <div class="custom-modal-text">
            <form class="form-horizontal" role="form" id="editForm" method="POST" action="{{route('admin.country.update',['country' =>'0'])}}">
                <div class="form-group">
                    <label class="col-md-2 control-label" for="cat">Country : </label>
                    <div class="col-md-6">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="id" id="id"/>
                        <input type="text" name="country" id="name" class="form-control shaz-validator-text" required="" placeholder="Ex :India">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="cat">Status : </label>
                    <div class="col-md-6">
                        <div class="radio radio-success radio-inline">
                            <input type="radio" id="active_1" name="active" value="1">
                            <label for="active_1">Active</label>
                        </div>
                        <div class="radio radio-danger radio-inline">
                            <input type="radio" id="active_0" name="active" value="0">
                            <label for="active_0">Inactive</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-inverse waves-effect waves-light">Update</button>
            </form>
        </div>
    </div>


    <!-- seperate js for each page -->
@endsection