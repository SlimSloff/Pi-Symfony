<?php


namespace GestionCantineBundle\Controller;
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
class ReclamationController extends Controller
{

    /**
     * @Route("/admin/reclamation",name="liste_reclamation_admin")
     */
    public function indexAction()
    {

        $reclamations = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Reclamation')
            ->findBy(array('traiter' => false));
        return $this->render('admin\gestioncantine\Listereclamation.html.twig', array(
            'reclamations' => $reclamations
        ));

    }



    /**
     * @Route("/admin/reclamation/delete/{id}", name="supprimer_reclamation_admin")
     */
    public function deleteAction($id)
    {
        $reclamation = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Reclamation')
            ->find($id);

        if (empty($reclamation)) {
            $this->addFlash('error', 'reclamation non trouvé');

            return $this->redirectToRoute('liste_reclamation_admin');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($reclamation);
        $em->flush();

        $this->addFlash('notice', 'reclamation supprimer');

        return $this->redirectToRoute('liste_reclamation_admin');
    }



     /**
     * @Route("/admin/reclamation/treat/{id}", name="traiter_reclamation_admin")
     */
    public function treatAction($id,Request $request)
    {
        $reclamation = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Reclamation')
            ->find($id);
        if (empty($reclamation)) {
            $this->addFlash('error', 'reclamation non trouvé');

            return $this->redirectToRoute('liste_reclamation_admin');
        }
        
            $reclamation->setTraiter(true);
           
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

            $this->addFlash('notice', 'reclamation traiter');

            return $this->redirectToRoute('liste_reclamation_admin');
        
    }

// eleve controller
    /**
     * @Route("/eleve/reclamation",name="liste_reclamation_eleve")
     */
    public function indexeleveAction()
    {

        $reclamations = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Reclamation')
            ->findBy(array('User' => $this->getUser()));
        return $this->render('eleve\gestioncantine\Listereclamation.html.twig', array(
            'reclamations' => $reclamations
        ));

    }

    /**
     * @Route("/eleve/reclamation/create", name="ajouter_reclamation_eleve")
     */
    public function createAction(Request $request)
    {
        $reclamation = new \GestionCantineBundle\Entity\Reclamation();
        $atrributes = array('class' => 'form-control', 'style' => 'margin-bottom:15px');

        $form = $this->createFormBuilder($reclamation)
            ->add('sujetreclamation', TextType::class, array('attr' => $atrributes))
            ->add('textreclamation', TextType::class, array('attr' => $atrributes))
            ->add('save', SubmitType::class, array('label' => 'Envoyer reclamation', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $reclamation->setSujetreclamation($form['sujetreclamation']->getData());
            $reclamation->setTextreclamation($form['textreclamation']->getData());
            $reclamation->setDatereclamation(new \DateTime('now'));
            $reclamation->setUser($this->getUser());
            $reclamation->setTraiter(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();


            return $this->redirectToRoute('liste_reclamation_eleve');
        }

        return $this->render('eleve\gestioncantine\ajouterreclamation.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/eleve/reclamation/delete/{id}", name="supprimer_reclamation_eleve")
     */
    public function elevedeleteAction($id)
    {
        $reclamation = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Reclamation')
            ->find($id);

        if (empty($reclamation)) {
            $this->addFlash('error', 'reclamation non trouvé');

            return $this->redirectToRoute('liste_reclamation_eleve');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($reclamation);
        $em->flush();

        $this->addFlash('notice', 'reclamation supprimer');

        return $this->redirectToRoute('liste_reclamation_eleve');
    }


}