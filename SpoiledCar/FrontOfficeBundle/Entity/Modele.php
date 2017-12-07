<?php

namespace SpoiledCar\FrontOfficeBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;



/**
 * Modele

 */
class Modele
{
    /**
     * @var int

     */
    private $id;

    /**
     * @var string

     */
    private $nom;
    

    private $marque;
    

    private $voiture;

    public function __construct() {
        $this->voiture = new ArrayCollection();
    }
    
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Modele
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    public function __toString() {
    return $this->nom;
    
}
    /**
     * Add voiture
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture
     * @return Modele
     */
    public function addVoiture(\SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture)
    {
        $this->voiture[] = $voiture;

        return $this;
    }

    /**
     * Remove voiture
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture
     */
    public function removeVoiture(\SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture)
    {
        $this->voiture->removeElement($voiture);
    }

    /**
     * Get voiture
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVoiture()
    {
        return $this->voiture;
    }

    /**
     * Set marque
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Marque $marque
     * @return Modele
     */
    public function setMarque(\SpoiledCar\FrontOfficeBundle\Entity\Marque $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \SpoiledCar\FrontOfficeBundle\Entity\Marque 
     */
    public function getMarque()
    {
        return $this->marque;
    }

}
