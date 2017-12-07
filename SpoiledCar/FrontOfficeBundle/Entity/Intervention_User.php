<?php

namespace SpoiledCar\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Intervention_User
 */
class Intervention_User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $description;
    
    private $prix;
    
    private $date;
    
    private $voiture;

    private $user;
    /**
     * @var int
     */
    private $step;

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
     * Set user
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\User $user
     * @return Voiture
     */
    public function setUser(\SpoiledCar\FrontOfficeBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \SpoiledCar\FrontOfficeBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
    
       /**
     * Set prix
     *
     * @param integer $prix
     * @return Voiture
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }
    /**
     * Set user
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture
     * @return Voiture
     */
    public function setVoiture(\SpoiledCar\FrontOfficeBundle\Entity\Voiture $Voiture = null)
    {
        $this->voiture = $Voiture;

        return $this;
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
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }
    
        /**
     * Set date
     *
     * @param \datetime $date
     * @return User
     */
    public function setDate(\datetime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \datetime 
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Set description
     *
     * @param string $description
     * @return Intervention_User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set step
     *
     * @param integer $step
     * @return Intervention_User
     */
    public function setStep($step)
    {
        $this->step = $step;

        return $this;
    }

    /**
     * Get step
     *
     * @return integer 
     */
    public function getStep()
    {
        return $this->step;
    }
}
