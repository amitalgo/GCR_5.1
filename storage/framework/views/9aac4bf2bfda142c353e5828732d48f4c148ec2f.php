<?php $__env->startSection('banner-image',asset($banner->getImage())); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
	<!--<div class="flt">-->
	<!--	<h2>Products</h2>-->
	<!--<hr>-->
	<!--</div>-->
	<div class="row">
		<div class="col-md-2 col-sm-2 col-xs-12"></div>
	<div class="col-md-8 col-sm-3 col-xs-12">
	<div class="brdCum">
					<ul>
						<li><a href="<?php echo e(route('home')); ?>">Home</a>/</li>
						<li> Products</li>
					</ul>
				</div></div>
	<div class="col-md-2 col-sm-2 col-xs-12"></div>
	</div>
	
        <div class="">
        	<div class="col-md-2 col-sm-3 col-md-12">
        		<?php if(!$producttags->isEmpty()): ?>
				<form class="form-horizontal" role="form" id="filterForm" action="<?php echo e(route('solution.filter',['id'=>$id])); ?>" method="POST">
					<?php echo e(csrf_field()); ?>

					<div class="leftDrop">
						<h3>Refine by</h3>
						<div class="pdn">						
							<h4>Product</h4>
							<?php $__currentLoopData = $producttags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $producttag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="checkbox">
						          <label>
						            <input type="checkbox" value="<?php echo e($producttag->getId()); ?>" name="product-filter[]" <?php echo e(isset($selectedTags)&&in_array($producttag->getId(), $selectedTags)?'checked':''); ?>>
										<span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
										<?php echo e($producttag->getTagName()); ?>

									</label>
						        </div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<div class="filtr-btn">
						<button type="submit" class="btn btn-sm btn-primary pull-right">Search</button>
					</div>
				</form>
				<?php endif; ?>
			</div>
			<div class="col-md-8 col-sm-8 col-md-12">
				<?php if($scenarioProducts): ?>
					<?php $__currentLoopData = $scenarioProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scenarioProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="row Products">
							<div class="col-md-4 col-sm-4 col-md-12">
								<div class="Products">
									<img src="<?php echo e(asset('images/solution-4.jpg')); ?>" class="img-responsive" alt="solution-4">
								</div>
							</div>
							<div class="col-md-8 col-sm-8 col-md-12">
								<h1><?php echo e($scenarioProduct->getProductId()->getName()); ?></h1>
								<h2>By <?php echo e($scenarioProduct->getProductId()->getVender()); ?></h2>
								<p><?php echo \Illuminate\Support\Str::words($scenarioProduct->getProductId()->getDescription(), 40,' ...'); ?>... <button type="button" class="btn btn-primary more-btn" data-attr="<?php echo e($scenarioProduct->getProductId()->getDescription()); ?>">more</button> </p>
								<div>
									<button type="button" class="btn btn-primary inquire-btn" data-pid="<?php echo e($scenarioProduct->getProductId()->getId()); ?>">Inquire Now</button>
								</div>
							</div>				
						</div>	
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php else: ?>
					<div class="row">
						<p>No products found..</p>
					</div>
				<?php endif; ?>
			</div>
			<div class="col-md-2 col-md-12 hidden-sm hidden-xs">
                        <?php $__env->startComponent('front-end.component.ads',['ads'=>$ads]); ?>
                            <?php echo $__env->renderComponent(); ?>
					</div>
		</div>





	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('front-end.layouts.frontLayout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>