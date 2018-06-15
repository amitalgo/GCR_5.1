<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 14/02/2018
 * Time: 3:04 PM
 */

namespace App\Services;


interface TagService
{
    public function tagList();
    public function getActiveTags();
    public function tagAdd($data);
    public function updateTag($data, $id);
    public function checkTags($tags);
    public function getTag($id);
    public static function getSolutionTags();
    public function getAllSolutionTags();
    public function getParentTags();
    public function getSolutonTagsById($solutionId);
    public function getTagIdBySlug($slug); ////Amit 12-06-2018
    public function tagGenerator($data,$id); //Amit 13-06-2018
}