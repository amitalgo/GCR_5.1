<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 11/05/2018
 * Time: 2:50 PM
 */

namespace App\Services;


interface LandingBannerService
{
    public function getAllBanners();
    public function getAllActiveBanners();
    public function saveData($data);
    public function updateData($data,$id);
    public function getBanner($id);
    public function deleteBannerCarousel($id);
}