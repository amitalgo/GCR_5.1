<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 12/05/2018
 * Time: 12:12 PM
 */

namespace App\Services;


interface LandingPageService
{
    public function getAllLanding();
    public function saveData($data);
    public function updateData($data,$id);
    public function getLandingPage($id);
    public function getLandingPageBySlug($slug);

}