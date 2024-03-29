<div class="footer">
    <div class="container">
        <div class="row">
        
        <div class="col-md-4 col-sm-3 col-xs-12">
		<div class="fot-about">
			<h4>About GCR</h4>
			 <p>{!! \Illuminate\Support\Str::words($abouts->getDescription(), 19,' ...')!!} <a href="{{route('about-GCR')}}">Read more</a></p>
			</div>
		</div>
		<div class="col-md-5 col-sm-5 col-xs-12 col-pdn">
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="navigate accordion-group">
				<h4 style="margin: 0 0 5px;">navigate</h4>
 				<ul>
					`
					<li><a href="{{route('experience-centre')}}"></a></li>
					<li><a href="{{route('support')}}" >Support</a></li>
					<li><a href="{{route('news')}}">News</a></li>
					<li><a href="{{route('contact')}}">CONTACT US</a></li>
                </li>
				<ul>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
			<div class="navigate">
				<h4 style="margin: 0 0 5px;">&nbsp;</h4>
				<ul>
					<li><a href="{{route('experience-centre')}}">Experience Centre</a></li>
					<li><a href="{{route('channel-partners')}}" class="Navshow">Integration Partners</a></li>
					<li class=""><a href="{{route('solution-partners')}}">Technology Partners</a></li>
				<ul>
			</div>
		</div>
			
        </div>
		<div class="col-md-3 col-sm-3 col-xs-12">
		<!--<div class="fot-logo">
                <img src="{{asset('images/front-images/logo.png')}}" width="95" height="33" class="img-responsive" alt="logo">
        </div>-->
			<div class="social-icon2">
         <ul class="list-inline social-buttons">

              <li class="list-inline-item">
                <a href="https://www.facebook.com/GCRIndia" target="_blank">
					<i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="http://www.twitter.com/gcr_india" target="_blank">
                   <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="https://www.linkedin.com/authwall?trk=gf&trkInfo=AQHYBBR3yP42RAAAAWLcPV3A3eM-hNlzlJlqhHZwM99N6U25GA_F3Ov_Eg3eGXij1Jn4mUv12w6KlhWSowJz7zHO-xrmuyXmrUjCVBja--wkcJw7Z8GBJ4Fsgn2wzcx0RBqdFZk=&originalReferer=&sessionRedirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2Fgcr-india%2F" target="_blank">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
         </div>
        </div>
		</div>
		
		<br/>
		<div class="rwo fot-about">
			<div class="col-md-12 bdr col-pdn">
			<p><strong>Global Channel Resources India Pvt. Ltd.</strong>  1007, Universal Majestic, P.L. Lokhande Marg, Chembur (West) Mumbai - 400043</p>
			</div>
		</div>
		
		<div class="rwo fot-about">
			<div class="social-foot text-center" style="color: #fff!important">
                   <a href="{{route('disclaimer')}}" class="" target="_blank">Disclaimer </a> | <a href="{{route('terms-of-use')}}" class="" target="_blank"> Terms of Use  </a> | <a href="{{route('privacy-policy')}}" class="" target="_blank">Privacy Policy </a>
            </div>
		
		</div>
    </div>

    <div class="pull-right">
        <a href="#home" class="scrollup"><i class="fa fa-angle-up fa-3x"></i></a>
    </div>
</div>

