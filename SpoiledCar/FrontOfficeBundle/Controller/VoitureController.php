<?php

namespace SpoiledCar\FrontOfficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use SpoiledCar\FrontOfficeBundle\Entity\Voiture;
use SpoiledCar\FrontOfficeBundle\Form\VoitureType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;



/**
 * Voiture controller.
 *
 * @Route("/voiture")
 */
class VoitureController extends Controller
{
    /**
     * Lists all Voiture entities.
     *
     * @Route("/", name="voiture_index")
     * @Method("GET")
     */
    public function indexAction()
    { 



        $em = $this->getDoctrine()->getManager();
        $user1 = $this->get('security.token_storage')->getToken()->getUser();
        $user = $user1->getId();
        $voitures = $em
                ->getRepository('SpoiledCarFrontOfficeBundle:Voiture')
                ->findBy(array('user' => $user), array());  
        $deleteForm = array();
         foreach ($voitures as $voiture) {     
        $deleteForm[$voiture->getId()] = $this->createDeleteForms($voiture->getId())->createView();

    }

        return $this->render('voiture/index.html.twig', array(
            'voitures' => $voitures,
            'delete_form' => $deleteForm, ));
    }

    
    /**
     * Lists all Voiture entities.
     *
     * @Route("/{id}/pdf", name="voiture_pdf")
     * @Method({"GET", "POST"})
     */
    public function pdfAction(Voiture $voitures)
    {
           $em = $this->getDoctrine()->getManager();
        $user1 = $this->get('security.token_storage')->getToken()->getUser();
        $user = $user1->getId();
         $Intervention_User = $em->getRepository('SpoiledCarFrontOfficeBundle:Intervention_User')->findBy(array('user' => $user), array()); 

         $interventions1 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '10000') );
         $interventions2 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '20000') );
         $interventions4 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '40000') );
         $interventions6 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '60000') );
         $interventions10 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '100000') );
         $interventions12 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '120000') );
        $interventions20 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '200000') );
       $html = $this->render('voiture/pdf.html.twig', array( 'voitures' => $voitures,'interventions1' => $interventions1,
             'interventions2' => $interventions2,
             'interventions4' => $interventions4,
             'interventions6' => $interventions6,
             'Intervention_User' => $Intervention_User,

             'interventions10' => $interventions10,
             'interventions12' => $interventions12,
             'interventions20' => $interventions20,));
        $html2pdf = new \Html2Pdf_Html2Pdf('P','A4','fr');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($html);
        $content = $html2pdf->Output('', true);
        $response = new Response();
        $response->setContent($content);
        $response->headers->set('Content-Type', 'application/force-download');
        $response->headers->set('Content-disposition', 'filename=Rapport.pdf');
         return $response;
     
    }
    /**
     * Creates a new Voiture entity.
     *
     * @Route("/new", name="voiture_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $voiture = new Voiture();
        $form = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\VoitureType', $voiture);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $voiture->setUser($this->get('security.context')->getToken()->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();
            return $this->redirectToRoute('voiture_index');
        }

        return $this->render('voiture/new.html.twig', array(
            'voiture' => $voiture,
            
            'form' => $form->createView(),
        ));
    }
    


    /**
     * Finds and displays a Voiture entity.
     *
     * @Route("/{id}", name="voiture_show")
     * @Method({"GET", "POST"})
     */
    public function showAction(Request $request,Voiture $voitures)
    {
        $em = $this->getDoctrine()->getManager();
         $interventions1 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '10000') );
         $interventions2 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '20000') );
         $interventions4 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '40000') );
         $interventions6 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '60000') );
         $interventions10 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '100000') );
         $interventions12 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '120000') );
        $interventions20 = $em->getRepository('SpoiledCarFrontOfficeBundle:Interventions')->findBy(
  array('step' => '200000') );
        $deleteForm = $this->createDeleteForm($voitures);
        $editForm = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\VoitureType2', $voitures);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $voitures->upload();
            $em->persist($voitures);
            $em->flush();
            return $this->redirectToRoute('voiture_index');
        }
        return $this->render('voiture/show.html.twig', array(
            'interventions1' => $interventions1,
             'interventions2' => $interventions2,
             'interventions4' => $interventions4,
             'interventions6' => $interventions6,
             'interventions10' => $interventions10,
             'interventions12' => $interventions12,
             'interventions20' => $interventions20,
            'voitures' => $voitures,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Voiture entity.
     *
     * @Route("/{id}/edit", name="voiture_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Voiture $voiture)
    {
        $deleteForm = $this->createDeleteForm($voiture);
        $editForm = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\VoitureType', $voiture);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($voiture);
            $em->flush();
            return $this->redirectToRoute('voiture_index');
        }

        return $this->render('voiture/edit.html.twig', array(
            'voiture' => $voiture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Voiture entity.
     *
     * @Route("/{id}", name="voiture_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request,$id)
    {
          $form = $this->createDeleteForms($id);
          $form->bind($request);
        if ($form->isValid()) {
        $em = $this->getDoctrine()->getManager();
        $voiture = $em->getRepository('SpoiledCarFrontOfficeBundle:Voiture')
                     ->find($id);
        if (!$voiture) {
            throw $this->createNotFoundException('Unable to find Laender entity.');
        }
        $em->remove($voiture);
        $em->flush();
    }
 
    return $this->redirect($this->generateUrl('voiture_index'));
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
        return $this->render('voiture/index.html.twig', array(
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Creates a form to delete a Voiture entity.
     *
     * @param Voiture $voiture The Voiture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Voiture $voiture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('voiture_delete', array('id' => $voiture->getId())))              
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
    private function createDeleteForms($id)
{
    return $this->createFormBuilder(array('id' => $id))
        ->add('id', 'hidden')
        ->getForm()
    ;
}
    
}
