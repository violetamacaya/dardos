<?php

namespace DardosBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use DardosBundle\Entity\Jugador;
use DardosBundle\Form\JugadorType;

/**
 * Jugador controller.
 *
 */
class JugadorController extends Controller
{
    /**
     * Lists all Jugador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $jugadors = $em->getRepository('DardosBundle:Jugador')->findAll();

        return $this->render('jugador/index.html.twig', array(
            'jugadors' => $jugadors,
        ));
    }

    /**
     * Creates a new Jugador entity.
     *
     */
    public function newAction(Request $request)
    {
        $jugador = new Jugador();
        $form = $this->createForm('DardosBundle\Form\JugadorType', $jugador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jugador);
            $em->flush();

            return $this->redirectToRoute('prueba_jugador_show', array('id' => $jugador->getId()));
        }

        return $this->render('jugador/new.html.twig', array(
            'jugador' => $jugador,
            'form' => $form->createView(),
            'patito' => "Miaaaaaauu",
        ));
    }

    /**
     * Finds and displays a Jugador entity.
     *
     */
    public function showAction(Jugador $jugador)
    {
        $deleteForm = $this->createDeleteForm($jugador);

        return $this->render('jugador/show.html.twig', array(
            'jugador' => $jugador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Jugador entity.
     *
     */
    public function editAction(Request $request, Jugador $jugador)
    {
        $deleteForm = $this->createDeleteForm($jugador);
        $editForm = $this->createForm('DardosBundle\Form\JugadorType', $jugador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($jugador);
            $em->flush();

            return $this->redirectToRoute('prueba_jugador_edit', array('id' => $jugador->getId()));
        }

        return $this->render('jugador/edit.html.twig', array(
            'jugador' => $jugador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Jugador entity.
     *
     */
    public function deleteAction(Request $request, Jugador $jugador)
    {
        $form = $this->createDeleteForm($jugador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($jugador);
            $em->flush();
        }

        return $this->redirectToRoute('prueba_jugador_index');
    }

    /**
     * Creates a form to delete a Jugador entity.
     *
     * @param Jugador $jugador The Jugador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Jugador $jugador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prueba_jugador_delete', array('id' => $jugador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
