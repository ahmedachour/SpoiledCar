<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SpoiledCar\FrontOfficeBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\File\File;




/**
 * Description of VoitureType2
 *
 * @author Seif
 */
class VoitureType2 extends VoitureType {
    //put your code here
   /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       $builder
            ->add('prix', 'integer', array( 'max_length' => 10, 'label' => false, 'required' => true))

           ->add('file','file',array('required' => true , 'data_class' => 'SpoiledCar\FrontOfficeBundle\Entity\Voiture',))
           ->add('airbag', CheckboxType::class, array(
                   'label'    => 'Airbag',
                   'required' => false,))
                          ->add('systemedesecurite', CheckboxType::class, array(
                   'label'    => 'Systeme de Securite',
                   'required' => false,))
                          ->add('climatisation', CheckboxType::class, array(
                   'label'    => 'Climatisation',
                   'required' => false,))
                          ->add('roueenalliage', CheckboxType::class, array(
                   'label'    => 'Roue en Alliage',
                   'required' => false,))
                          ->add('freinsabs', CheckboxType::class, array(
                   'label'    => 'Freins ABS',
                   'required' => false,))
                          ->add('antivol', CheckboxType::class, array(
                   'label'    => 'Antivol',
                   'required' => false,))
                          ->add('retroviseurselectrique', CheckboxType::class, array(
                   'label'    => 'Retroviseurs Electrique',
                   'required' => false,))
                          ->add('directionassiste', CheckboxType::class, array(
                   'label'    => 'Direction Assiste',
                   'required' => false,))
                          ->add('lecteurcd', CheckboxType::class, array(
                   'label'    => 'Lecteur CD',                 
                   'required' => false,))
                          ->add('siegeelectrique', CheckboxType::class, array(
                   'label'    => 'Siege Electrique',
                   'required' => false,))
                          ->add('vitreelectrique', CheckboxType::class, array(
                   'label'    => 'Vitre Electrique',
                   'required' => false,))
                          ->add('airbagconducteur', CheckboxType::class, array(
                   'label'    => 'Airbag Conducteur',
                   'required' => false,))
                           ->add('description', TextareaType::class, array(  'attr' => array('label' => 'Description', 'required' => true,)))            
;
  }
    


    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SpoiledCar\FrontOfficeBundle\Entity\Voiture'
        ));
    }
}

