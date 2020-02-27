<?php

namespace EcoleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('EcoleBundle:Default:index.html.twig');
    }
    /**
     * @Route("/abonnement")
     */
    public function abonnementAction()
    {
        return $this->render('EcoleBundle:Default:abonnement.html.twig');
    }


}
