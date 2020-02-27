<?php

namespace EcoleBundle\Controller;

use EcoleBundle\Entity\pere;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Pere controller.
 *
 * @Route("pere")
 */
class pereController extends Controller
{
    /**
     * Lists all pere entities.
     *
     * @Route("/", name="pere_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $peres = $em->getRepository('EcoleBundle:pere')->findAll();

        return $this->render('pere/index.html.twig', array(
            'peres' => $peres,
        ));
    }

    /**
     * Creates a new pere entity.
     *
     * @Route("/new", name="pere_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $pere = new Pere();
        $form = $this->createForm('EcoleBundle\Form\pereType', $pere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pere);
            $em->flush();

            return $this->redirectToRoute('pere_show', array('id' => $pere->getId()));
        }

        return $this->render('pere/new.html.twig', array(
            'pere' => $pere,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a pere entity.
     *
     * @Route("/{id}", name="pere_show")
     * @Method("GET")
     */
    public function showAction(pere $pere)
    {
        $deleteForm = $this->createDeleteForm($pere);

        return $this->render('pere/show.html.twig', array(
            'pere' => $pere,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing pere entity.
     *
     * @Route("/{id}/edit", name="pere_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, pere $pere)
    {
        $deleteForm = $this->createDeleteForm($pere);
        $editForm = $this->createForm('EcoleBundle\Form\pereType', $pere);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('pere_edit', array('id' => $pere->getId()));
        }

        return $this->render('pere/edit.html.twig', array(
            'pere' => $pere,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a pere entity.
     *
     * @Route("/{id}", name="pere_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, pere $pere)
    {
        $form = $this->createDeleteForm($pere);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($pere);
            $em->flush();
        }

        return $this->redirectToRoute('pere_index');
    }

    /**
     * Creates a form to delete a pere entity.
     *
     * @param pere $pere The pere entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(pere $pere)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('pere_delete', array('id' => $pere->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
