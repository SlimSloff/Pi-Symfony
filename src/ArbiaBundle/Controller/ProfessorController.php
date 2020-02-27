<?php

namespace ArbiaBundle\Controller;
use ArbiaBundle\Entity\Examen;
use ArbiaBundle\Entity\Professor;
use ArbiaBundle\Entity\Seance;
use ArbiaBundle\Form\ExamenType;
use ArbiaBundle\Form\ProfessorType;
use ArbiaBundle\Form\SeanceType;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProfessorController extends Controller
{
    public function AjouterAction(Request $request)
    {
        $professor = new Professor();
        $form =$this->createForm(ProfessorType::class,$professor);
        $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $professor->uploadProfilePicture();
            $em->persist($professor);
            $em->flush();
        
        }
        return $this->render('@Arbia/professor/AjouterProf.html.twig', array('form'=>$form->createView()));
    }

    public function afficheAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $professor=$em->getRepository("ArbiaBundle:Professor")->findAll();
      //  $paginator = $this->get('knp_paginator');
      //  $pagination = $paginator->paginate(  $professor, /* query NOT result */
      //  $request->query->getInt('page', 1)/*page number*/,
      //  2/*limit per page*/

        return $this->render('@Arbia/professor/AffichePro.html.twig', array('profs'=>$professor));
    }

    public  function updateAction(Request $request,$id){
        $em=$this->getDoctrine()->getManager();
        $professor=$em->getRepository(Professor::class)->find($id);
        $form=$this->createForm(ProfessorType::class,$professor);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $em->persist($professor);
            $em->flush();
            return $this->redirectToRoute('affiche_prof');
        }
        return $this->render('@Arbia/professor/updateprof.html.twig', array('form'=>$form->createView()));


    }

    public function supprimerAction($id){
        $em=$this->getDoctrine()->getManager();
        $professor=$em->getRepository(Professor::class)->find($id);
        $em->remove($professor);
        $em->flush();
        return $this->redirectToRoute('affiche_prof');
    }


    public function professorDetailsAction(Professor $professor,Request $request){

        $em=$this->getDoctrine()->getManager();
        $seance=new Seance();
        $con=$request->get('id');
        $professor=$em->getRepository(Professor::class)->find($con);
        $form =$this->createForm(SeanceType::class,$seance);
        $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            //$category->uploadProfilePicture();
            $seance->setProfessor($professor);
            $em->persist($seance);
            $em->flush();
            //return $this->redirectToRoute('gf_affiche');
        }

        $seances=$em->getRepository(Seance::class)->findAll();


        return $this->render('@Arbia/professor/professordetail.html.twig', [


            'professor'=>$professor,'form'=>$form->createView(),'seances'=>$seances
        ]);
    }

    public function exportAction(){
        $em=  $this->getDoctrine()->getManager();
        $professors=$em->getRepository("ArbiaBundle:Professor")->findAll();
        $writer = $this->container->get('egyg33k.csv.writer');
        $csv = $writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['id', 'nom']);

        foreach ($professors as $professor){
            $csv->insertOne([$professor->getId(), $professor->getNom()]);
        }
        $csv->output('professors.csv');

        die('export');
    }
    
    public function supprimerSeanceAction($id,Request $request){
        $em=$this->getDoctrine()->getManager();
        $con=$request->get('id');
        $professor=$em->getRepository(Professor::class)->find($con);
        $seance=$em->getRepository(Seance::class)->find($id);
        $seance->setProfessor($professor);

        $em->remove($seance);
        $em->flush();
        return $this->redirectToRoute('affiche_prof');
    }

    public function AjouterExamenAction(Request $request)
    {
        $examen = new Examen();
        $form =$this->createForm(ExamenType::class,$examen);
        $form->handleRequest($request);
        if($form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($examen);
            $em->flush();

        }
        return $this->render('@Arbia/professor/AjouterExamen.html.twig', array('form'=>$form->createView()));
    }

    public function afficheExamenAction(){
        $em=$this->getDoctrine()->getManager();
        $examen=$em->getRepository("ArbiaBundle:Examen")->findAll();
        return $this->render('@Arbia/professor/AfficheExamen.html.twig', array('examens'=>$examen));
    }

    public function supprimerExamenAction($id){
        $em=$this->getDoctrine()->getManager();
        $examen=$em->getRepository(Examen::class)->find($id);
        $em->remove($examen);
        $em->flush();
        return $this->redirectToRoute('affiche_examen');
    }

    public function findiAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        if ($request->isMethod("post")){
            $nom=$request->get('nom');
            $professor=$em->getRepository("ArbiaBundle:Professor")->findid($nom);
            return $this->render("ArbiaBundle:professor:RechPat.html.twig",array("professor"=>$professor));
        }
        else{
            return new Response("xxx");
        }

    }
}
