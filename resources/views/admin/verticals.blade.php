@extends('admin.layouts.adminLayouts2')
@section('title','Verticals')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Verticals</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row h6">
                        <div class="col-sm-10">
                            <h4 class="m-t-0 header-title"><b>Vertical List</b></h4>
                        </div>
                        {{--<div class="col-sm-2">--}}
                            {{--@if(in_array('verticals.create', $isAuthorize))--}}
                                {{--<a class="btn btn-default waves-effect waves-light" href="{{route('verticals.create')}}"><i class="fa fa-plus"></i> Verticals</a>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                    </div>
                    <div class="clearfix"></div>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th data-toggle="true">Id</th>
                            <th>Name</th>
                            <th>Priority</th>
                            <th>Add Date</th>
                            <th data-hide="phone, tablet">Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody class="responseData">
                        @forelse($verticals as $vertical)
                            <tr>
                                <td class="editTd">
                                    {{$vertical->getId()}}
                                </td>
                                <td class="editTd">
                                    {{$vertical->getName()}}
                                </td>
                                <td class="editTd">
                                    {{  $vertical->getPriority()}}
                                </td>
                                <td class="editTd">
                                    {{date_format($vertical->getAddDate(),'D d-m-Y')}}
                                </td>
                                <td data-active="" class="editTd">
                                    <span class="label label-table label-{{$label = $vertical->getStatus()?"success":"danger"}}">
                                        {{$labelText = $vertical->getStatus()?"Active":"Inactive"}}
                                     </span>
                                </td>
                                <td>
                                    @if(in_array('verticals.edit', $isAuthorize))
                                        <a href="{{route('admin.verticals.edit',['verticals' => $vertical->getId()])}}" class="btn btn-icon waves-effect waves-light btn-white">
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





@endsection