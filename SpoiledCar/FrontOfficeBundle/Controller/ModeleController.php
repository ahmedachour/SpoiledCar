<?php

namespace SpoiledCar\FrontOfficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SpoiledCar\FrontOfficeBundle\Entity\Modele;
use SpoiledCar\FrontOfficeBundle\Form\ModeleType;

/**
 * Modele controller.
 *
 * @Route("/modele")
 */
class ModeleController extends Controller
{
    /**
     * Lists all Modele entities.
     *
     * @Route("/", name="modele_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $modeles = $em->getRepository('SpoiledCarFrontOfficeBundle:Modele')->findAll();

        return $this->render('modele/index.html.twig', array(
            'modeles' => $modeles,
        ));
    }

    /**
     * Creates a new Modele entity.
     *
     * @Route("/new", name="modele_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $modele = new Modele();
        $form = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\ModeleType', $modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();

            return $this->redirectToRoute('modele_show', array('id' => $modele->getId()));
        }

        return $this->render('modele/new.html.twig', array(
            'modele' => $modele,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Modele entity.
     *
     * @Route("/{id}", name="modele_show")
     * @Method("GET")
     */
    public function showAction(Modele $modele)
    {
        $deleteForm = $this->createDeleteForm($modele);

        return $this->render('modele/show.html.twig', array(
            'modele' => $modele,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Modele entity.
     *
     * @Route("/{id}/edit", name="modele_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Modele $modele)
    {
        $deleteForm = $this->createDeleteForm($modele);
        $editForm = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\ModeleType', $modele);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($modele);
            $em->flush();

            return $this->redirectToRoute('modele_edit', array('id' => $modele->getId()));
        }

        return $this->render('modele/edit.html.twig', array(
            'modele' => $modele,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Modele entity.
     *
     * @Route("/{id}", name="modele_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Modele $modele)
    {
        $form = $this->createDeleteForm($modele);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($modele);
            $em->flush();
        }

        return $this->redirectToRoute('modele_index');
    }

    /**
     * Creates a form to delete a Modele entity.
     *
     * @param Modele $modele The Modele entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Modele $modele)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('modele_delete', array('id' => $modele->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
