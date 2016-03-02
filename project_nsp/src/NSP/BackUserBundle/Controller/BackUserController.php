<?php

namespace NSP\BackUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use NSP\ArticleBundle\Entity\Article;
use NSP\ArticleBundle\Entity\Rubrique;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BackUserController extends Controller
{
    public function viewHomeBackUserAction()
    {
        return $this->render('NSPBackUserBundle:BackUser:index.html.twig');
    }
    
}
