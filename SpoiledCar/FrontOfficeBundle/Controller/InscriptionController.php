<?php

namespace SpoiledCar\FrontOfficeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SpoiledCar\FrontOfficeBundle\Entity\Inscription;
use SpoiledCar\FrontOfficeBundle\Form\InscriptionType;

/**
 * Inscription controller.
 *
 */
class InscriptionController extends Controller
{
  
    /**
     * Creates a new Inscription entity.
     *
     */
    public function newAction(Request $request)
    {
        $inscription = new Inscription();
        $form = $this->createForm('SpoiledCar\FrontOfficeBundle\Form\InscriptionType', $inscription);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($inscription);
            $em->flush();

            return $this->redirectToRoute('spoiled_car_front_office_connexion');
        }

        return $this->render('inscription/new.html.twig', array(
            'inscription' => $inscription,
            'form' => $form->createView(),
        ));
    }

    
}
