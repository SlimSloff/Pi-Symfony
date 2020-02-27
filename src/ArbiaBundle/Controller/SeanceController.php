<?php

namespace ArbiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ArbiaBundle\Form\SeanceType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SeanceController extends Controller
{
    public function AfficheCalAction(){
        
        //return $this->render('@Arbia/seance/AfficheCal.html.twig');
        return $this->render('@Arbia/seance/AfficheCalfront.html.twig');
    }

    public function JsonCalAction(){
        $data=array();
        $em=$this->getDoctrine()->getManager();
        $cal=$em->getRepository("ArbiaBundle:Seance")->findAll();
        
        foreach($cal as $row){
           
            $data[]=array(
                'id' => $row->getid(),
                'title' => $row->getsalle(),
                'start' => $row->getdateDebut()->format('Y-m-d H:m:s'),
                'end' => $row->getdateFin()->format('Y-m-d H:m:s')
                
            );
        }
        
        $response = new Response();
        
        $content = json_encode($data);
        $response->setContent($content);
        
        
        return $response;
        //return $this->render('@Arbia/seance/AfficheCal.html.twig', array('cals'=>$data));
    }
}
