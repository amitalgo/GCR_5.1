<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/03/2018
 * Time: 4:17 PM
 */

namespace App\Services;


interface SolutionService
{
    public function getAllActiveSolution();
    public function getAllSolution();
    public function getSolutionById($id);
    public function addUpdateSolutionTag($data,$id);
    public function findSolutionInSolutionTag($id);
    public function solutionList();
    public function getSolutionParent($id);
    public function searchfilter($slug);
    public function getSolutionBySolutionSlug($solutionSlug); //Amit 12-6-18
}