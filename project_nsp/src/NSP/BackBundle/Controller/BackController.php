<?php

namespace NSP\BackBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackController extends Controller
{
    public function viewHomeBackAction()
    {
        return $this->render('NSPBackBundle:Back:index.html.twig');
    }

    public function viewModerationBackAction()
    {
        return $this->render('NSPBackBundle:Back:moderation.html.twig');
    }

    public function viewAdministrationBackAction()
    {
        return $this->render('NSPBackBundle:Back:administration.html.twig');
    }

    public function viewStatistiquesBackAction()
    {
        return $this->render('NSPBackBundle:Back:statistiques.html.twig');
    }
}
