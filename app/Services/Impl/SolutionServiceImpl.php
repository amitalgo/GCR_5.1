<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/03/2018
 * Time: 4:20 PM
 */

namespace App\Services\Impl;


use App\Entities\TagCategory;
use App\Services\SolutionService;
use App\Repositories\SolutionRepo;
use App\Repositories\TagRepo;

class SolutionServiceImpl implements  SolutionService
{

    private $solutionRepo,$tagRepo;
    public function __construct(SolutionRepo $solutionRepo,TagRepo $tagRepo)
    {
        $this->solutionRepo = $solutionRepo;
        $this->tagRepo = $tagRepo;
    }

    public function getAllActiveSolution()
    {
        // TODO: Implement getAllActiveSolution() method.
    }

    public function getAllSolution()
    {
        return $this->solutionRepo->getAllSolution();
    }

    public function getSolutionById($id)
    {
        return $this->solutionRepo->getSolutionById($id);
    }

     public function getSolutionParent($id)
    {
        return $this->solutionRepo->getSolutionParent($id);
    }


    public function addUpdateSolutionTag($data, $id)
    {
        $solution  =  $this->solutionRepo->getSolutionById($id);
        $solutionTags = $solution->getScenarioTagId();
        if(!$solutionTags->isEmpty()){
            $this->solutionRepo->removeSolutionTags($solutionTags);
        }
        foreach ($data->get('tags') as $tag){
            $tagCat = new TagCategory();
            $tagCat->setScenarioId($this->solutionRepo->getSolutionById($id));
            $tagCat->setTagId($this->tagRepo->findTag($tag));
            $tagCat->setStatus(1);
            $solution->addScenarioTags($tagCat);
        }
        return $this->solutionRepo->saveOrUpdate($solution);


    }

    public function solutionList()
    {
        // TODO: Implement solutionList() method.
    }

    public function findSolutionInSolutionTag($id)
    {
        return $this->solutionRepo->findSolutionInSolutionTag($id);
    }
    public function searchfilter($slug)
    {
       return $this->solutionRepo->searchFilter($slug);
    }

    //Amit12-06-2018
    public function getSolutionBySolutionSlug($solutionSlug)
    {
        return $this->solutionRepo->getSolutionBySolutionSlug($solutionSlug);
    }
}