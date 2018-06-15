<?php $__env->startSection('title','Products'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Products</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row h6">
                        <div class="col-sm-10">
                            <h4 class="m-t-0 header-title"><b>Products List</b></h4>
                        </div>
                        
                            
                                
                            
                        
                    </div>
                    <div class="clearfix"></div>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th data-toggle="true">Id</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Description</th>
                            <th>Tags</th>
                            <th>Vendor</th>
                            <th data-hide="phone, tablet">Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody class="responseData">
                        <?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>
                                <td class="editTd">
                                    <?php echo e($product->getId()); ?>

                                </td>
                                <td class="editTd">
                                    <?php echo e($product->getName()); ?>

                                </td>
                                <td class="editTd">
                                    <?php echo e($product->getProductParent()); ?>

                                </td>
                                <td class="editTd">
                                    <?php echo \Illuminate\Support\Str::words($product->getDescription(), 20,'....'); ?>

                                </td>
                                <td class="editTd">
                                    <?php echo e($product->getProductTag()); ?>

                                </td>

                                <td class="editTd">
                                    <?php echo e($product->getVender()); ?>

                                </td>

                                <td data-active="" class="editTd">
                                    <span class="label label-table label-<?php echo e($label = $product->getStatus()?"success":"danger"); ?>">
                                        <?php echo e($labelText = $product->getStatus()?"Active":"Inactive"); ?>

                                     </span>
                                </td>
                                <td>
                                    <?php if(in_array('productstags.edit', $isAuthorize)): ?>
                                        <a href="<?php echo e(route('productstags.edit',['product' => $product->getId()])); ?>" class="btn btn-icon waves-effect waves-light btn-white">
                                            <i class="fa fa-link"></i>
                                        </a>
                                    <?php endif; ?>
                                    &nbsp;&nbsp;&nbsp;
                                    <a href="<?php echo e(route('products.inquiry',['id' => $product->getId()])); ?>" class="btn btn-icon waves-effect waves-light btn-white">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.adminLayouts2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>