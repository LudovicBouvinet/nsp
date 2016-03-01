<?php

namespace NSP\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NSP\ArticleBundle\Entity\Article;
use NSP\ArticleBundle\Entity\Rubrique;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BackController extends Controller
{
    public function viewHomeBackAction()
    {
        return $this->render('NSPBackBundle:Back:index.html.twig');
    }

    public function viewModerationBackAction()
    {

        $em = $this->getDoctrine()->getManager();

        $articles = $em
            ->getRepository('NSPArticleBundle:Article')
            ->findAllByDate()
        ;

        $commentaires = $em
            ->getRepository('NSPArticleBundle:Commentaire')
            ->findAllByDate()
        ;

        return $this->render('NSPBackBundle:Back:moderation.html.twig', array( 
            'articles' => $articles,
            'commentaires' => $commentaires
        ));
    }

    public function viewAdministrationBackAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em
            ->getRepository('NSPArticleBundle:Article')
            ->findAllByDate()
        ;

        return $this->render('NSPBackBundle:Back:administration.html.twig', array( 
            'articles' => $articles
        ));
    }

    public function viewStatistiquesBackAction()
    {
        return $this->render('NSPBackBundle:Back:statistiques.html.twig');
    }

    public function publierAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $article = $em
            ->getRepository('NSPArticleBundle:Article')
            ->find($id)
        ;

        $article->setPublier(true);

        $em->persist($article);
        $em->flush();


        $articles = $em
            ->getRepository('NSPArticleBundle:Article')
            ->findAllByDate()
        ;

        return $this->redirect($this->generateUrl('nsp_back_moderation', array(
            'articles' => $articles
        )));
    }

    public function supprimerArticleAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $article = $em
            ->getRepository('NSPArticleBundle:Article')
            ->find($id)
        ;

        $ensembleCommentaires = $article->getCommentaires();

        foreach ($ensembleCommentaires as $key => $value) {

            $em->remove($ensembleCommentaires[$key]);
            $em->flush();
        }


        $ensemblePhotos = $article->getPhotos();

        foreach ($ensemblePhotos as $key => $value) {

            $em->remove($ensemblePhotos[$key]);
            $em->flush();

            if ($key == 5) {
                $em->remove($article);
                $em->flush();
            }
        }


        $articles = $em
            ->getRepository('NSPArticleBundle:Article')
            ->findAllByDate()
        ;

        return $this->redirect($this->generateUrl('nsp_back_administration', array(
            'articles' => $articles
        )));
    }

    public function supprimerCommentaireAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $commentaire = $em
            ->getRepository('NSPArticleBundle:Commentaire')
            ->find($id)
        ;

        $em->remove($commentaire);
        $em->flush();


        $articles = $em
            ->getRepository('NSPArticleBundle:Article')
            ->findAllByDate()
        ;

        $commentaires = $em
            ->getRepository('NSPArticleBundle:Commentaire')
            ->findAllByDate()
        ;

        return $this->redirect($this->generateUrl('nsp_back_moderation', array(
            'articles' => $articles,
            'commentaires' => $commentaires
        )));
    }
}
