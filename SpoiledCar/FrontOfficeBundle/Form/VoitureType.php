<?php

namespace SpoiledCar\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Anacona16\Bundle\DependentFormsBundle\Form\Type\DependentFormsType;



class VoitureType extends AbstractType
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
            ->add('anneecirculation', 'choice', array( 'choices' => $this->getYears(1940)))
            ->add('matricule', 'text', array( 'max_length' => 30, 'label' => 'Matricule', 'required' => true))
            ->add('kilometrage', 'text' , array( 'max_length' => 7, 'label' => 'Kilometrage', 'required' => true))
            ->add('kilometragederniervidange', 'text', array('max_length' => 7, 'label' => 'Kilometrage Dernier Vidange', 'required' => true))
          
            ->add('couleur', 'text', array( 'max_length' => 8, 'label' => 'Couleur', 'required' => true))
                
            ->add('chevaux', 'choice', array( 'choices' => array('4' => '4', '5' => '5', '6' => '6', '7' => '7', '8' => '8', '9' => '9', '10' => '10', '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15', '16' => '16'),'expanded' => false, 'required' => true,
             'multiple' => false,   'label' => 'Nombre de Chevaux' )) 
             ->add('nbrportes', 'choice', array( 'choices' => array('4' => '4', '2' => '2'),'expanded' => false, 'required' => true,
             'multiple' => false,   'label' => 'Nombre de Portes' )) 
            ->add('style', 'choice', array( 'choices' => array('SV Premium' => 'SV Premium', 'AB Premium' => 'AB Premium'),'expanded' => false, 'required' => true,
             'multiple' => false,   'label' => 'Style' ))
            ->add('boitevitesse', 'choice', array( 'choices' => array('Automatique' => 'Automatique', 'Manuelle' => 'Manuelle', 'Sequentielle' => 'Sequentielle'),'expanded' => false, 'required' => true,
             'multiple' => false,   'label' => 'Boite de Vitesse' ))           
            
            ->add('carraosserie', 'choice', array( 'choices' => array('Sedan' => 'Sedan', 'Sport' => 'Sport'),'expanded' => false, 'required' => true,
             'multiple' => false,   'label' => 'Carrosserie' ))
       

               
        ;
    }

public function configureListFields(ListMapper $listMapper)
{
    $listMapper
        ->add('kilometrage', 'text', array(
            'editable' => true
        ))
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
