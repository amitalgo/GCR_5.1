@extends('admin.layouts.adminLayouts2')
@section('title','Product Inquiries')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Product Inquiries</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row h6">
                        <div class="col-sm-10">
                            <h4 class="m-t-0 header-title"><b>Inquiries on {{$product->getName()}}</b></h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th data-toggle="true">Id</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Website</th>
                            <th>Mobile</th>
                            <th>Country</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody class="responseData">
                        @foreach($product->getProductInquiryId() as $productInquiry)
                            <tr>
                                <td class="editTd">{{$productInquiry->getId()}}</td>
                                <td class="editTd">{{$productInquiry->getEmail()}}</td>
                                <td class="editTd">{{$productInquiry->getFirstName().' '.$productInquiry->getLastName()}}</td>
                                <td class="editTd">{{$productInquiry->getCompanyName()}}</td>
                                <td class="editTd">{{$productInquiry->getWebsite()}}</td>
                                <td class="editTd">{{$productInquiry->getMobile()}}</td>
                                <td class="editTd">{{$productInquiry->getCountry()}}</td>
                                <td class="editTd">{{$productInquiry->getDate()}}</td>
                                <td class="editTd"><a href="{{route('admin.products.inquiryDetail',['id' => $product->getId(), 'inquiryId'=>$productInquiry->getId()])}}" class="btn btn-icon waves-effect waves-light btn-white">
                                        <i class="fa fa-eye"></i>
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





@endsection