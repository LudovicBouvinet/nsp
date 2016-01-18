<?php

namespace NSP\ArticleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NSPArticleBundle:Default:index.html.twig', array('name' => $name));
    }
}
