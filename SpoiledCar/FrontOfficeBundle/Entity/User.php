<?php

// src/SpoiledCar/FrontOfficeBundle/Entity/User.php

namespace SpoiledCar\FrontOfficeBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $sexe;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Length(
     *      min = 8,
     *      max = 8,
     *      minMessage = "Le numèro de telephone dois ètre composè de 8 caractères",
     *      maxMessage = "Le numèro de telephone dois ètre composè de 8 caractères"
     * )
     */
    protected $telephone;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(
     *      max = 30,
     *      maxMessage = "Le mot de passe dois ètre composè de 30 caractères au plus"
     * )
     */
    protected $nomprenom;
    private $voiture;
    private $Intervention_User;

    public function __construct() {
        $this->voiture = new ArrayCollection();
        $this->Intervention_User = new ArrayCollection();

        parent::__construct();
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return User
     */
    public function setSexe($sexe) {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe() {
        return $this->sexe;
    }

    /**
     * Set date
     *
     * @param \datetime $date
     * @return User
     */
    public function setDate(\datetime $date) {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \datetime 
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return User
     */
    public function setTelephone($telephone) {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone() {
        return $this->telephone;
    }

    /**
     * Set nomprenom
     *
     * @param string $nomprenom
     * @return User
     */
    public function setNomprenom($nomprenom) {
        $this->nomprenom = $nomprenom;

        return $this;
    }

    /**
     * Get nomprenom
     *
     * @return string 
     */
    public function getNomprenom() {
        return $this->nomprenom;
    }
        /**
     * Add voiture
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture
     * @return User
     */
    public function addVoiture(\SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture) {
        $this->voiture[] = $voiture;

        return $this;
    }

    /**
     * Remove voiture
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture
     */
    public function removeVoiture(\SpoiledCar\FrontOfficeBundle\Entity\Voiture $voiture) {
        $this->voiture->removeElement($voiture);
    }

    /**
     * Get voiture
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVoiture() {

        return $this->voiture;
    }

    
    
    /**
     * Get expiresAt
     *
     * @return \DateTime 
     */
    public function getExpiresAt() {
        return $this->expiresAt;
    }

    /**
     * Get credentials_expire_at
     *
     * @return \DateTime 
     */
    public function getCredentialsExpireAt() {
        return $this->credentialsExpireAt;
    }

    /**
     * Add Intervention_User 
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Intervention_User $Intervention_User
     * @return User
     */
    public function addIntervention_User(\SpoiledCar\FrontOfficeBundle\Entity\Intervention_User $Intervention_User) {
        $this->Intervention_User[] = $Intervention_User;

        return $this;
    }

    /**
     * Remove $Intervention_User
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Intervention_User $Intervention_User
     */
    public function removeIntervention_User(\SpoiledCar\FrontOfficeBundle\Entity\Intervention_User $Intervention_User) {
        $this->Intervention_User->removeElement($Intervention_User);
    }

    /**
     * Get Intervention_User
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIntervention_User() {
        return $this->Intervention_User;
    }

}
