@extends('admin.layouts.adminLayouts2')
@section('title','Quick Link')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Ads</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row h6">
                        <div class="col-sm-10">
                            <h4 class="m-t-0 header-title"><b>Quick Links List</b></h4>
                        </div>
                        <div class="col-sm-2">
                            @if(in_array('links.create', $isAuthorize))
                                <a class="btn btn-default waves-effect waves-light" href="{{route('admin.links.create')}}"><i class="fa fa-plus"></i> Quick Links</a>
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th data-toggle="true">Id</th>
                            <th>Title</th>
                            <th>Page</th>
                            <th data-hide="phone, tablet">Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody class="responseData">
                        @forelse($quickLinks as $quickLink)
                            <tr>
                                <td class="editTd">
                                    {{$quickLink->getId()}}
                                </td>
                                <td class="editTd">
                                    {{$quickLink->getTitle()}}
                                </td>
                                <td class="editTd">
                                    {{$quickLink->getPages()}}
                                </td>
                                <td data-active="" class="editTd">
                                    <span class="label label-table label-{{$label = $quickLink->getIsActive()?"success":"danger"}}">
                                        {{$labelText = $quickLink->getIsActive()?"Active":"Inactive"}}
                                     </span>
                                </td>
                                <td>
                                    @if(in_array('links.edit', $isAuthorize))
                                        <a href="{{route('admin.links.edit',['$id' => $quickLink->getId()])}}" class="btn btn-icon waves-effect waves-light btn-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endif
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
@endsection