<?php

namespace NSP\BackUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackUserController extends Controller
{
    public function profilAction()
    {
        return $this->render('NSPBackUserBundle:BackUser:profil.html.twig');
    }

    public function messageAction()
    {
        return $this->render('NSPBackUserBundle:BackUser:message.html.twig');
    }

    public function myArticleAction()
    {
        return $this->render('NSPBackUserBundle:BackUser:myArticle.html.twig');
    }
}
