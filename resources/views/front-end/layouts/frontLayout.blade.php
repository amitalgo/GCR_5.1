<!DOCTYPE html>
<html lang="en">
    <head>
        @include('front-end.include.head')
    </head>
<body>
    <header>
        @include('front-end.include.header')
    </header>
<div class="clearfix"></div>
<section class="bnrSection" id="main-slider">
    <div class="container">
        <div class="col-md-2 col-sm-2 hidden-sm hidden-xs col-xs-12">
            @include('front-end.include.leftsidebar')
        </div>
        <div class="col-md-8 col-xs-12 col-sm-12  minSlide">
            @include('front-end.include.banner-area')
        </div>
        <div class="col-md-2 col-sm-2 hidden-sm hidden-xs col-xs-12">
            @include('front-end.include.rightsidebar')
        </div>
    </div>
</section>
    <section>
<div class="">

    @yield('content')

</div>
    </section>
<footer>
    @include('front-end.include.footer')
</footer>
    <!-- Modal -->


<div class="modal fade" id="popup" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" style="margin:0 45px 0 0 ">Close</button> 
        </div>
        <br/>
        <br/>
      </div>
    </div>
</div>

    <div class="modal fade" id="inquiry-form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Enquire Now</h4>
                </div>
                <div class="modal-body">
                    {!! view('front-end.form.inquiryProductForm')!!}
                </div>
            </div>
        </div>
    </div>

     <div class="modal fade" id="partners-pop-form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Enquire Now</h4>
                </div>
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>

    @include('front-end.include.jsLib')

</body>

</html>
