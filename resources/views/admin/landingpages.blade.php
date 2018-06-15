@extends('admin.layouts.adminLayouts2')
@section('title','Landing Products')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Landing Pages </h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row h6">
                        <div class="col-sm-10">
                            <h4 class="m-t-0 header-title"><b>Landing Page List</b></h4>
                        </div>
                        <div class="col-sm-2">
                            @if(in_array('landingpages.create', $isAuthorize))
                                <a class="btn btn-default waves-effect waves-light" href="{{route('admin.landingpages.create')}}"><i class="fa fa-plus"></i> Landing Page</a>
                            @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th data-toggle="true">Id</th>
                            <th>Name</th>
                            <th>Theme</th>
                            <th>Banner</th>
                            <th data-hide="phone, tablet">Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody class="responseData">
                        @forelse($landingPages as $pages)
                            <tr>
                                <td class="editTd">
                                    {{$pages->getId()}}
                                </td>
                                <td class="editTd">
                                    {{$pages->getTitle()}}
                                </td>
                                <td class="editTd">
                                    {{$pages->getLandingThemeId()->getName()}}
                                </td>
                                <td class="editTd">
                                    {{$pages->getLandingPageBannerId()->getTitle()}}
                                </td>
                                <td data-active="" class="editTd">
                                    <span class="label label-table label-{{$label = $pages->getIsActive()?"success":"danger"}}">
                                        {{$labelText = $pages->getIsActive()?"Active":"Inactive"}}
                                     </span>
                                </td>
                                <td>
                                    @if(in_array('landingbanners.edit', $isAuthorize))
                                        <a href="{{route('admin.landingpages.edit',['landingpages' => $pages->getId()])}}" class="btn btn-icon waves-effect waves-light btn-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endif
                                    &nbsp;&nbsp;&nbsp;
                                     <a href="{{route('landingpage',['landingpage'=>$pages->getSlug()])}}" class="btn btn-icon waves-effect waves-light btn-white	">		<i class="fa fa-eye"></i>
                                    </a>
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