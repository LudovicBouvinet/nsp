<?php

namespace NSP\BackUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


class BackUserController extends Controller
{   
    /**
    * @Security("has_role('ROLE_USER')")
    */
    public function profilAction()
    {
        return $this->render('NSPBackUserBundle:BackUser:profil.html.twig');
    }

    /**
    * @Security("has_role('ROLE_USER')")
    */
    public function messageAction()
    {
        return $this->render('NSPBackUserBundle:BackUser:message.html.twig');
    }

    /**
    * @Security("has_role('ROLE_USER')")
    */
    public function myArticleAction()
    {
        return $this->render('NSPBackUserBundle:BackUser:myArticle.html.twig');
    }
}
