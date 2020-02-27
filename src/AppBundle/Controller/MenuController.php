<?php


namespace AppBundle\Controller;
use Composer\CaBundle\CaBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class MenuController extends Controller
{

    /**
     * @Route("/admin",name="admin_page")
     */
    public function indexAction()
    {

        
        return $this->render('dashboardbase.html.twig');

    }
/**
     * @Route("/eleve",name="eleve_page")
     */
    public function eleveAction()
    {

        
        return $this->render('elevemenu.html.twig');

    }

/**
     * @Route("/rulecontrolredirection",name="rule_page")
     */
    public function rulesAction()
    {

       // if (($this->container->get('security.context')->isGranted('ROLE_ADMIN')))
       $check = $this->container->get('security.authorization_checker');
      if (($check->isGranted('ROLE_ADMIN')))
        {
            return $this->render('dashboardbase.html.twig');
        }
        return $this->render('elevemenu.html.twig');

    }
}