<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 11/05/2018
 * Time: 2:51 PM
 */

namespace App\Services\Impl;
use App\Entities\LandingBanner;
use App\Entities\LandingBannerImages;
use App\Repositories\LandingBannerRepo;
use App\Services\LandingBannerService;
use App\Services\Impl\UploadService;
use Illuminate\Support\Facades\Input;
class LandingBannerServiceImpl implements LandingBannerService
{
    private $landingBannerRepo,$uploadService;
    public function __construct(LandingBannerRepo $landingBannerRepo,UploadService $uploadService)
    {
       $this->landingBannerRepo = $landingBannerRepo;
       $this->uploadService = $uploadService;
    }

    public function getAllBanners()
    {
        return $this->landingBannerRepo->getAllBanners();
    }
    public function getAllActiveBanners()
    {
        return $this->landingBannerRepo->getAllActiveBanners();
    }
    public function getBanner($id){
        return $this->landingBannerRepo->getBanner($id);
    }

    public function saveData($data)
    {

        $arr_length = count($data->get('bannerimage-title'));
        $input_array = Input::all();
        $banner = new LandingBanner();
        $banner->setAttributes('');
        $banner->setDescription($data->get('description'));
        $banner->setTitle($data->get('title'));
        $banner->setIsActive(1);
        $banner->setUpdatedAt(new \DateTime());
        $banner->setCreatedAt(new \DateTime());

        $mulImage = $this->uploadService->UploadMulFile($data,'image','LandingBanner');
        for($i=0; $i<$arr_length;$i++){
           $bannerImage = new LandingBannerImages();
           $bannerImage->setTitle($input_array['bannerimage-title'][$i]);

            if($mulImage[$i]==''){
                $bannerImage->setMediaUrl($input_array['url'][$i]);
            }else{
                $bannerImage->setMediaUrl($mulImage[$i]);
            }
            $bannerImage->setDescription($input_array['banner_image_description'][$i]);
            isset($input_array['showButton'][$i])?$bannerImage->setShowButton($input_array['showButton'][$i]):$bannerImage->setShowButton(0);
            $bannerImage->setButtonText($input_array['anchor_text'][$i]);
            $bannerImage->setButtonUrl($input_array['anchor_url'][$i]);
            $bannerImage->setAttributes('');
            $bannerImage->setIsActive(1);
            $bannerImage->setCreatedAt(new \DateTime());
            $bannerImage->setUpdatedAt(new \DateTime());
            $banner->addBannerImage($bannerImage);
        }
       return  $this->landingBannerRepo->saveOrUpdate($banner);
    }

    public function updateData($data, $id)
    {
        $result = $this->removeBannerImage($id);
        if($result){
            $arr_length = count($data->get('bannerimage-title'));
            $input_array = Input::all();
            $banner = $this->landingBannerRepo->getBanner($id);
            $banner->setAttributes('');
            $banner->setDescription($data->get('description'));
            $banner->setTitle($data->get('title'));
            $banner->setIsActive($data->get('active'));
            $banner->setUpdatedAt(new \DateTime());
            $banner->setCreatedAt(new \DateTime());

            $mulImage = $this->uploadService->UploadMultipleFileReturnShazUrl($data,'image','LandingBanner');
            for($i=0; $i<$arr_length;$i++){
                $bannerImage = new LandingBannerImages();

                $bannerImage->setTitle($input_array['bannerimage-title'][$i]);

                if(!isset($input_array['image'][$i])){
                    $bannerImage->setMediaUrl($input_array['url'][$i]);
                }else{

                    //dd($mulImage[$i]);
                    $bannerImage->setMediaUrl($mulImage[$i]);
                }

                $bannerImage->setDescription($input_array['banner_image_description'][$i]);
                isset($input_array['showButton'][$i])?$bannerImage->setShowButton($input_array['showButton'][$i]):$bannerImage->setShowButton(0);
                $bannerImage->setButtonText($input_array['anchor_text'][$i]);
                $bannerImage->setButtonUrl($input_array['anchor_url'][$i]);
                $bannerImage->setAttributes('');
                $bannerImage->setIsActive(1);
                $bannerImage->setCreatedAt(new \DateTime());
                $bannerImage->setUpdatedAt(new \DateTime());
                $banner->addBannerImage($bannerImage);
            }
            return  $this->landingBannerRepo->saveOrUpdate($banner);
        }
    }

    public function removeBannerImage($id)
    {
        return $this->landingBannerRepo->removeBannerImage($id);
    }

    public function deleteBannerCarousel($id)
    {
        return $this->landingBannerRepo->deleteBannerCarousel($id);
    }
}