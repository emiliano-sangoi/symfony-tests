<?php

namespace PermisosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PermisosBundle:Default:index.html.twig');
    }
}
