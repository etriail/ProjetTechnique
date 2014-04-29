<?php

namespace ProjetK\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjetKUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
