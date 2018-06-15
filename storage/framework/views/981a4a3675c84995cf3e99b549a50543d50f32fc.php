<?php $__env->startSection('title','Product Inquiries'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Product Inquiries</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row h6">
                        <div class="col-sm-10">
                            <h4 class="m-t-0 header-title"><b>Inquiries on <?php echo e($product->getName()); ?></b></h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th data-toggle="true">Id</th>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Company Name</th>
                            <th>Website</th>
                            <th>Mobile</th>
                            <th>Country</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody class="responseData">
                        <?php $__currentLoopData = $product->getProductInquiryId(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productInquiry): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="editTd"><?php echo e($productInquiry->getId()); ?></td>
                                <td class="editTd"><?php echo e($productInquiry->getEmail()); ?></td>
                                <td class="editTd"><?php echo e($productInquiry->getFirstName().' '.$productInquiry->getLastName()); ?></td>
                                <td class="editTd"><?php echo e($productInquiry->getCompanyName()); ?></td>
                                <td class="editTd"><?php echo e($productInquiry->getWebsite()); ?></td>
                                <td class="editTd"><?php echo e($productInquiry->getMobile()); ?></td>
                                <td class="editTd"><?php echo e($productInquiry->getCountry()); ?></td>
                                <td class="editTd"><?php echo e($productInquiry->getDate()); ?></td>
                                <td class="editTd"><a href="<?php echo e(route('products.inquiryDetail',['id' => $product->getId(), 'inquiryId'=>$productInquiry->getId()])); ?>" class="btn btn-icon waves-effect waves-light btn-white">
                                        <i class="fa fa-eye"></i>
                                    </a></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.adminLayouts2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>