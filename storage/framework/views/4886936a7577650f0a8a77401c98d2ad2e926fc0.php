
<ul class="<?php echo e(!$subsolution->getChildren()->isEmpty()?'dropdown-menu':''); ?>">
        <?php $__currentLoopData = $subsolution->getChildren(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="<?php echo e(!$children->getChildren()->isEmpty()?'dropdown-submenu':''); ?>"><a href="<?php echo e(route('solution.show', ['id'=>$children->getId()])); ?>"><?php echo e($children->getTagName()); ?></a>
                <?php if(!$children->getChildren()->isEmpty()): ?>
                        <?php echo view('front-end.component.submenu',['subsolution'=>$children]); ?>

                <?php endif; ?>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</ul>
