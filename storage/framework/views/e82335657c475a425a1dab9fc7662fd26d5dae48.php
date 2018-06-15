<div class="RightSideBr">
    <h1>News</h1>
    <div class="clearfix"></div>
	
	
	 
	<div class="setPos">
    <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<div class="news-mar-bot">
		<div class="new-img"><img src="<?php echo e(asset($new->thumbnail)); ?>" class="img-responsive" alt="right-side-img"></div>
	<div class="new-text">
		<a href="<?php echo e(route('news.list',['id'=>$new->id])); ?>"><?php echo e(\Illuminate\Support\Str::words($new->news_heading,7,'')); ?> </a>
	</div>
	</div>
	<div class="clearfix"></div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        No News Found
    <?php endif; ?>
		<div class="seebtn"><a href="#">see more</a></div>
   </div>
    
		
<div class="clearfix"></div>

<div class="event">
    <h1>Events</h1>
    <div class="clearfix"></div>
<div class="setPos">
    <?php $__empty_1 = true; $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
	<div class="news-mar-bot">
	<div class="new-img"><img src="<?php echo e(asset($event->thumbnail)); ?>" class="img-responsive" alt="right-side-img"></div>
    <div class="even-text">
		<a href="<?php echo e(route('news.list',['id'=>$event->id])); ?>"><?php echo e(\Illuminate\Support\Str::words($event->news_heading,7,'')); ?></a>
	</div>
    
	</div>
	 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        No Events Found
    <?php endif; ?>
		<div class="clearfix"></div>
		<span class="seebtn"><a href="#">see more</a></span>
	</div>
	</div>
 
   
</div>