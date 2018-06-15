<?php $__env->startSection('title'); ?>
    <?php echo e(ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1))); ?> | Solution Tags
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> <?php echo e(ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1))); ?> Solution Tags</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">

                            <a class="btn btn-default waves-effect waves-light" href="<?php echo e(route('solutions.index')); ?>"><i class="fa fa-reply"></i> Solutions</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="<?php if(@isset($stag)): ?> <?php echo e(route('solutions.update',['solutions' => $stag->getId()] )); ?> <?php else: ?><?php echo e(route('solutions.store')); ?> <?php endif; ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <?php if(isset($stag)): ?>
                            <input type="hidden" name="_method" value="PUT">
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Solution</label>
                                    <input class="form-control" required="required" placeholder="Solution" type="text" name="solution"  value="<?php if(isset($stag)): ?><?php echo e($stag->getName()); ?> <?php endif; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tags</label>
                                    <select class="form-control select2 multiple"  name="tags[]" multiple="multiple" required="required">
                                        <option value="">Choose Tag</option>
                                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($tag->getId()); ?>" <?php echo e(isset($stag)&&in_array($tag->getId(), $stag->getSelectedTagsByCategory())?'selected':''); ?>><?php echo e($tag->getTagName()); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
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