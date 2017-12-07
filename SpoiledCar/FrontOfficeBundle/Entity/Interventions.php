<?php

namespace SpoiledCar\FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Interventions
 */
class Interventions
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $interventions;

    /**
     * @var integer
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
     * Set interventions
     *
     * @param string $interventions
     * @return Interventions
     */
    public function setInterventions($interventions)
    {
        $this->interventions = $interventions;

        return $this;
    }

    /**
     * Get interventions
     *
     * @return string 
     */
    public function getInterventions()
    {
        return $this->interventions;
    }

    /**
     * Set step
     *
     * @param integer $step
     * @return Interventions
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
