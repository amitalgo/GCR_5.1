<div class="navbar navbar-default navbar-fixed-top" role="navigation">
 <div class="navigation">
    <div class="container">
<div class="">
        <div class="col-md-2 col-sm-12 mobPdn">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="navbar-brand">
                            <a href="<?php echo e(route('home')); ?>">
                                <img src="<?php echo e(asset('images/front-images/logo.png')); ?>" alt="logo"></a>
                        </div>
						
					
                    <div class="social-icon hidden-md hidden-lg">
					<div class="search-icon" id="show">
						<div><input type="text" placeholder="Search.."></div>
                    </div>
                        <ul class="social-network">
                            <li><a href="#"> <img src="<?php echo e(asset('images/front-images/search-icon.jpg')); ?>" class="secon" width="21" height="19" alt="search-icon"></a></li>
                            <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>

                    </div>
                    </div>
					
					
                </div>
				
		 <div class="col-md-8 col-sm-12 col-xs-12 col-pdn mobPdn desk">		
        <div class="collapse navbar-collapse">
            
            <ul class="nav navbar-nav">
                
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Solutions <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu multi-level">
                        <?php $__currentLoopData = $solutiontags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $solutiontag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e(!$solutiontag->getChildren()->isEmpty()?'dropdown-submenu':''); ?>">
                            <a href="<?php echo e(route('solution.show', ['id'=>$solutiontag->getId()])); ?>" class="<?php echo e(!$solutiontag->getChildren()->isEmpty()?'dropdown-toggle':''); ?>" data-toggle="<?php echo e(!$solutiontag->getChildren()->isEmpty()?'dropdown':''); ?>"><?php echo e($solutiontag->getTagName()); ?></a>
                            <?php if(!$solutiontag->getChildren()->isEmpty()): ?>
                                <?php echo view('front-end.component.submenu',['subsolution'=>$solutiontag]); ?>

                            <?php endif; ?>
                        </li>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>
				<li class="dropdown simple-menu">
                                <a href="<?php echo e(route('experience-centre')); ?>" class="dropdown-toggle <?php if(Route::current()->getName()=='experience-centre'): ?> active-menu  <?php endif; ?>">Experience Centre</a>
                            </li>
							<li class="dropdown simple-menu">
                                <a href="<?php echo e(route('support')); ?>" class="dropdown-toggle <?php if(Route::current()->getName()=='support'): ?> active-menu  <?php endif; ?>">Support</a>
                            </li>
                <li>
				<a href="#" class="dropdown-toggle <?php if(Route::current()->getName()=='solution-partners' || Route::current()->getName()=='channel-partners'): ?> active-menu  <?php endif; ?>" data-toggle="dropdown">Partners <i class="fa fa-angle-down"></i></a>
                    
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo e(route('channel-partners')); ?>" class="Navshow">Integration Partners</a></li>
                       <li class=""><a href="<?php echo e(route('solution-partners')); ?>">Technology Partners</a></li>
                    </ul>
                </li>
				<li class="dropdown simple-menu">
                                <a href="<?php echo e(route('news')); ?>" class="dropdown-toggle <?php if(Route::current()->getName()=='news'): ?> active-menu  <?php endif; ?>" role="button">News</a>
                            </li>
							<li class="dropdown simple-menu">
                                <a href="<?php echo e(route('about-GCR')); ?>" class="dropdown-toggle <?php if(Route::current()->getName()=='about-GCR'): ?> active-menu  <?php endif; ?>" role="button">About GCR</a>
                            </li>

                            <li class="dropdown simple-menu">
                                <a href="<?php echo e(route('contact')); ?>" class="dropdown-toggle <?php if(Route::current()->getName()=='contact'): ?> active-menu  <?php endif; ?>" role="button">Contact Us</a>
                            </li>
                            <!-- Simple Menu Item -->
                         <li class="dropdown simple-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-lock"></i> login <i class="fa fa-angle-down"></i></a>
								<ul class="dropdown-menu" role="menu">
                                    <li><a href="http://www.gcrcpsp.com/guest/sign_up/form" target="_balnk" class="Navshow">CPSP</a></li>
                                    <li class=""><a href="javascript:void(0)">Forum</a></li>
                                  
                                </ul>
                         </li>
            </ul>
        </div>
		</div>
		<div class="col-md-2 col-sm-2 hidden-sm hidden-xs col-xs-12">
                    <div class="search-icon" id="show">

                        <div ><input type="text" placeholder="Search.."></div>
                    </div>
                    <div class="social-icon">
                        <ul class="social-network">
                            <li><a href="#"> <img src="<?php echo e(asset('images/front-images/search-icon.jpg')); ?>" class="secon" width="21" height="19" alt="search-icon"></a></li>
                            <li><a href="#" class="fb tool-tip" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter tool-tip" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="linkedin tool-tip" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>

                    </div>
                </div>
				</div>
		<!--/.nav-collapse -->
    </div>
	</div>
</div>
    <?php echo $__env->make('alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
	<div  class="lodForm" style="position: fixed;display: none;">
		 <div class="popupcontact"></div>
	</div>
   <script>
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>