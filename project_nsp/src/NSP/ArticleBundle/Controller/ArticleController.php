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
use NSP\ArticleBundle\Form\CommentaireType;
use NSP\ArticleBundle\Form\NoteType;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ArticleController extends Controller
{

  /**
  * @Security("has_role('ROLE_USER')")
  */
  public function addNewArticleAction()
  {

    $em = $this ->getDoctrine() -> getManager();

    $theme = $em
      ->getRepository('NSPArticleBundle:Theme')
      ->find(1)
    ;
    
    $user = $this->get('security.context')->getToken()->getUser();

    $article = new Article();
    $article->setChapeau('hat');
    $article->setTitre('n/a');
    $article->setTexteFirst('n/a');
    $article->setTexteSecond('n/a');
    $article->setTheme($theme);
    $article->setUtilisateur($user);



    
    $em->persist($article);
    $em->flush();

    $photo = [];

    for ($i=0; $i < 6; $i++) {
      $photo[$i] = new Photo();
      $photo[$i]->setArticle($article);
      $photo[$i]->setFichier('n/a');
      $photo[$i]->setFormat('n/a');

      $em->persist($photo[$i]);
    }

    $em->flush();

    return $this->redirect($this->generateUrl('nsp_article_add_champs_article', array(
      'id' => $article->getId()
    )));

  }

  /**
  * @Security("has_role('ROLE_USER')")
  */
	public function addChampsArticleAction(Request $request, $id)
	{

    $em = $this->getDoctrine()-> getManager();

    $article = $em
        ->getRepository('NSP\ArticleBundle\Entity\Article')
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
        
        $id = $infos->getId();
        $file = $infos->getFile();
        $format = $file->getClientOriginalExtension();

        $ensemblePhotos = $article->getPhotos();

        foreach ($ensemblePhotos as $key => $value) {

          if ($ensemblePhotos[$key]->getId() == $id ){

            $ensemblePhotos[$key]->setFile($file);
            $ensemblePhotos[$key]->setFormat($format);
            $ensemblePhotos[$key]->setFichier($id);
            $ensemblePhotos[$key]->upload();

          }

          $em->persist($ensemblePhotos[$key]);
          $em->flush($ensemblePhotos[$key]);
          
        }

    }
         
      return $this->render('NSPArticleBundle:Article:add.html.twig', array(
      'formArticle' => $formArticle->createView(),
      'formPhoto' => $formPhoto->createView(),
      'article' => $article
    ));

	}




	public function viewArticleAction(Request $request, $id) {

      $em = $this
        ->getDoctrine()
        ->getManager()
      ;

      $article = $em
        ->getRepository('NSPArticleBundle:Article')
        ->find($id)
      ;

      $commentaires = $em
        ->getRepository('NSPArticleBundle:Commentaire')
        ->findComments($article)
      ;
        
        $notes = $em
        ->getRepository('NSPArticleBundle:UtilisateurArticle')
        ->findNotes($article)
      ;
        
         $moyenne = $em 
        ->getRepository('NSPArticleBundle:UtilisateurArticle')
        -> findNote($article);

      $commentaireForm = $this->createForm(new CommentaireType());
      $commentaireForm->handleRequest($request);

      if ($commentaireForm->isSubmitted() && $commentaireForm->isValid()) {

          $commentaire = new Commentaire();

          $infos = $commentaireForm->getData();
          $texte = $infos->getTexte();
          $user = $this->get('security.context')->getToken()->getUser();

          $commentaire->setTexte($texte);
          $commentaire->setArticle($article);
          $commentaire->setUtilisateur($user);


          $em->persist($commentaire);
          $em->flush();
      }
        
                
      $noteForm = $this->createForm(new NoteType());
      $noteForm->handleRequest($request);

      if ($noteForm->isSubmitted() && $noteForm->isValid()) {

          $utilisateur = new UtilisateurArticle();

          $infos = $noteForm->getData();
          $note = $infos->getNote();
          $user = $this->get('security.context')->getToken()->getUser();

          $utilisateur->setNote($note);
          $utilisateur->setArticle($article);
          $utilisateur->setUtilisateur($user);

          $em->persist($utilisateur);
          $em->flush();
      }

      return $this->render('NSPArticleBundle:Article:article.html.twig', array(
        'article' => $article,
        'commentaireForm' => $commentaireForm->createView(),
        'commentaires' => $commentaires,
        'noteForm' => $noteForm->createView(),
        'notes' => $notes,
        'moyenne' => $moyenne  
      ));            

	}
}