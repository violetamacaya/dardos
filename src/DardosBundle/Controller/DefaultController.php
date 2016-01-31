<?php

namespace DardosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DardosBundle:Default:index.html.twig');
    }
}
