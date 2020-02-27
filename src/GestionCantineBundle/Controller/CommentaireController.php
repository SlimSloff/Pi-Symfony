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
class CommentaireController extends Controller
{

    /**
     * @Route("/admin/commentaire",name="liste_commentaire_admin")
     */
    public function indexAction()
    {

        $commentaires = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Commentaire')
            ->findAll();
        return $this->render('admin\gestioncantine\ListeCommentaire.html.twig', array(
            'commentaires' => $commentaires
        ));

    }



    /**
     * @Route("/admin/commentaire/delete/{id}", name="supprimer_commentaire_admin")
     */
    public function deleteAction($id)
    {
        $commentaire = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Commentaire')
            ->find($id);

        if (empty($commentaire)) {
            $this->addFlash('error', 'commentaire non trouvé');

            return $this->redirectToRoute('liste_commentaire_admin');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($commentaire);
        $em->flush();

        $this->addFlash('notice', 'commentaire supprimer');

        return $this->redirectToRoute('liste_commentaire_admin');
    }


//eleve -----------------------------------------
    /**
     * @Route("/eleve/commentaire",name="liste_commentaire_eleve")
     */
    public function eleveindexAction()
    {

        $commentaires = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Commentaire')
            ->findBy(array('User' => $this->getUser()));
        return $this->render('eleve\gestioncantine\ListeCommentaireeleve.html.twig', array(
            'commentaires' => $commentaires
        ));

    }

    /**
     * @Route("/eleve/commentaire/create", name="ajouter_commentaire_eleve")
     */
    public function createAction(Request $request)
    {
        $commentaire = new \GestionCantineBundle\Entity\Commentaire();
        $cantine = new \GestionCantineBundle\Entity\Cantine();
        // $user = $this->container->get('security.context')->getToken()->getUser();
        $atrributes = array('class' => 'form-control', 'style' => 'margin-bottom:15px');
        $form = $this->createFormBuilder($commentaire)
            ->add('textcommentaire', TextType::class, array('attr' => $atrributes))
            ->add('Cantine', EntityType::class,array('class'=>'GestionCantineBundle\Entity\Cantine','choice_label'=>'descriptioncantine','expanded'=>false,'multiple'=>false))
            ->add('save', SubmitType::class, array('label' => 'ajouter commentaire', 'attr' => array('class' => 'btn btn-primary')))
            ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $commentaire->setCantine($form['Cantine']->getData());
            $commentaire->setTextcommentaire($form['textcommentaire']->getData());
            $commentaire->setDatecommentaire(new \DateTime('now'));
            $commentaire->setUser($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaire);
            $em->flush();


            return $this->redirectToRoute('liste_commentaire_eleve');
        }

        return $this->render('eleve\gestioncantine\ajoutercommentaire.html.twig', array(
            'form' => $form->createView()
        ));
    }


    /**
     * @Route("/eleve/commentaire/delete/{id}", name="supprimer_commentaire_eleve")
     */
    public function elevedeleteAction($id)
    {
        $commentaire = $this->getDoctrine()
            ->getRepository('GestionCantineBundle:Commentaire')
            ->find($id);

        if (empty($commentaire)) {
            $this->addFlash('error', 'commentaire non trouvé');

            return $this->redirectToRoute('liste_commentaire_eleve');
        }

        $em = $this->getDoctrine()->getManager();
        $em->remove($commentaire);
        $em->flush();

        $this->addFlash('notice', 'commentaire supprimer');

        return $this->redirectToRoute('liste_commentaire_eleve');
    }


}