@extends('admin.layouts.adminLayouts2')
@section('title','Product Inquiries Detail')

@section('content')

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Product Inquiries Detail</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row h6">
                        <div class="col-sm-10">
                            <h4 class="m-t-0 header-title"><b>Inquiry Detail</b></h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <table class="table table-striped table-bordered">
                        <tbody class="responseData">
                            <tr>
                                <th>Id</th>
                                <td>{{$productInquiry->getId()}}</td>
                            </tr>
                            <tr>
                                <th>Product</th>
                                <td>{{$productInquiry->getProductId()->getName()}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$productInquiry->getEmail()}}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{$productInquiry->getFirstName().' '.$productInquiry->getLastName()}}</td>
                            </tr>
                            <tr>
                                <th>Company Name</th>
                                <td>{{$productInquiry->getCompanyName()}}</td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td>{{$productInquiry->getWebsite()}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$productInquiry->getPhone()}}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td>{{$productInquiry->getMobile()}}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{$productInquiry->getCountry()}}</td>
                            </tr>
                            <tr>
                                <th>Inquiry Date</th>
                                <td>{{$productInquiry->getDate()}}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{$productInquiry->getDescription()}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





@endsection