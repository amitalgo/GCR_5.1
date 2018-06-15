<?php $__env->startSection('banner-image',asset($banner->getImage())); ?>
<?php $__env->startSection('content'); ?>

<style>
	.admRtop {
    margin-bottom: 10px;
    float: right;
    width: 96%;
}
</style>
    <div class="container">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="feature" style="background-image:none; padding:0px 0px 30px 0px">
                <div class="">
                    <div class="flt">
						<!--<h2>Experience Centre</h2><hr/>-->
					</div>
                    <div class="col-md-10 col-xs-12 col-pdn">

                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h3 class="solutionh3"><?php echo e($category->getName()); ?></h3>
                            <div class="clearfix"></div>
                            <div class="col-md-12 col-xs-12 col-pdn">
                                <?php $counter=1; ?>
                                <?php $__empty_1 = true; $__currentLoopData = $category->getExpCategory(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expVideo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <?php if($expVideo->getIsActive()==1): ?>
                                        <?php if($counter>4): ?>
                                            <?php break; ?>
                                        <?php endif; ?>

                                        <div class="exper-Video">
                                            <iframe width="100%" height="160" src=" <?php echo e($expVideo->getMediaUrl()); ?>" frameborder="0" allow="autoplay" encrypted-media allowfullscreen></iframe>
                                            <div class="vidTittle"><?php echo e($expVideo->getTitle()); ?></div>
                                        </div>


                                        <?php $counter++; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    Comming Soon .....
                                <?php endif; ?>
                                <?php if($counter>1): ?>
                                    <div class="clearfix"></div>
                                    <a href="<?php echo e(route('experience-centre.list',['id'=>$category->getId()])); ?>" class="category-btn">View More</a>
                                <?php else: ?>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
						
                    </div>
					<div class="col-md-2 col-md-12 hidden-xs" style="padding-right:0;">
                        <?php $__env->startComponent('front-end.component.ads',['ads'=>$ads]); ?>
                            <?php echo $__env->renderComponent(); ?>
					</div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front-end.layouts.frontLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>