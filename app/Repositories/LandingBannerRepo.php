<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 11/05/2018
 * Time: 2:56 PM
 */

namespace App\Repositories;
use App\Entities\LandingBanner;
use App\Entities\LandingBannerImages;
use Doctrine\ORM\EntityManagerInterface;

class LandingBannerRepo
{
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
    }
    public function getAllBanners(){
        return $this->em->getRepository(LandingBanner::class)->findAll();
    }
     public function getAllActiveBanners(){
        return $this->em->getRepository(LandingBanner::class)->findBy(['isActive'=>1]);
    }
    public function getBanner($id){
        return $this->em->getRepository(LandingBanner::class)->find($id);
    }
    public function saveOrUpdate($data){
        $this->em->persist($data);
        $this->em->flush();
        return true;
    }

    public function removeBannerImage($id){
        $bannerImages = $this->em->getRepository(LandingBannerImages::class)->findBy(['bannerId'=>$id]);

        foreach ($bannerImages as $bannerImage){
            $removeImage = $this->em->getRepository(LandingBannerImages::class)->find($bannerImage->getId());
            $this->em->remove($removeImage);
            $this->em->flush();
        }

        return true;
    }
    public function deleteBannerCarousel($id){
        $removeImage = $this->em->getRepository(LandingBannerImages::class)->find($id);
        $this->em->remove($removeImage);
        $this->em->flush();
        return true;
    }
}