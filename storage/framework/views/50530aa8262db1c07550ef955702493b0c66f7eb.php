<div class="admRtop">
    <?php $__empty_1 = true; $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

        <div class="banrAd">
            <img src="<?php echo e(asset($ad->getAdsPage()->getImage())); ?>" class="img-responsive image">
            <div class="ad-leftCorn"><i class="fa fa-info-circle" aria-hidden="true"> Ads </i></div>
            <div class="overlay"><?php echo $ad->getAdsPage()->getAddDetail(); ?></div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
	<h2>No Ads   Assign</h2>
    <?php endif; ?>
</div>

