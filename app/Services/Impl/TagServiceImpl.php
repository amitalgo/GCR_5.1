<?php
/**
 * Created by PhpStorm.
 * User: Android
 * Date: 14/02/2018
 * Time: 3:05 PM
 */

namespace App\Services\Impl;
use App\Services\TagService;
use App\Repositories\TagRepo;
use App\Entities\Tag;
use App\Entities\TagCategory;
use App\Services\ProductTypeService;
use App\Services\SolutionTypeService;
use App\Services\IndustryService;
use Doctrine\Common\Collections\ArrayCollection;

class TagServiceImpl implements TagService
{
    protected  static $tagRepo;
    protected  $ind;
    protected  $pt;
    protected  $st;
    public function __construct(TagRepo $tagRepo,IndustryService $ind,SolutionTypeService $st,ProductTypeService $pt)
    {
        self::$tagRepo = $tagRepo;
        $this->ind = $ind;
        $this->st = $st;
        $this->pt =$pt;
    }

    public function tagList()
    {
        return self::$tagRepo->tagList();
    }

    public function getActiveTags(){
        $tagColl = new ArrayCollection();
        $tags = self::$tagRepo->findActiveTags();
        foreach ($tags as $tag) {
            if(!$tagColl->contains($tag) && $tag->getChildren()->isEmpty()){
                $tagColl->add($tag);
            }
        }
        return $tagColl;
    }

    public function tagAdd($data)
    {
        $tag = new Tag();
        $tag->setTagName($data['title']);
        if(isset($data['parent-tag']) && $data['parent-tag']!=""){
            $tag->setParent(self::$tagRepo->findTag($data['parent-tag']));
        }
        $tag->setIsActive(1);
        $tag->setCreatedAt(new \DateTime());
        $tag->setUpdatedAt(new \DateTime());
        $tag->setDeleted(0);
        return self::$tagRepo->tagAdd($tag);
    }


//    /**
//     * Sync up the list of tags in the database. Add Tag if not exist.
//     */
    public function checkTags($tags)
    {
        //     $tag  = explode(',',$tags);
        //     $currentListTag = $this->tagRepo->tagList();
        //     $currentListST = $this->st->STList();
        //     $currentListIND = $this->ind->INDList();
        //     $currentListPT = $this->pt->PTList();

        //     $currentListArray=[];
        //     foreach ($currentListTag as $tagsArray){
        //         $currentListArray[] = $tagsArray->getTagName();
        //     }
        //     foreach ($currentListIND as $tagsArrayInd){
        //         $currentListArray[] = $tagsArrayInd->getIndustryName();
        //     }
        //     foreach ($currentListST as $tagsArraySt){
        //         $currentListArray[] = $tagsArraySt->getName();
        //     }
        //     foreach ($currentListPT as $tagsArrayPt){
        //         $currentListArray[] = $tagsArrayPt->getName();
        //     }
        //     $newTags = array_diff($tag, $currentListArray);
        //     foreach ($newTags as $newTag)
        //     {
        //         $this->tagAdd($newTag);
        //     }
        // return true;
    }

    public function getTag($id){
        return self::$tagRepo->findTag($id);
    }

    public function updateTag($data, $id){

        $tag = self::$tagRepo->findTag($id);
        $tag->setTagName($data['title']);
        if(isset($data['parent-tag']) && $data['parent-tag']!=""){
            $tag->setParent(self::$tagRepo->findTag($data['parent-tag']));
        }else{
            $tag->setParent(NULL);
        }

        if(isset($data['tagSlug']) && $data['tagSlug']!=""){
            $tag->setUrlSlug($data['tagSlug']);
        }else{
            $tag->setUrlSlug(NULL);
        }

        $tag->setIsActive($data['active']);
        $tag->setUpdatedAt(new \DateTime());
        $tag->setDeleted(0);
        return self::$tagRepo->tagAdd($tag);
    }

    public static function getSolutionTags(){
        // $_this = new self;
//        $solutionTags =self::$tagRepo->findSolutionTags();
        $solutionTags = self::$tagRepo->findProductTags();
        $tagsList = new ArrayCollection();
        foreach ($solutionTags as $solutionTag) {
            $tag = $solutionTag->getTagId();
            while(null!=$tag->getParent()){
                $tag = $tag->getParent();
            }
            if(!$tagsList->contains($tag)){
                $tagsList->add($tag);
            }
        }
        //sort ascending order with tagname.
        $iterator = $tagsList->getIterator();
        $iterator->uasort(function ($a, $b) {
            return ($a->getTagName() < $b->getTagName()) ? -1 : 1;
        });
        $collection = new ArrayCollection(iterator_to_array($iterator));
        //dd($collection);
        return $collection;
    }

    public function getAllSolutionTags(){
        $solutionTagsColl = new ArrayCollection();
        $solutionTags =self::$tagRepo->findSolutionTags();
        foreach ($solutionTags as $solutionTag) {
            if(!$solutionTagsColl->contains($solutionTag->getTagId())){
                $solutionTagsColl->add($solutionTag->getTagId());
            }
        }
        return $solutionTagsColl;
    }   

    public function getSolutonTagsById($solutionId){
        $solutionTagsColl = new ArrayCollection();
        $solutionTags =self::$tagRepo->findSolutionTagsById($solutionId);
        foreach ($solutionTags as $solutionTag) {
            if(!$solutionTagsColl->contains($solutionTag->getTagId())){
                $solutionTagsColl->add($solutionTag->getTagId());
            }
        }
        return $solutionTagsColl;
    }

    public function getParentTags(){
        return self::$tagRepo->findParentTags();
    }

    //Amit 12-06-2018
    public function getTagIdBySlug($slug){
        return self::$tagRepo->findTagIdBySlug($slug);
    }

    //Amit 13-06-2018
    public function tagGenerator($data,$id){
        $tag = self::$tagRepo->findTag($id);

        if(isset($data['tagSlug']) && $data['tagSlug']!=""){
            $tag->setUrlSlug($data['tagSlug']);
        }else{
            $tag->setUrlSlug(NULL);
        }
        $tag->setUpdatedAt(new \DateTime());
        return self::$tagRepo->tagAdd($tag);
    }
}
