<?php

namespace SpoiledCar\FrontOfficeBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Intervention_UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description')->add('step')
                ->add('date' ,  DateType::class, array(   'widget' => 'single_text', 'format' => 'yyyy-MM-dd' , 'label' => false, 'required' => true)) 
                ->add('voiture', EntityType::class,array(
                'class' => 'SpoiledCarFrontOfficeBundle:Voiture',
                'required'  	=> true, 
    	        'empty_value'	=> '== Choisissez une Voiture ==',
                 ))
                ->add('prix', 'integer', array( 'max_length' => 10, 'label' => false, 'required' => true))
;
        

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SpoiledCar\FrontOfficeBundle\Entity\Intervention_User'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'spoiledcar_frontofficebundle_intervention_user';
    }


}
