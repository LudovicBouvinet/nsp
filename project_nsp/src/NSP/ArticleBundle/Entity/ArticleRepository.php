<?php

namespace NSP\ArticleBundle\Entity;

use Doctrine\ORM\QueryBuilder;

/**
 * ArticleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ArticleRepository extends \Doctrine\ORM\EntityRepository
{

	public function findLastNews()
	{
	  $qb = $this->createQueryBuilder('a');

	  $qb->orderBy('a.id', 'DESC')
         ->where('a.publier = 1')
	  	 ->setMaxResults(8)
	  ;

	  return $qb
	    ->getQuery()
	    ->getResult()
	  ;
	}
    
    	public function findChoixRedac()
	{
	  $qb = $this->createQueryBuilder('a');

	  $qb->orderBy('a.id', 'DESC')
         ->where('a.choixRedaction = 1')
         ->andwhere('a.publier = 1')
	  	 ->setMaxResults(2)
	  ;

	  return $qb
	    ->getQuery()
	    ->getResult()
	  ;
	}
    
    
}
