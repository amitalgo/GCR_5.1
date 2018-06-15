<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo $__env->make('front-end.include.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>
<body>
    <header>
        <?php echo $__env->make('front-end.include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </header>
<div class="clearfix"></div>
<section class="bnrSection" id="main-slider">
    <div class="container">
        <div class="col-md-2 col-sm-2 hidden-sm hidden-xs col-xs-12">
            <?php echo $__env->make('front-end.include.leftsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-12  minSlide">
            <?php echo $__env->make('front-end.include.banner-area', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-2 col-sm-2 hidden-sm hidden-xs col-xs-12">
            <?php echo $__env->make('front-end.include.rightsidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</section>
    <section>
<div class="">

    <?php echo $__env->yieldContent('content'); ?>

</div>
    </section>
<footer>
    <?php echo $__env->make('front-end.include.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</div>

    <div class="modal fade" id="inquiry-form" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Inquire Now</h4>
                </div>
                <div class="modal-body">
                    <?php $__env->startComponent('front-end.form.inquiryProductForm'); ?>
                    <?php echo $__env->renderComponent(); ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('front-end.include.jsLib', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

</body>

</html>
