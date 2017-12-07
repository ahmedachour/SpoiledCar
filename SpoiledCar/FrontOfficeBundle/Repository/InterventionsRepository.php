<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SpoiledCar\FrontOfficeBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Description of InterventionsRepository
 *
 * @author ahmed
 */
class InterventionsRepository extends EntityRepository {

    public function myFind1()
  {

    $query = $this->createQueryBuilder('p')
             ->where('p.step = :20')
            ->getQuery();

    return $query->getResult();
}
    
    
}
