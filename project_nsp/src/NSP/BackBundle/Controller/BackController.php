<?php

namespace NSP\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NSP\ArticleBundle\Entity\Article;
use NSP\ArticleBundle\Entity\Rubrique;
use NSP\ArticleBundle\Entity\UtilisateurArticle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class BackController extends Controller
{
    /**
    * @Security("has_role('ROLE_MODERATEUR')")
    */
    public function viewHomeBackAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        return $this->render('NSPBackBundle:Back:index.html.twig', array( 
            'user' => $user
        ));
    }

    /**
    * @Security("has_role('ROLE_MODERATEUR')")
    */
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

        $user = $this->get('security.context')->getToken()->getUser();

        return $this->render('NSPBackBundle:Back:moderation.html.twig', array( 
            'articles' => $articles,
            'commentaires' => $commentaires,
            'user' => $user
        ));
    }

    /**
    * @Security("has_role('ROLE_SUPER_ADMIN')")
    */
    public function viewAdministrationBackAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em
            ->getRepository('NSPArticleBundle:Article')
            ->findAllByDate()
        ;

        $users = $em
            ->getRepository('NSPArticleBundle:Utilisateur')
            ->findAll()
        ;

        $user = $this->get('security.context')->getToken()->getUser();

        return $this->render('NSPBackBundle:Back:administration.html.twig', array( 
            'articles' => $articles,
            'user' => $user,
            'users' => $users
        ));
    }

    /**
    * @Security("has_role('ROLE_MODERATEUR')")
    */
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

        $user = $this->get('security.context')->getToken()->getUser();

        $article->setPublier(true);
        $article->setModo($user);

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

    public function choixRedacAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $article = $em
            ->getRepository('NSPArticleBundle:Article')
            ->find($id)
        ;

        $article->setChoixRedaction(true);

        $em->persist($article);
        $em->flush();

        $articles = $em
            ->getRepository('NSPArticleBundle:Article')
            ->findAllByDate()
        ;

        $user = $this->get('security.context')->getToken()->getUser();

        return $this->redirect($this->generateUrl('nsp_back_moderation', array(
            'articles' => $articles,
            'user' => $user
        )));
    }

    /**
    * @Security("has_role('ROLE_SUPER_ADMIN')")
    */
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

        $ensembleNotes = $article->getUtilisateursNoteurs();

        foreach ($ensembleNotes as $key => $value) {

            $em->remove($ensembleNotes[$key]);
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

        $user = $this->get('security.context')->getToken()->getUser();

        return $this->redirect($this->generateUrl('nsp_back_administration', array(
            'articles' => $articles,
            'user' => $user
        )));
    }

    /**
    * @Security("has_role('ROLE_SUPER_ADMIN')")
    */
    public function supprimerUserAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $user = $em
            ->getRepository('NSPArticleBundle:Utilisateur')
            ->find($id)
        ;

        $nb = rand (0 , 1000);
        $user->setPassword(md5(''.$nb.''));
        $user->setUsername('Utilisateur supprimé');
        $em->persist($user);
        $em->flush();

        $articles = $em
            ->getRepository('NSPArticleBundle:Article')
            ->findAllByDate()
        ;

        $users = $em
            ->getRepository('NSPArticleBundle:Utilisateur')
            ->findAll()
        ;

        $user = $this->get('security.context')->getToken()->getUser();

        return $this->redirect($this->generateUrl('nsp_back_administration', array(
            'articles' => $articles,
            'users' => $users,
            'user' => $user
        )));
    }

    /**
    * @Security("has_role('ROLE_MODERATEUR')")
    */
    public function supprimerCommentaireAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $commentaire = $em
            ->getRepository('NSPArticleBundle:Commentaire')
            ->find($id)
        ;

        $commentaire->setTexte('Ce commentaire à été supprimé car il a été jugé trop abusif.');
        $em->persist($commentaire);
        $em->flush();


        $articles = $em
            ->getRepository('NSPArticleBundle:Article')
            ->findAllByDate()
        ;

        $commentaires = $em
            ->getRepository('NSPArticleBundle:Commentaire')
            ->findAllByDate()
        ;

        $user = $this->get('security.context')->getToken()->getUser();

        return $this->redirect($this->generateUrl('nsp_back_moderation', array(
            'articles' => $articles,
            'commentaires' => $commentaires,
            'user' => $user
        )));
    }
}
