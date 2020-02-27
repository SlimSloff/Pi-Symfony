<?php

namespace ArbiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use ArbiaBundle\Form\SeanceEleveType;
use ArbiaBundle\Entity\SeanceEleve;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class SeanceEleveController extends Controller
{
    public function AjouterAction(Request $request)
    {
        $se = new SeanceEleve();
        $form =$this->createForm(SeanceEleveType::class,$se);
        $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            
            
            $em->persist($se);
            $em->flush();
            
        }
        return $this->render('@Arbia/SeanceEleve/AjouterSeanceEleve.html.twig', array('form'=>$form->createView()));
    }

    public function afficheAction(){
        $em=$this->getDoctrine()->getManager();
        $se=$em->getRepository("ArbiaBundle:SeanceEleve")->findAll();
        return $this->render('@Arbia/SeanceEleve/AfficheSeanceEleve.html.twig', array('ses'=>$se));
    }

    public  function modifierAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $se=$em->getRepository(SeanceEleve::class)->find($id);
        $form=$this->createForm(SeanceEleveType::class,$se);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->persist($se);
            $em->flush();
            return $this->redirectToRoute('afficherSE');
        }
        return $this->render('@Arbia/SeanceEleve/modifierSeanceEleve.html.twig', array('form'=>$form->createView()));


    }
    public function supprimerAction($id){
        $em=$this->getDoctrine()->getManager();
        $se=$em->getRepository(SeanceEleve::class)->find($id);
        $em->remove($se);
        $em->flush();
        return $this->redirectToRoute('afficherSE');
    }

    public function JsonCalSEAction(){
        $data=array();
        $em=$this->getDoctrine()->getManager();
        $cal=$em->getRepository("ArbiaBundle:SeanceEleve")->findAll();
        
        foreach($cal as $row){
           
            $data[]=array(
                'id' => $row->getid(),
                'title' => $row->getClasse()."\n ".$row->getMatiere(),
                'start' => $row->getDateDebut()->format('Y-m-d H:m:s'),
                'end' => $row->getDateFin()->format('Y-m-d H:m:s')
                
            );
        }
        
        $response = new Response();
        
        $content = json_encode($data);
        $response->setContent($content);
        
        
        return $response;
    }
}
