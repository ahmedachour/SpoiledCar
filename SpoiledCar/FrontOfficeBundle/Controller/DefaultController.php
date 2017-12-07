<?php

namespace SpoiledCar\FrontOfficeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{
    public function indexAction()
    {
              $em = $this->getDoctrine()->getManager();
        $voiturefind = $em->getRepository('SpoiledCarFrontOfficeBundle:Voiture')->myFindAll1();
 
          $voitures  = $this->get('knp_paginator')->paginate($voiturefind,$this->get('request')->query->get('page', 1),4);
        return $this->render('SpoiledCarFrontOfficeBundle:Default:index.html.twig', array(
            'voitures' => $voitures,
           )); 
    }
     
    
    
      public function listTableAction(Request $request)
    {
        $filterForm = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\VoitureType3');

        $em = $this->getDoctrine()->getManager();
        $voiturefind = $em->getRepository('SpoiledCarFrontOfficeBundle:Voiture')
                ->myFindAll($filterForm);
        $voitures = $this->get('knp_paginator')->paginate($voiturefind, $this->get(
                        'request')->query->get('page', 1), 6
        );
        $filterForm->handleRequest($request);

        if ($filterForm->isSubmitted() && $filterForm->isValid()) {
            return $this->render('SpoiledCarFrontOfficeBundle:Default:listTable.html.twig', array(
                        'voitures' => $voitures,
                        'filterForm' => $filterForm->createView(),
            ));
        }
        return $this->render('SpoiledCarFrontOfficeBundle:Default:listTable.html.twig', array(
                    'voitures' => $voitures,
                    'filterForm' => $filterForm->createView(),
        ));
        
    }
    
     public function aboutAction()
    {
        return $this->render('SpoiledCarFrontOfficeBundle:Default:about.html.twig');
    }
     public function contactsAction()
    {
         
        return $this->render('SpoiledCarFrontOfficeBundle:Default:contacts.html.twig');
    }
       public function connexionAction()
    {
        return $this->render('SpoiledCarFrontOfficeBundle:Default:connexion.html.twig');
    }
    
      public function detailAction(\SpoiledCar\FrontOfficeBundle\Entity\Voiture $voitures,Request $request)
    {
               $editForm = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\VoitureType2', $voitures);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $voitures->upload();
            $em->persist($voitures);
            $em->flush();
            return $this->redirectToRoute('voiture_index');
        }
        return $this->render('SpoiledCarFrontOfficeBundle:Default:detail.html.twig', array(
            'voitures' => $voitures,
            'edit_form' => $editForm->createView(),
        ));
    }
}
