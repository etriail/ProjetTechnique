<?php

namespace ProjetK\PretBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ProjetKPretBundle:Default:index.html.twig', array('name' => $name));
    }
}
