<?php

namespace SpoiledCar\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Anacona16\Bundle\DependentFormsBundle\Form\Type\DependentFormsType;



class VoitureType3 extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
  ->add('marque', EntityType::class,array(
                'class' => 'SpoiledCarFrontOfficeBundle:Marque',
                'required'  	=> true, 
    	        'empty_value'	=> '== Choisissez une Marque ==',
                 ))

               ->add('modele', DependentFormsType::class,array(
               'entity_alias' 	=> 'modele_by_marque',
    	       'parent_field'	=> 'marque',
               'empty_value'	=> '== Choisissez un Modele =='
           

                 ))
            ->add('chevaux', 'choice', array( 'choices' => array('4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16'),'expanded' => false,'empty_value'	=> '== Combien de Chevaux ? ==', 'required' => true,
             'multiple' => false,   'label' => 'Nombre de Chevaux' )) 
            ->add('boitevitesse', 'choice', array( 'choices' => array('Automatique' => 'Automatique', 'Manuelle' => 'Manuelle', 'Sequentielle' => 'Sequentielle'),'expanded' => false, 'required' => true,
             'multiple' => false,'empty_value'	=> '== Boite de Vitesse ==',   'label' => 'Boite de Vitesse' ))                          
        ;
    }

      private function getYears($min, $max='current')
    {
         $years = range($min, ($max === 'current' ? date('Y') : $max));

         return array_combine($years, $years);
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
