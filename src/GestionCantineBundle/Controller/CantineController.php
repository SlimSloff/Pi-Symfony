<?php


namespace GestionCantineBundle\Controller;


use Composer\CaBundle\CaBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
class CantineController extends Controller
{
    /**
     * @Route("/admin/cantine",name="liste_cantine_admin")
     */
public function indexAction()
{

 $cantines = $this->getDoctrine()
                ->getRepository('GestionCantineBundle:Cantine')
                ->findAll();
        
        return $this->render('admin\gestioncantine\ListeCantine.html.twig', array(
            'cantines' => $cantines
        ));

}


    /**
     * @Route("/admin/cantine/create", name="ajouter_cantine_admin")
     */
    public function createAction(Request $request)
    {
        $cantine = new \GestionCantineBundle\Entity\Cantine();
        $atrributes = array('class' => 'form-control', 'style' => 'margin-bottom:15px');
        $choices = array('matin' => 'matin', 'midi' => 'midi');
        //$choicesjour = array('landi' => 'landi', 'mardi' => 'mardi', 'mercredi' => 'mercredi', 'jeudi' => 'jeudi', 'vendredi' => 'vendredi', 'samedi' => 'samedi');
        $choicesjour = array('lundi' => '1', 'mardi' => '2', 'mercredi' => '3', 'jeudi' => '4', 'vendredi' => '5', 'samedi' => '6');
        $form = $this->createFormBuilder($cantine)
            ->add('descriptioncantine', TextType::class, array('attr' => $atrributes))
            ->add('jourcantine', ChoiceType::class, array('choices' => $choicesjour, 'attr' => $atrributes))
            ->add('sceance', ChoiceType::class, array('choices' => $choices, 'attr' => $atrributes))
            ->add('save', SubmitType::class, array('label' => 'ajouter cartine', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $verifcantine = $this->getDoctrine()
                ->getRepository('GestionCantineBundle:Cantine')
                ->findBy(array('jourcantine' => $form['jourcantine']->getData(),'sceance' => $form['sceance']->getData()));
                if (empty($verifcantine)) {
 $cantine->setDescriptioncantine($form['descriptioncantine']->getData());
            $cantine->setJourcantine($form['jourcantine']->getData());
            $cantine->setSceance($form['sceance']->getData());

            $em = $this->getDoctrine()->getManager();
            $em->persist($cantine);
            $em->flush();

            $this->addFlash('notice', 'cantine ajouter');

            return $this->redirectToRoute('liste_cantine_admin');
            }else{
                 $this->addFlash('error', 'cantine existe avec la meme jour et sceance  '); 
            }
           
        }

        return $this->render('admin\gestioncantine\ajoutercantine.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/admin/cantine/delete/{id}", name="supprimer_cantine_admin")
     */
    public function deleteAction($id)
    {
        $cantine = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Cantine')
            ->find($id);

        if (empty($cantine)) {
            $this->addFlash('error', 'cantine non trouvé');

            return $this->redirectToRoute('supprimer_cantine_admin');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($cantine);
        $em->flush();

        $this->addFlash('notice', 'cantine supprimer');

        return $this->redirectToRoute('liste_cantine_admin');
    }

    /**
     * @Route("/admin/cantine/update/{id}", name="modifier_cantine_admin")
     */
    public function updateAction($id,Request $request)
    {
        $cantine = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Cantine')
            ->find($id);
        if (empty($cantine)) {
            $this->addFlash('error', 'cantine non trouvé');

            return $this->redirectToRoute('liste_cantine_admin');
        }
        $atrributes = array('class' => 'form-control', 'style' => 'margin-bottom:15px');
        $choices = array('matin' => 'matin', 'midi' => 'midi');
       // $choicesjour = array('lundi' => 'lundi', 'mardi' => 'mardi', 'mercredi' => 'mercredi', 'jeudi' => 'jeudi', 'vendredi' => 'vendredi', 'samedi' => 'samedi');
        $choicesjour = array('lundi' => '1', 'mardi' => '2', 'mercredi' => '3', 'jeudi' => '4', 'vendredi' => '5', 'samedi' => '6');
        $form = $this->createFormBuilder($cantine)
            ->add('descriptioncantine', TextType::class, array('attr' => $atrributes))
            ->add('jourcantine', ChoiceType::class, array('choices' => $choicesjour, 'attr' => $atrributes))
            ->add('sceance', ChoiceType::class, array('choices' => $choices, 'attr' => $atrributes))
            ->add('save', SubmitType::class, array('label' => 'modifier cartine', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
           // $cantine = new \GestionCantineBundle\Entity\Cantine();
 $verifcantine = $this->getDoctrine()
                ->getRepository('GestionCantineBundle:Cantine')
                ->findOneBy(array('jourcantine' => $form['jourcantine']->getData(),'sceance' => $form['sceance']->getData()));
                if (empty($verifcantine) ||$verifcantine->getId()==$cantine->getId()) {
 $cantine->setDescriptioncantine($form['descriptioncantine']->getData());
            $cantine->setJourcantine($form['jourcantine']->getData());
            $cantine->setSceance($form['sceance']->getData());

            $em = $this->getDoctrine()->getManager();
            $em->persist($cantine);
            $em->flush();

            $this->addFlash('notice', 'cantine modifier');

            return $this->redirectToRoute('liste_cantine_admin');

            }else{
                 $this->addFlash('error', 'cantine existe avec la meme jour et sceance  '); 
            }
           
        }

        return $this->render('admin\gestioncantine\modifiercantine.html.twig', array(
            'form' => $form->createView()
        ));
    }

  /**
     * @Route("/admin/calendriercantine",name="cantine_calendar_admin")
     */
public function cantinecalendarAction()
{

        
        return $this->render('admin\gestioncantine\calendrierCantine.html.twig');

}

 /**
     * @Route("/listecantinejson",name="cantinejson")
     */
public function cantinecalendarjsonAction()
{
    $data=array();
    $cantines = $this->getDoctrine()
        ->getRepository('GestionCantineBundle:Cantine')
        ->findBy(array(),array('jourcantine' => 'ASC'));
    $joursemaine = date('w');
    foreach ($cantines as $cantine)
    {
        $jourcantine  = (int) $cantine->getJourcantine();
        $Sceancecantine  = $cantine->getSceance();
        $seancestartheure="";
        $seanceendtheure= "";
        if($Sceancecantine=="matin")
        {
            $seancestartheure="07:00:00";
            $seanceendtheure= "08:00:00";
        }else
        {
            $seancestartheure="12:00:00";
            $seanceendtheure= "14:00:00";
        }
        //$Sceancecantine  =  $Sceancecantine;
        $data[]=array(

            'title' => $cantine->getDescriptioncantine(),
            'start' => str_replace(" ","T",date('Y-m-d H:i:s', strtotime('+'.( $jourcantine-$joursemaine).' days'. $seancestartheure))),
            'end' =>str_replace(" ","T", date('Y-m-d H:i:s', strtotime('+'.( $jourcantine-$joursemaine).' days'. $seanceendtheure)))
        );
    }

        
        return new JsonResponse($data);

}

//eleve ------------------------
 /**
     * @Route("/eleve/cantine",name="liste_cantine_eleve")
     */
public function eleveindexAction()
{
 return $this->render('eleve\gestioncantine\calendrierCantine.html.twig');


}
}