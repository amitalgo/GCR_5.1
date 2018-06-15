    <form action="<?php echo e(route('inquire.submit')); ?>" method="post" onsubmit="">
        <fieldset class="alertDiv">
            <div class="col-md-12">
                <div class="col-md-6">

                </div>
            </div>
        </fieldset>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label>First Name</label> <span class="red">* <small></small></span>
                    <input class="form-control required" placeholder="First Name" type="text" name="firstName">
                    <input type="hidden" name="pid" id="pid"/>
                    <?php echo e(csrf_field()); ?>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Last Name</label> <span class="red">* <small></small></span>
                    <input class="form-control required"  placeholder="Last Name" type="text" name="lastName">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Title</label> <span class="red">* <small></small></span>
                    <input class="form-control required" placeholder="Title" type="text" name="title">
                </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label><span class="red">* <small></small></span>
                    <input class="form-control required"  placeholder="Email" type="email" name="email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Country</label> <span class="red">* <small></small></span>
                    <select class="form-control required"  name="country">
                        <option value="">Choose Country</option>
                        
                        
                        
                        <option value="TW">TW</option>
                        <option value="US">US</option>
                        <option value="IN">IN</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Company Name</label><span class="red">* <small></small></span>
                    <input class="form-control required"  placeholder="Company Name" type="text" name="company">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Website</label>
                    <input class="form-control"  placeholder="www.yourwebsite.com" type="text" name="website">
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Number</label> <span class="red">* <small></small></span>
                    <input class="form-control required"  placeholder="Phone" type="text" name="number">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Mobile</label> <span class="red">* <small></small></span>
                    <input class="form-control required"  placeholder="Mobile" type="text" name="mobile">
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="form-group-text">

                    <label>Address</label> <span class="red">* <small></small></span>
                    <textarea class="form-control required"  placeholder="Description" name="description"></textarea>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12" style="margin-top: 15px;">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="submit" class="btn btn-info popupsubmit" value="Submit"/>
                    <input type="button" class="btn btn-warning closePopUp" value="Close"/>
                </div>
            </div>
        </div>
    </form>