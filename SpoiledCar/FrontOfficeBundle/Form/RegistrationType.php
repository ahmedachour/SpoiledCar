<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SpoiledCar\FrontOfficeBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Description of RegistrationType
 *
 * @author ahmed
 */
class RegistrationType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
         $builder
            ->add('nomprenom','text', array(   'attr' => array('placeholder' => 'Nom et Prenom'   ),'max_length' => 30, 'label' => false, 'required' => true))
            ->add('telephone','text', array(   'attr' => array('placeholder' => 'Telephone'   ),'max_length' => 8, 'label' => false, 'required' => true))
            ->add('date' ,  DateType::class, array(   'widget' => 'single_text', 'format' => 'yyyy-MM-dd' , 'label' => false, 'required' => true))          
            ->add('sexe',  'choice', array( 'choices' => array('Homme' => 'Homme', 'Femme' => 'Femme'),'expanded' => false, 'required' => true,
             'multiple' => false,   'label' => false ))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}