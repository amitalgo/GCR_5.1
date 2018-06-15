<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 29/03/2018
 * Time: 3:38 PM
 */

namespace App\Services;


interface VerticalService
{
    public function getAllActiveVerticals();
    public function getAllVerticals();
    public function getVertical($id);
    public function getIsActive();
    public function addVertical($data);
    public function updateVertical($data,$id);
    public function getActiveVerticalById($id);
    public function verticalList();
    public function getVerticalBySolutionAndSolutionIn($id, $data);
    public function getVerticalsBySolution($id);
    public function getVerticalsBySolutionIn($id, $data);
    public function getScenarioDetailBySlug($slug); // Amit 12-06-18
    public function tagGenerator(); //Amit 13-06-18
}