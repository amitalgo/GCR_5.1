@extends('front-end.layouts.frontLayout')
@section('title','GCR-Cloud | Support')
@section('banner-image',asset($banner->getImage()))
@section('content')

    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="feature" style="background-image:none; padding:0px 0px 30px 0px">
                <div class="row contInfo contact-1">
				<div class="flt">
						<h2 style="margin: 0 0 15px  18px;text-align: left;">Support <span>Form</span> </h2>
					</div>
					<div class="col-md-8 col-sm-8 col-xs-12 col-pdn">
                                <form action="{{route('support.submit')}}" method="post">
                                    <fieldset class="alertDiv"></fieldset>

                                    <div class="form-group">
                                        <label>Customer Name</label> <span class="red">* <small></small></span>
                                        <input class="form-control" required placeholder="Customer Name" type="text" name="customerName">
                                        {{csrf_field()}}
                                    </div>
                                    <div class="form-group">
                                        <label>Partner Name</label> <span class="red">* <small></small></span>
                                        <input class="form-control" required  placeholder="Partner Name" type="text" name="partnerName">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label><span class="red">* <small></small></span>
                                        <input class="form-control" required  placeholder="Email" type="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Number</label> <span class="red">* <small></small></span>
                                        <input class="form-control" required  placeholder="Contact Number" type="text" name="number">
                                    </div>
                                    <div class="form-group">
                                        <label>Support</label> <span class="red">* <small></small></span>
                                        <select class="form-control" required  name="support">
                                            <option value="high">High</option>
                                            <option value="medium">Medium</option>
                                            <option value="low">Low</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product</label> <span class="red">* <small></small></span>
                                        <input class="form-control" required  placeholder="Product" name="prodDescription" maxlength="50">
                                    </div>
                                    <div class="form-group-text">
                                        <label>Problem Description</label> <span class="red">* <small></small></span>
                                        <textarea class="form-control" required  placeholder="Problem Description" name="probDescription"></textarea>
                                    </div>
                                    <div class="clearfix"></div>
                                   
                                        {!! app('captcha')->render() !!}
                                    <div class="clearfix"></div>
                                   <!--  <div class="g-recaptcha" data-sitekey="6LefRlkUAAAAADIuFg6Oc5Jy0sg5PNi7JCfGyxqY"></div> -->
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Submit"/>
                                    </div>


                                </form>
                            </div>


						   {!! $content->getDescription() !!}


                    
                </div>

                <div class="row contInfo ">
				<div class="row">
				<div class="col-md-12">
                    
					</div>
					</div>
                    <div class="flt">
                        <div class="row">
                            
                         
                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>

@endsection