<?php $__env->startSection('title'); ?>
    <?php echo e(ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1))); ?> | Tags
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title"> <?php echo e(ucfirst(substr(Route::currentRouteName(),strpos(Route::currentRouteName(),".") + 1))); ?> Tags</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-sm-2">

                            <a class="btn btn-default waves-effect waves-light" href="<?php echo e(route('tags.index')); ?>"><i class="fa fa-reply"></i> Tags List</a>
                        </div>
                    </div>
                    <hr/>
                    <form class="form-horizontal" role="form" id="addForm" action="<?php if(@isset($tag)): ?> <?php echo e(route('tags.update',['tag' => $tag->getId()] )); ?> <?php else: ?><?php echo e(route('tags.store')); ?> <?php endif; ?>" method="POST">
                        <?php echo e(csrf_field()); ?>

                        <?php if(isset($tag)): ?>
                            <input type="hidden" name="_method" value="PUT">
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" required="required" placeholder="Title" type="text" name="title"  value="<?php if(isset($tag)): ?><?php echo e($tag->getTagName()); ?> <?php endif; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Parent</label>
                                    <select class="form-control"  name="parent-tag">
                                    <option value="">Choose Tag</option>
                                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parentTag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($parentTag->getId()); ?>" <?php echo e(isset($tag)&&$tag->getParent()!=null&&$tag->getParent()->getId()==$parentTag->getId()?'selected':''); ?>><?php echo e($parentTag->getTagName()); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea rows="5"  id="detail" class="form-control summernote" placeholder="" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>    
                            <?php if(isset($tag)): ?>                    
                            <div class="row">
                                <div class="form-group">
                                    <label class="col-md-1 control-label text-left" for="active">Status : </label>
                                    <div class="col-md-6">
                                        <div class="radio radio-success radio-inline">
                                            <input type="radio" id="active_1" name="active" value="1" <?php echo e($tag->getIsActive()?'checked':''); ?>>
                                            <label for="active_1">Active</label>
                                        </div>
                                        <div class="radio radio-danger radio-inline">
                                            <input type="radio" id="active_0" name="active" value="0" <?php echo e($tag->getIsActive()?'':'checked'); ?>>
                                            <label for="active_0">Inactive</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
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