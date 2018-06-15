<?php
namespace App\Repositories;
use App\Entities\Tag;
use App\Entities\TagCategory;
use App\Entities\TagProduct;
use Doctrine\ORM\EntityManager;

class TagRepo
{
	private $em;
	public function __construct(EntityManager $em){
		$this->em = $em;
	}

	public function tagList(){
		return $this->em->getRepository(Tag::class)->findAll();
	}

	public function findActiveTags(){
		return $this->em->getRepository(Tag::class)->findBy(array('isActive'=>1));	
	}

	public function tagAdd($data){
		$this->em->persist($data);
		$this->em->flush();
		return true;
	}

	public function findTag($id){
		return $this->em->getRepository(Tag::class)->find($id);		
	}
	
	public function findSolutionTags(){
		return $this->em->getRepository(TagCategory::class)->createQueryBuilder('solution')
                    ->select('DISTINCT solutiontags')
                    ->from('App\Entities\TagCategory', 'solutiontags')
                    ->getQuery()
                    ->getResult();
	}

	public function findSolutionTagsById($solutionId){
		return $this->em->getRepository(TagCategory::class)->createQueryBuilder('solution')
                    ->select('DISTINCT solutiontags')
                    ->from('App\Entities\TagCategory', 'solutiontags')
                    ->join('solutiontags.scenarioId', 'scenariodetails')
                    ->where('scenariodetails.titleId = :titleId')
                    ->setParameter('titleId',$solutionId)
                    ->getQuery()
                    ->getResult();
	}

	public function findProductTags(){
		return $this->em->getRepository(TagProduct::class)->createQueryBuilder('product')
                    ->select('DISTINCT producttags')
                    ->from('App\Entities\TagProduct', 'producttags')
                    ->getQuery()
                    ->getResult();
	}
	public function findRelatedProductTags($id){
	    $tags=[];
	    $parentId = $this->em->getRepository(Tag::class)->find($id);
	    if(null!=$parentId->getParent()) {
		    foreach ($parentId->getParent()->getChildren() as $parent){
		        $tags[] = $parent->getId();
	        }
    	}
        return $this->em->getRepository(TagProduct::class)->createQueryBuilder('product')
            ->select('DISTINCT producttags')
            ->from('App\Entities\TagProduct', 'producttags')
            ->where('producttags.tagId IN (:tags)')->setParameter('tags',$tags)
            ->getQuery()
            ->getResult();
        
    }
	public function findProductTagsById($scenarioId){
		return $this->em->getRepository(TagProduct::class)->createQueryBuilder('product')
                    ->select('DISTINCT producttags')
                    ->from('App\Entities\TagProduct', 'producttags')
                    ->join('producttags.productId', 'products')
                    ->join('products.productScenarioId', 'scenarioproduct')
                    ->where('scenarioproduct.scenarioId = :scenarioId')
                    ->setParameter('scenarioId', $scenarioId)
                    ->getQuery()
                    ->getResult();
	}

	public function findParentTags(){
		return $this->em->getRepository(Tag::class)->findBy(['parent'=>NULL]);
	}

    //Amit 12-06-2018
	public function findTagIdBySlug($slug){
        return $this->em->getRepository(Tag::class)->findOneBy(array('urlSlug'=>$slug));
    }
}
?>