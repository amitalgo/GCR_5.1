<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 12/05/2018
 * Time: 1:15 PM
 */

namespace App\Repositories;
use App\Entities\LandingPage;
use Doctrine\ORM\EntityManagerInterface;


class LandingPageRepo
{
    private $em;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getAllLanding()
    {
        return $this->em->getRepository(LandingPage::class)->findAll();
    }

    public function saveData($data)
    {
        $this->em->persist($data);
        $this->em->flush();
        return true;
    }
    public function getLandingPage($id){
        return $this->em->getRepository(LandingPage::class)->find($id);
    }
    public function getLandingPageBySlug($slug)
    {
        return $this->em->getRepository(LandingPage::class)->findOneBy(['slug'=>$slug]);
    }
}