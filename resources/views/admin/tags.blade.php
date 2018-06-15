@extends('admin.layouts.adminLayouts2')
@section('title','Tags')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Tags</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row h6">
                        <div class="col-sm-10">
                            <h4 class="m-t-0 header-title"><b>Tag List</b></h4>
                        </div>
                        <div class="col-sm-2">
                            @if(in_array('tags.create', $isAuthorize))
                            <a class="btn btn-default waves-effect waves-light" href="{{route('admin.tags.create')}}"><i class="fa fa-plus"></i> Tags</a>
                                @endif
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th data-toggle="true">Id</th>
                            <th>Tag</th>
                            <th>Parent</th>
                            <th data-hide="phone, tablet">Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody class="responseData">
                        @forelse($tags as $tag)
                            <tr>
                                <td class="editTd">
                                    {{$tag->getId()}}
                                </td>
                                <td class="editTd">
                                    {{$tag->getTagName()}}
                                </td>
                                <td class="editTd">
                                    {{null!=$tag->getParent()?$tag->getParent()->getTagName():''}}
                                </td>
                                <td data-active="" class="editTd">
                                    <span class="label label-table label-{{$label = $tag->getIsActive()?"success":"danger"}}">
                                        {{$labelText = $tag->getIsActive()?"Active":"Inactive"}}
                                     </span>
                                </td>
                                <td>
                                    @if(in_array('tags.edit', $isAuthorize))
                                    <a href="{{route('admin.tags.edit',['$tag' => $tag->getId()])}}" class="btn btn-icon waves-effect waves-light btn-white">
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