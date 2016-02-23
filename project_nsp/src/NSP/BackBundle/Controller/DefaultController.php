<?php

namespace NSP\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NSPBackBundle:Default:index.html.twig', array('name' => $name));
    }
}
