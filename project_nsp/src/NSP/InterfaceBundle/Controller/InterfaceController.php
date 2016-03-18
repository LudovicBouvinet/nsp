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

    $user = $this->get('security.context')->getToken()->getUser();

     // On donne toutes les infos nécessaires à la vue
      return $this->render('NSPInterfaceBundle:Interface:index.html.twig', array(
        'listArticles' => $listArticles,
        'listChoix' => $listChoix,
        'user' => $user
    ));

    }


    public function viewRubriqueAction($rubrique){

      if ($rubrique == "BonPlan") {
        $rubrique = "Bon Plan";
      }

      if ($rubrique == "LifeStyle") {
        $rubrique = "Life Style";
      }

      $em = $this
        ->getDoctrine()
        ->getManager()
      ;

      // On récupère les infos de la bonne rubrique
      $infosRubrique = $em
        ->getRepository('NSPArticleBundle:Rubrique')
        ->findByName($rubrique)
      ;

      $user = $this->get('security.context')->getToken()->getUser();

      return $this->render('NSPInterfaceBundle:Interface:rubrique.html.twig', array(
        'infosRubrique' => $infosRubrique,
        'user' => $user
      ));

    }

    public function contactAction(){

      return $this->render('NSPInterfaceBundle:Interface:contact.html.twig');

    }



}