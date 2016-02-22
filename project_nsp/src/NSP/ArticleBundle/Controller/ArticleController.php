<?php

namespace NSP\ArticleBundle\Controller;

# les objets qui seront utilisés
use NSP\ArticleBundle\Entity\Article;
use NSP\ArticleBundle\Entity\Photo;
use NSP\ArticleBundle\Entity\Commentaire;
use NSP\ArticleBundle\Entity\Rubrique;
use NSP\ArticleBundle\Entity\Theme;
use NSP\ArticleBundle\Entity\Utilisateur;
use NSP\ArticleBundle\Entity\UtilisateurArticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ArticleController extends Controller
{

	
	public function addAction(Request $request)
	{

	    return $this->render('NSPArticleBundle:Article:add.html.twig');
	}

	public function viewArticleAction($titreArticle) {

      $em = $this
        ->getDoctrine()
        ->getManager()
      ;

      // $article = $em
      // 	->getRepository('NSPArticleBundle:Article')
      // 	->find($titre)
      // ;

      $infosArticle = $em
        ->getRepository('NSPArticleBundle:Article')
        ->findByName($titreArticle)
      ;


      return $this->render('NSPArticleBundle:Article:article.html.twig', array(
        'infosArticle' => $infosArticle
      ));
	}


}