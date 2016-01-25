<?php

namespace NSP\InterfaceBundle\Controller;

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

class InterfaceController extends Controller
{

	 public function indexAction(){

	 	$em = $this
        ->getDoctrine()
        ->getManager()
    ;

    $listArticles = $em
        ->getRepository('NSPArticleBundle:Article')
        ->findLastNews()
    ;
        

    
    $listChoix = $em
        ->getRepository('NSPArticleBundle:Article')
        ->findChoixRedac()
    ;

	 // On donne toutes les infos nécessaires à la vue
      return $this->render('NSPInterfaceBundle:Interface:index.html.twig', array(
      'listArticles' => $listArticles,
        'listChoix' => $listChoix
    ));

    }

}