<?php

namespace SpoiledCar\FrontOfficeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Sujet', 'text', array(   'attr' => array('placeholder' => ' Sujet'   ),'max_length' => 30, 'label' => false, 'required' => true))
            ->add('nomprenom', 'text',  array(   'attr' => array('placeholder' => 'Nom et Prenom'   ),'max_length' => 30, 'label' => false, 'required' => true))
            ->add('email', 'text', array(   'attr' => array('placeholder' => 'Adresse Mail'   ),'max_length' => 30, 'label' => false, 'required' => true))
            ->add('telephone', 'text', array(   'attr' => array('placeholder' => 'Telephone'   ),'max_length' => 8, 'label' => false, 'required' => true))
            ->add('commentaire', 'text', array(   'attr' => array('placeholder' => 'Votre Commentaire'   ), 'label' => false, 'required' => true))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SpoiledCar\FrontOfficeBundle\Entity\Contact'
        ));
    }
}
