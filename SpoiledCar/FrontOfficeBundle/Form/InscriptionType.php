<?php

namespace SpoiledCar\FrontOfficeBundle\Form;
use Symfony\Component\Form\Extension\Core\Type\DateType;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InscriptionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('mail','text', array(   'attr' => array('placeholder' => 'Adresse Mail'   ),'max_length' => 30, 'label' => false, 'required' => true))
            ->add('motdepasse','password', array(   'attr' => array('placeholder' => 'Mot de Passe'   ),'max_length' => 16, 'label' => false, 'required' => true))
            ->add('nomprenom','text', array(   'attr' => array('placeholder' => 'Nom et Prenom'   ),'max_length' => 30, 'label' => false, 'required' => true))
            ->add('telephone','text', array(   'attr' => array('placeholder' => 'Telephone'   ),'max_length' => 8, 'label' => false, 'required' => true))
            ->add('date' ,  DateType::class, array(   'widget' => 'single_text', 'format' => 'yyyy-MM-dd' , 'label' => false, 'required' => true))          
            ->add('sexe',  'choice', array( 'choices' => array('Homme' => 'Homme', 'Femme' => 'Femme'),'expanded' => false, 'required' => true,
             'multiple' => false,   'label' => false ))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SpoiledCar\FrontOfficeBundle\Entity\Inscription'
        ));
    }
}
