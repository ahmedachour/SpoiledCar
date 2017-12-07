<?php

namespace SpoiledCar\FrontOfficeBundle\Controller;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SpoiledCar\FrontOfficeBundle\Entity\Interventions;
use SpoiledCar\FrontOfficeBundle\Entity\Intervention_User;
use SpoiledCar\FrontOfficeBundle\Form\Intervention_UserType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use SpoiledCar\FrontOfficeBundle\Form\InterventionsType;

/**
 * Interventions controller.
 *
 * @Route("/interventions")
 */
class InterventionsController extends Controller
{
    /**
     * Lists all Interventions entities.
     *
     * @Route("/", name="interventions_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user1 = $this->get('security.token_storage')->getToken()->getUser();
        $user = $user1->getId();
        $interventions = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findAll();
        $Intervention_User = $em->getRepository('SpoiledCarFrontOfficeBundle:Intervention_User')->findBy(array('user' => $user), array()); 
        $deleteForm = array();
        
         foreach ($Intervention_User as $Intervention_Users) {     
        $deleteForm[$Intervention_Users->getId()] = $this->createDeleteForms($Intervention_Users->getId())->createView();

    }
        return $this->render('interventions/index.html.twig', array(
             'interventions' => $interventions,
             'Intervention_User' => $Intervention_User,
             'delete_form' => $deleteForm,
        ));
    }

    /**
     * Creates a new Interventions entity.
     *
     * @Route("/new", name="interventions_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

           $intervention_User = new Intervention_User();
        $user1 = $this->get('security.token_storage')->getToken()->getUser();
        $user = $user1->getId();
        $form = $this->createForm(new Intervention_UserType(), $intervention_User)
                ->add('description')->add('step')
                ->add('date', DateType::class, array('widget' => 'single_text', 'format' => 'yyyy-MM-dd', 'label' => false, 'required' => true))
                ->add('prix', 'integer', array('max_length' => 10, 'label' => false, 'required' => true))
                ->add('voiture', EntityType::class, array(
            'class' => 'SpoiledCarFrontOfficeBundle:Voiture',
            'query_builder' => function(EntityRepository $er)use($user) {

                return $er->createQueryBuilder('u')
                ->where('u.user=' . $user);
            }));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $intervention_User->setUser($this->get('security.context')->getToken()->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervention_User);
            $em->flush($intervention_User);

            return $this->redirectToRoute('interventions_index');
        }

        return $this->render('interventions/new.html.twig', array(
            'intervention_User' => $intervention_User,
            'form' => $form->createView(),
        ));

    }

    /**
     * Finds and displays a Interventions entity.
     *
     * @Route("/{id}", name="interventions_show")
     * @Method("GET")
     */
    public function showAction(Interventions $intervention)
    {
        $deleteForm = $this->createDeleteForm($intervention);

        return $this->render('interventions/show.html.twig', array(
            'intervention' => $intervention,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Interventions entity.
     *
     * @Route("/{id}/edit", name="interventions_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Interventions $intervention)
    {
        $deleteForm = $this->createDeleteForm($intervention);
        $editForm = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\InterventionsType', $intervention);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervention);
            $em->flush();

            return $this->redirectToRoute('interventions_edit', array('id' => $intervention->getId()));
        }

        return $this->render('interventions/edit.html.twig', array(
            'intervention' => $intervention,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Interventions entity.
     *
     * @Route("/{id}", name="interventions_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request,$id)
    {
          $form = $this->createDeleteForms($id);
          $form->bind($request);
        if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $Intervention_User = $em->getRepository('SpoiledCarFrontOfficeBundle:Intervention_User')
                     ->find($id);
        if (!$Intervention_User) {
            throw $this->createNotFoundException('Unable to find Laender entity.');
        }
        $em->remove($Intervention_User);
        $em->flush();
    }
 
    return $this->redirect($this->generateUrl('interventions_index'));
    }

    /**
     * Creates a form to delete a Interventions entity.
     *
     * @param Interventions $Intervention_User The Interventions entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Intervention_User $Intervention_User)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('interventions_delete', array('id' => $Intervention_User->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
        /**
     * Delete Form generation.
     *
     * @Route("/delete_form/{id}", name="userrole_delete_form")
     * @Method("POST")
     */
    public function delete_formAction($id)
    {
        $deleteForm = $this->createDeleteForms($id);
        $deleteForm->handleRequest($request);
        if ($deleteForm->isSubmitted() && $deleteForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($id);           
            $em->flush();
        }  
        return $this->render('interventions/index.html.twig', array(
            'delete_form' => $deleteForm->createView(),
        ));
    }
        private function createDeleteForms($id)
{
    return $this->createFormBuilder(array('id' => $id))
        ->add('id', 'hidden')
        ->getForm()
    ;
}
}
