<?php

namespace SpoiledCar\FrontOfficeBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * Marque
 *

 */
class Marque
{
    /**
     * @var int

     */
    private $id;

    /**
     * @var string
     *
     */
    private $nomMarque;
        
    /**
     */
    private $modele;

    /**

     */
    private $voiture;

    public function __construct() {
        $this->modele = new ArrayCollection();
        $this->voiture = new ArrayCollection();

    }
    
public function __toString() {
    return $this->nomMarque;
    
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
     * Set nomMarque
     *
     * @param string $nomMarque
     * @return Marque
     */
    public function setNomMarque($nomMarque)
    {
        $this->nomMarque = $nomMarque;

        return $this;
    }

    /**
     * Get nomMarque
     *
     * @return string 
     */
    public function getNomMarque()
    {
        return $this->nomMarque;
    }

    /**
     * Add modele
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Modele $modele
     * @return Marque
     */
    public function addModele(\SpoiledCar\FrontOfficeBundle\Entity\Modele $modele)
    {
        $this->modele[] = $modele;

        return $this;
    }

    /**
     * Remove modele
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Modele $modele
     */
    public function removeModele(\SpoiledCar\FrontOfficeBundle\Entity\Modele $modele)
    {
        $this->modele->removeElement($modele);
    }

    /**
     * Get modele
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Add voiture
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture
     * @return Marque
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
}
