<div class="removeDivElement">
    <div class="clearfix"></div>
    <hr/>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Image Title</label>
            <input class="required form-control"  parsley-trigger="change" required="required" placeholder="Heading" type="text" name="bannerimage-title[]" value="{{isset($pageBannerData)?$pageBannerData->getName():''}}">


        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Show Button</label><br/>

            <div class="checkbox checkbox-inline">
                <input type="checkbox" id="inlineCheckbox1" name="showButton[]">
                <label for="inlineCheckbox1"> Click on CheckBox if you want to show the button on banner image. </label>
            </div>
        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <label>Button Link</label>
            <input class="required form-control" placeholder="www.gcrcloud.co.in/contact" type="url" name="anchor_url[]" value="{{isset($pageBannerData)?$pageBannerData->getAnchorUrl():''}}">
        </div>
    </div>
    <div class="col-md-6">

        <div class="form-group">
            <label>Button Text</label>
            <input class="required form-control" placeholder="Contact Us" type="text" name="anchor_text[]" value="{{isset($pageBannerData)?$pageBannerData->getAnchorText():''}}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="col-md-5">
            <div class="form-group">
                <label>Banner Image</label> <small>(Size : 1920 X 900 Px)</small>
                <input class="filestyle" id="banner-img" data-size="sm" placeholder="Browse Banner Image" type="file" name="image[]" value="{{isset($pageBannerData)?$pageBannerData->getImage():''}}">
            </div>
        </div>
        <div class="col-md-7" id="img-preview">
            <?php
            if(isset($pageBannerData)){ ?>
            <img class="img-thumbnail thumb-lg"
                 src="{{asset($pageBannerData->getImage())}}" alt="">
            <?php } ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Banner Image Description</label>
            <textarea rows="5"  id="banner_description" required="required" class="form-control" placeholder="Type Imaqe Description" name="banner_image_description[]">@if(isset($pageBannerData)) {{$pageBannerData->getBannerDescription()}} @endif</textarea>
        </div>
    </div>
</div>
    <div class="col-sm-1">
        <div class="form-group">
            <label> </label>
            <button type="button" class="btn btn-icon waves-effect waves-light btn-danger" onclick="init.removeForm(this)"> <i class="fa fa-remove"></i> </button>
        </div>
    </div>
</div>