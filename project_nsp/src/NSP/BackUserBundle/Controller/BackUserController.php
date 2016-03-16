<?php

namespace NSP\BackUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use NSP\BackUserBundle\Form\MessageType;
use NSP\ArticleBundle\Entity\Message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class BackUserController extends Controller
{   
    /**
    * @Security("has_role('ROLE_USER')")
    */
    public function profilAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();

        return $this->render('NSPBackUserBundle:BackUser:profil.html.twig', array(
          'user' => $user
        ));
    }

    /**
    * @Security("has_role('ROLE_USER')")
    */
    public function messageAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $messages = $user->getMessagesRecus();

        return $this->render('NSPBackUserBundle:BackUser:message.html.twig', array(
          'user' => $user,
          'messages' => $messages
        ));
    }

    /**
    * @Security("has_role('ROLE_USER')")
    */
    public function writeMessageAction(Request $request)
    {
        $em = $this->getDoctrine()-> getManager();

        $user = $this->get('security.context')->getToken()->getUser();
        $messages = $user->getMessagesRecus();

        $formMessage = $this->createForm(new MessageType());
        $formMessage -> handleRequest($request);

        if ($formMessage->isSubmitted() && $formMessage->isValid()) {

            $message = new Message();
            $message->setEmetteur($user);

            $infos = $formMessage->getData();
            $destinataireUsername = $infos->getDestinataireName();
            $corps = $infos->getCorps();
            $objet = $infos->getObjet();

            $destinataire = $em
                ->getRepository('NSP\ArticleBundle\Entity\Utilisateur')
                ->findByUserName($destinataireUsername)
            ;

            if ($destinataire == null ) {
                throw new NotFoundHttpException('Le destinataire que vous recherchez n\'existe pas');
            }

            $message->setDestinataire($destinataire[0]);
            $message->setCorps($corps);
            $message->setObjet($objet);

            $em->persist($message);
            $em->flush();
      }

        return $this->render('NSPBackUserBundle:BackUser:message.html.twig', array(
          'user' => $user,
          'formMessage' => $formMessage->createView(),
          'messages' => $messages
        ));
    }

    /**
    * @Security("has_role('ROLE_USER')")
    */
    public function supMessageAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $message = $em
            ->getRepository('NSPArticleBundle:Message')
            ->find($id)
        ;
        
        $em->remove($message);
        $em->flush();

        $user = $this->get('security.context')->getToken()->getUser();
        $messages = $user->getMessagesRecus();


        return $this->redirect($this->generateUrl('nsp_back_user_message', array(
          'user' => $user,
          'messages' => $messages
        )));
    }

    /**
    * @Security("has_role('ROLE_USER')")
    */
    public function myArticleAction()
    {
        $user = $this->get('security.context')->getToken()->getUser();
        $articles = $user->getArticlesEcrits();

        return $this->render('NSPBackUserBundle:BackUser:myArticle.html.twig', array(
          'user' => $user,
          'articles' => $articles
        ));
    }
}
