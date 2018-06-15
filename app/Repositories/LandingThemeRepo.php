<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 12/05/2018
 * Time: 12:20 PM
 */

namespace App\Repositories;
use App\Entities\LandingTheme;
use Doctrine\ORM\EntityManagerInterface;

class LandingThemeRepo
{
    private $em;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
    }

    public function getAllThemes()
    {
        return $this->em->getRepository(LandingTheme::class)->findBy();
    }

    public function getAllActiveThemes()
    {
        return $this->em->getRepository(LandingTheme::class)->findBy(["isActive"=>1]);
    }

    public function saveData($data)
    {
        // TODO: Implement saveData() method.
    }

    public function updateData($data, $id)
    {
        // TODO: Implement updateData() method.
    }

    public function getTheme($id)
    {
        return $this->em->getRepository(LandingTheme::class)->find($id);
    }
}