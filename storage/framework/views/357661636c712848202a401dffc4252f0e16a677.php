<div class="leftSideBr">
    <h3>INDUSTRY</h3>
	
    <div class="leftscrol">



    <div style="overflow: hidden; position: relative;" id="news-container">
    	<ul style="position: absolute; margin: 0pt; padding: 0pt; top: 0px;">
    	    <?php $__currentLoopData = $verticals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vertical): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li style="margin: 0pt; padding: 0pt; height:30px; display: list-item;">
                    <div><a href="<?php echo e(route('solution.index', ['solutionId'=>$vertical->getId()])); ?>"><?php echo e($vertical->getName()); ?></a></div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    		</ul>
    </div>
	
    </div>
    <div class="clearfix"></div>
    <h4>About GCR</h4>
    <div class="clearfix"></div>
    <p><?php echo \Illuminate\Support\Str::words($abouts->getDescription(), 19,' ...'); ?> <a href="<?php echo e(route('about-GCR')); ?>" style="color:#8a0917;">Read more</a></p>
</div>