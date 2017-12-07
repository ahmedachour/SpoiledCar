<?php

namespace SpoiledCar\FrontOfficeBundle\Controller;

use SpoiledCar\FrontOfficeBundle\Entity\Intervention_User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Intervention_user controller.
 *
 */
class Intervention_UserController extends Controller
{
    /**
     * Lists all intervention_User entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $intervention_Users = $em->getRepository('SpoiledCarFrontOfficeBundle:Intervention_User')->findAll();

        return $this->render('intervention_user/index.html.twig', array(
            'intervention_Users' => $intervention_Users,
        ));
    }

    /**
     * Creates a new intervention_User entity.
     *
     */
    public function newAction(Request $request)
    {
        $intervention_User = new Intervention_user();
        $form = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\Intervention_UserType', $intervention_User);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervention_User);
            $em->flush($intervention_User);

            return $this->redirectToRoute('intervention_user_show', array('id' => $intervention_User->getId()));
        }

        return $this->render('intervention_user/new.html.twig', array(
            'intervention_User' => $intervention_User,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a intervention_User entity.
     *
     */
    public function showAction(Intervention_User $intervention_User)
    {
        $deleteForm = $this->createDeleteForm($intervention_User);

        return $this->render('intervention_user/show.html.twig', array(
            'intervention_User' => $intervention_User,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing intervention_User entity.
     *
     */
    public function editAction(Request $request, Intervention_User $intervention_User)
    {
        $deleteForm = $this->createDeleteForm($intervention_User);
        $editForm = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\Intervention_UserType', $intervention_User);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('intervention_user_edit', array('id' => $intervention_User->getId()));
        }

        return $this->render('intervention_user/edit.html.twig', array(
            'intervention_User' => $intervention_User,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a intervention_User entity.
     *
     */
    public function deleteAction(Request $request, Intervention_User $intervention_User)
    {
        $form = $this->createDeleteForm($intervention_User);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($intervention_User);
            $em->flush();
        }

        return $this->redirectToRoute('intervention_user_index');
    }

    /**
     * Creates a form to delete a intervention_User entity.
     *
     * @param Intervention_User $intervention_User The intervention_User entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Intervention_User $intervention_User)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('intervention_user_delete', array('id' => $intervention_User->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
