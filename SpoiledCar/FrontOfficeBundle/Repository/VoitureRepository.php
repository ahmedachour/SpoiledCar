<?php

namespace SpoiledCar\FrontOfficeBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\FormInterface;
/**
 * VoitureRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VoitureRepository extends EntityRepository
{
public function myFindAll(FormInterface $filterForm)
  {
$qb = $this->createQueryBuilder('u')->Where('u.prix IS NOT NULL');

if ($filterForm->has('marque')) {
    $qb->leftJoin('u.marque', 'm')
        ->andWhere( $qb->expr()
        ->like('m.nomMarque', ':marque'))
        ->setParameter('marque', '%'. $filterForm->get('marque')->getData().'%'); 
}
if ($filterForm->has('modele')) {
    $qb->leftJoin('u.modele', 'n')
        ->andWhere( $qb->expr()->like('n.nom', ':modele'))
        ->setParameter('modele', '%'. $filterForm->get('modele')->getData().'%');
}


if ($filterForm->has('boitevitesse')) {
    $qb->andWhere( $qb->expr()->like('u.boitevitesse', ':boitevitesse'))
    ->setParameter('boitevitesse', '%'. $filterForm->get('boitevitesse')->getData().'%');
}

if ($filterForm->has('chevaux')) {
    $qb->andWhere( $qb->expr()->like('u.chevaux', ':chevaux'))
        ->setParameter('chevaux', '%'. $filterForm->get('chevaux')->getData().'%');
}

return $qb->getQuery()->getResult();
}

public function myFindAll1()
  {
$qb = $this->createQueryBuilder('u')->Where('u.prix IS NOT NULL');
return $qb->getQuery()->getResult();
}

}