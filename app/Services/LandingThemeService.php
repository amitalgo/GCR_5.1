<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 12/05/2018
 * Time: 12:17 PM
 */

namespace App\Services;


interface LandingThemeService
{
    public function getAllThemes();
    public function getAllActiveThemes();
    public function saveData($data);
    public function updateData($data,$id);
    public function getTheme($id);
}