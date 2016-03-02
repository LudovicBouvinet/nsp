<?php

namespace NSP\BackUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NSPBackUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
