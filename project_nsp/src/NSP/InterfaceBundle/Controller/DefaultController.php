<?php

namespace NSP\InterfaceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('NSPInterfaceBundle:Default:index.html.twig', array('name' => $name));
    }
}
