<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 12/05/2018
 * Time: 12:17 PM
 */

namespace App\Services\Impl;

use App\Entities\LandingPage;
use App\Entities\LandingTheme;
use App\Services\LandingThemeService;
use App\Repositories\LandingThemeRepo;
class LandingThemeServiceImpl implements  LandingThemeService
{

    private $landingThemeRepo;
    public function __construct(LandingThemeRepo $landingThemeRepo)
    {
        $this->landingThemeRepo = $landingThemeRepo;
    }

    public function getAllThemes()
    {
        return $this->landingThemeRepo->getAllThemes();
    }

    public function getAllActiveThemes()
    {
        return $this->landingThemeRepo->getAllActiveThemes();
    }

    public function saveData($data)
    {

    }

    public function updateData($data, $id)
    {

    }

    public function getTheme($id)
    {
        return $this->landingThemeRepo->getTheme($id);
    }
}