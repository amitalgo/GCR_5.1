<?php $__env->startSection('title','Product Inquiries Detail'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <h4 class="page-title">Product Inquiries Detail</h4>
                <p class="text-muted page-title-alt">Welcome to GCR admin panel !</p>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card-box">
                    <div class="row h6">
                        <div class="col-sm-10">
                            <h4 class="m-t-0 header-title"><b>Inquiry Detail</b></h4>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <table class="table table-striped table-bordered">
                        <tbody class="responseData">
                            <tr>
                                <th>Id</th>
                                <td><?php echo e($productInquiry->getId()); ?></td>
                            </tr>
                            <tr>
                                <th>Product</th>
                                <td><?php echo e($productInquiry->getProductId()->getName()); ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo e($productInquiry->getEmail()); ?></td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td><?php echo e($productInquiry->getFirstName().' '.$productInquiry->getLastName()); ?></td>
                            </tr>
                            <tr>
                                <th>Company Name</th>
                                <td><?php echo e($productInquiry->getCompanyName()); ?></td>
                            </tr>
                            <tr>
                                <th>Website</th>
                                <td><?php echo e($productInquiry->getWebsite()); ?></td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td><?php echo e($productInquiry->getPhone()); ?></td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td><?php echo e($productInquiry->getMobile()); ?></td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td><?php echo e($productInquiry->getCountry()); ?></td>
                            </tr>
                            <tr>
                                <th>Inquiry Date</th>
                                <td><?php echo e($productInquiry->getDate()); ?></td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td><?php echo e($productInquiry->getDescription()); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.adminLayouts2', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>