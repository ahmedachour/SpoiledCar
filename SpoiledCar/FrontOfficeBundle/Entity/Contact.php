<?php

namespace SpoiledCar\FrontOfficeBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="SpoiledCar\FrontOfficeBundle\Repository\ContactRepository")
 */
class Contact
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
     * @Assert\Length(
     *      max = 30,
     *      maxMessage = "Le Sujet dois ètre composè de 30 caractères au plus"
     * )
     * @ORM\Column(name="sujet", type="string", length=30)
     */
    private $sujet;

    /**
     * @var string
     *
     * @Assert\Length(
     *      max = 30,
     *      maxMessage = "le nom doit ètre composè de 30 caractères au plus"
     * )
     * @ORM\Column(name="nomprenom", type="string", length=30)
     */
    private $nomprenom;

    /**
     * @var string
     *    
     * @Assert\Email(
     *     message = "Choisissez un E-Mail Valide.",
     *     checkMX = true
     * )
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

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
     * @var string
     *
     * @ORM\Column(name="commentaire", type="string", length=255)
     */
    private $commentaire;


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
     * Set sujet
     *
     * @param string $sujet
     * @return Contact
     */
    public function setSujet($sujet)
    {
        $this->sujet = $sujet;

        return $this;
    }

    /**
     * Get sujet
     *
     * @return string 
     */
    public function getSujet()
    {
        return $this->sujet;
    }

    /**
     * Set nomprenom
     *
     * @param string $nomprenom
     * @return Contact
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
     * Set email
     *
     * @param string $email
     * @return Contact
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Contact
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
     * Set commentaire
     *
     * @param string $commentaire
     * @return Contact
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string 
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}
