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
use NSP\ArticleBundle\Form\ArticleType;
use NSP\ArticleBundle\Form\PhotoType;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ArticleController extends Controller
{


  public function addNewArticleAction(Request $request)
  {

    $em = $this ->getDoctrine() -> getManager();
    
    $article = new Article();
    $article->setChapeau('hat');
    $article->setTitre('n/a');
    $article->setTexteFirst('n/a');
    $article->setTexteSecond('n/a');

    $em->persist($article);
    $em->flush();

    $photo = [];

    for ($i=0; $i < 6; $i++) {
      $photo[$i] = new Photo();
      $photo[$i]->setArticle($article);
      $photo[$i]->setFichier('hat');
      $photo[$i]->setFormat('n/a');

      $em->persist($photo[$i]);
    }

    $em->flush();

    return $this->redirect($this->generateUrl('nsp_article_addChampsArticle', array(
      'id' => $article->getId(), 
      'photo1' => $photo[0]->getId(),
      'photo2' => $photo[1]->getId(),
      'photo3' => $photo[2]->getId(), 
      'photo4' => $photo[3]->getId(), 
      'photo5' => $photo[4]->getId(), 
      'photo6' => $photo[5]->getId() 
    )));

  }

	public function addChampsArticleAction(Request $request, $id, $photo1, $photo2, $photo3, $photo4, $photo5, $photo6)
	{

    $em = $this->getDoctrine()-> getManager();

    $article = $em
        ->getRepository('NSP\ArticleBundle\Entity\Article') # ecriture 1 pour entity
        ->find($id)
    ;

    $formArticle = $this->createForm(new ArticleType(),$article);
    $formArticle -> handleRequest($request);

    $formPhoto = $this->createForm(new PhotoType());
    $formPhoto->handleRequest($request);


    if ($formArticle->isSubmitted() && $formArticle->isValid()) {

        $em->persist($article);
        $em->flush();
    }

    if ($formPhoto->isSubmitted() && $formPhoto->isValid()) {

        $infos = $formPhoto->getData();

        $em
          ->getRepository('NSP\ArticleBundle\Entity\Photo')
          ->update($infos)
        ;

    }
         
      return $this->render('NSPArticleBundle:Article:add.html.twig', array(
      'formArticle' => $formArticle->createView(),
      'formPhoto' => $formPhoto->createView()
    ));

	}




	public function viewArticleAction($titreArticle) {

      $em = $this
        ->getDoctrine()
        ->getManager()
      ;

      $infosArticle = $em
        ->getRepository('NSPArticleBundle:Article')
        ->findByName($titreArticle)
      ;

      return $this->render('NSPArticleBundle:Article:article.html.twig', array(
        'infosArticle' => $infosArticle
      ));
	}


}