<?php

namespace EcoleBundle\Controller;

use EcoleBundle\Entity\cantine;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cantine controller.
 *
 * @Route("cantine")
 */
class cantineController extends Controller
{
    /**
     * Lists all cantine entities.
     *
     * @Route("/", name="cantine_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cantines = $em->getRepository('EcoleBundle:cantine')->findAll();

        return $this->render('cantine/index.html.twig', array(
            'cantines' => $cantines,
        ));
    }

    /**
     * Creates a new cantine entity.
     *
     * @Route("/new", name="cantine_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cantine = new Cantine();
        $form = $this->createForm('EcoleBundle\Form\cantineType', $cantine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cantine);
            $em->flush();

            return $this->redirectToRoute('cantine_show', array('id' => $cantine->getId()));
        }

        return $this->render('cantine/new.html.twig', array(
            'cantine' => $cantine,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cantine entity.
     *
     * @Route("/{id}", name="cantine_show")
     * @Method("GET")
     */
    public function showAction(cantine $cantine)
    {
        $deleteForm = $this->createDeleteForm($cantine);

        return $this->render('cantine/show.html.twig', array(
            'cantine' => $cantine,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cantine entity.
     *
     * @Route("/{id}/edit", name="cantine_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, cantine $cantine)
    {
        $deleteForm = $this->createDeleteForm($cantine);
        $editForm = $this->createForm('EcoleBundle\Form\cantineType', $cantine);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cantine_edit', array('id' => $cantine->getId()));
        }

        return $this->render('cantine/edit.html.twig', array(
            'cantine' => $cantine,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cantine entity.
     *
     * @Route("/{id}", name="cantine_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, cantine $cantine)
    {
        $form = $this->createDeleteForm($cantine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cantine);
            $em->flush();
        }

        return $this->redirectToRoute('cantine_index');
    }

    /**
     * Creates a form to delete a cantine entity.
     *
     * @param cantine $cantine The cantine entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(cantine $cantine)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cantine_delete', array('id' => $cantine->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
