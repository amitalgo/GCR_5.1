<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/03/2018
 * Time: 4:22 PM
 */

namespace App\Repositories;

use App\Entities\ScenarioDetail;
use App\Entities\ScenarioTitle;
use App\Entities\ScenarioTitleSlug;
use App\Entities\TagCategory;
use LaravelDoctrine\ORM\Facades\Doctrine;
use Doctrine\ORM\EntityManagerInterface;
class SolutionRepo
{

    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function getAllActiveSolution()
    {
        // TODO: Implement getAllActiveSolution() method.
    }

    public function getAllSolution()
    {
        return $this->em->getRepository(ScenarioDetail::class)->findAll();
    }

    public function getSolutionById($id)
    {
        return $this->em->getRepository(ScenarioDetail::class)->find($id);
    }

      public function getSolutionParent($id)
    {
        return $this->em->getRepository(ScenarioTitle::class)->find($id);
    }


    public function saveOrUpdate($data)
    {
        $this->em->persist($data);
        $this->em->flush();
        return true;
    }


    public function findSolutionInSolutionTag($id){
        return $this->em->getRepository(TagCategory::class)->findBy(['scenarioId'=>$id]);
    }
    public function solutionList()
    {
        // TODO: Implement solutionList() method.
    }

    public function removeSolutionTags($solutionTags){
        foreach ($solutionTags as $solutionTag){
            $this->em->remove($solutionTag);
        }
        $this->em->flush();
        return true;
    }   

       public function searchFilter($slug){
        $qarr = [];
        $query = $this->em->createQuery(
            'SELECT p FROM App\Entities\Product p WHERE p.name LIKE :slug'
        )
            ->setParameter('slug','%'.$slug.'%');
        $qarr['product'] =  $query->getResult();
        $query = $this->em->createQuery(
            'SELECT n FROM App\Entities\News n WHERE n.newsHeading LIKE :slug'
        )
            ->setParameter('slug','%'.$slug.'%');
        $qarr['news'] = $query->getResult();
       // dd($qarr);
        return $qarr;
    }

    //Amit 12-06-2018
    public function getSolutionBySolutionSlug($solutionSlug)
    {
//        return $this->em->getRepository(ScenarioTitle::class)->findOneBy(array('urlSlug'=>$solutionSlug));

        return $this->em->getRepository(ScenarioTitleSlug::class)->findOneBy(array('urlSlug'=>$solutionSlug));

    }

}