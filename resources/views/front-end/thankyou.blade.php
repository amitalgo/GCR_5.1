@extends('front-end.layouts.thankyouLayout')
@section('title','GCR Cloud | ThankYou')
@section('content')
<style>

	
	 section#page-not-found {text-align: center; height:auto;}
	 section#page-not-found h2{font-size: 60px;}
	.btn:hover{ background:#0eaaef;}
	.btn {
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    outline: 0;
    padding: 0 15px;
    position: relative;
    line-height: 35px;
    font-size: 14px;
    font-weight: 600;
    color: #f6f6f6 !important;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -ms-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease; background: #009bdf; border:0px;
}

.jumbotron{ background:#fff; padding: 25px 0;}
.jumbotron p { margin-bottom: 15px; font-size:1.2em; font-weight:normal;}


h2.bigtitle { font-family: 'Luckiest Guy', cursive; font-weight: normal; position: relative; text-align: center; font-size:60px; text-transform:capitalize; margin-bottom: 10px; color:#1c1c1c;}
h2.bigtitle::before {
    background: #009bdf;
    content: "";
    display: block;
    height: 1px;
    position: absolute;
    top: 45%;
    width: 100%;
}
h2.bigtitle::after {
    background: #009bdf;
    content: "";
    display: block;
    height: 1px;
    position: absolute;
    top: 55%;
    width: 100%;
}
h2.bigtitle span {
    background: #fff;
    padding: 0 15px;
    position: relative;
    z-index: 1;
}

.fa-check-circle{ color:#009bdf;}

</style>
        <!-- ===== Start of Page not Found Section ===== -->
    <section class="ptb160" id="page-not-found">
	 @include('alert')
        <div class="">
            
            <div class="jumbotron text-xs-center">
			<div class="bubbles"></div>
			<h2 class="bigtitle"><span>Thank You!</span></h2>
			<i class="fa fa-check-circle fa-4x" aria-hidden="true"></i>

			<p class="lead"><strong>Thank You For Your Submission. We will Contact You Shortly.</strong></p>
  
  
  <p class="lead">
    <a class="btn btn-primary btn-sm" href="http://www.gcrcloud.co.in/" role="button">Continue to homepage</a>
  </p>
</div>
        </div>
    </section>
    <!-- Event snippet for Form FIlled conversion page -->
<script>
  gtag('event', 'conversion', {'send_to': 'AW-807856638/pWKSCIb1_IIBEP7Tm4ED'});
</script>
@endsection