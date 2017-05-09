<?php

namespace PresentationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('PresentationBundle:Default:index.html.twig');
    }
}
