<?php

namespace SpoiledCar\FrontOfficeBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Inscription
 *
 * @ORM\Table(name="inscription")
 * @ORM\Entity(repositoryClass="SpoiledCar\FrontOfficeBundle\Repository\InscriptionRepository")
 */
class Inscription
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @Assert\Email(
     *     message = "Choisissez un E-Mail Valide.",
     *     checkMX = true
     * )
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;

    /**
     * @var string
     *
     * @Assert\Length(
     *      min = 8,
     *      max = 16,
     *      minMessage = "Le mot de passe dois ètre composè de 8 caractères au moins",
     *      maxMessage = "Le mot de passe dois ètre composè de 16 caractères au plus"
     * )
     * @ORM\Column(name="motdepasse", type="string", length=255)
     */
    private $motdepasse;

    /**
     * @var string
     *
     * @Assert\Length(
     *      max = 30,
     *      maxMessage = "Le nom dois ètre composè de 30 caractères au plus"
     * )
     * @ORM\Column(name="nomprenom", type="string", length=255)
     */
    private $nomprenom;

    /**
     * @var int
     *
     * @Assert\Length(
     *      min = 8,
     *      max = 8,
     *      minMessage = "Le numèro de telephone dois ètre composè de 8 caractères",
     *      maxMessage = "Le numèro de telephone dois ètre composè de 8 caractères"
     * )
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="sexe", type="string", length=255)
     */
    private $sexe;


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
     * Set mail
     *
     * @param string $mail
     * @return Inscription
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set motdepasse
     *
     * @param string $motdepasse
     * @return Inscription
     */
    public function setMotdepasse($motdepasse)
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    /**
     * Get motdepasse
     *
     * @return string 
     */
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }

    /**
     * Set nomprenom
     *
     * @param string $nomprenom
     * @return Inscription
     */
    public function setNomprenom($nomprenom)
    {
        $this->nomprenom = $nomprenom;

        return $this;
    }

    /**
     * Get nomprenom
     *
     * @return string 
     */
    public function getNomprenom()
    {
        return $this->nomprenom;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Inscription
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Inscription
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     * @return Inscription
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string 
     */
    public function getSexe()
    {
        return $this->sexe;
    }
}
