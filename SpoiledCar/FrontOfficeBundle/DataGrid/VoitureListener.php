<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SpoiledCarFrontOfficeBundle\DataGrid;

use Doctrine\ORM\EntityNotFoundException;

use SpoiledCar\FrontOfficeBundle\Entity\Voiture;

use Symfony\Component\DependencyInjection\ContainerAware;

use SpoiledCar\FrontOfficeBundle\DataGrid\InlineEdit;

use Thrace\DataGridBundle\Event\RowEvent;

/**
 * Description of VoitureListener
 *
 * @author ahmed
 */
class VoitureListener extends ContainerAware{
 
    public function onRowEdit(RowEvent $event)
    {
        if ($event->getDataGridName() !== InlineEdit::IDENTIFIER){
            return;
        }
        
        $repo = $this->container->get('doctrine.orm.entity_manager')->getRepository('SpoiledCarFrontOfficeBundle:Voiture');
        
        $voiture = $repo->findOneById($event->getId());
        
        if (!$voiture){
            throw new EntityNotFoundException();
        }
        
        $voiture->setKilometrage($this->container->get('request')->request->get('kilometrage'));
        
        $this->process($voiture, $event);
        
    }
    
   
    protected function process(Voiture $voiture, RowEvent $event)
    {
        $errors = $this->container->get('validator')->validate($voiture, array('default'));
        
        if ($errors->count() > 0){
            $event->setErrors($this->errorsToArray($errors));
            $event->setSuccess(false);
        
        } else {
            $this->container->get('doctrine.orm.entity_manager')->persist($voiture);
            $this->container->get('doctrine.orm.entity_manager')->flush();
            $event->setSuccess(true);
        }
    }
    
    protected function errorsToArray($errors)
    {
        $data = array();
        foreach ($errors as $error) {
            $data[] = $error->getMessage();
        }
        return $data;
    }

}
    
    

