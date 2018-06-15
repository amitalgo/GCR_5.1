<?php $__env->startSection('title'); ?>
    <?php echo e(ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1))); ?> | Vertical Images
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> <?php echo e(ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1))); ?>  Vertical Images</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">
                            <a class="btn btn-default waves-effect waves-light" href="<?php echo e(route('verticals.index')); ?>"><i class="fa fa-reply"></i> Vertical Listt</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="<?php echo e(route('verticals.update',['verticals' => $vertical->getId()] )); ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Vertical Name</label>
                                    <input class="form-control" required="required" placeholder="Vertical" type="text" name="vertical"  readonly="readonly" value="<?php if(isset($vertical)): ?><?php echo e($vertical->getName()); ?> <?php endif; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Image</label>
                                        <?php echo e(csrf_field()); ?>

                                        <input type="hidden" name="_method" value="PUT">
                                        <input class="filestyle" id="banner-img" data-size="sm" placeholder="Browse Image" type="file" name="image"/>
                                    </div>
                                </div>
                                <div class="col-md-5" id="img-preview">
                                        <?php if($vertical->getVerticalImages()): ?>
                                        <img class="img-thumbnail thumb-lg" src="<?php echo e(asset($vertical->getVerticalImages()->getImage())); ?>" alt="">
                                            <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="clear-fix"></div>


                        <div class="row">
                            <button type="submit" class="btn btn-default waves-effect waves-light btn-md">
                                Submit
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.adminLayouts2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>