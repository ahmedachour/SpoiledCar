<?php

namespace SpoiledCar\FrontOfficeBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;



use Doctrine\ORM\Mapping as ORM;

/**
 * Voiture
 * @ORM\Table(name="voiture")
 * @ORM\Entity(repositoryClass="SpoiledCar\FrontOfficeBundle\Repository\VoitureRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Voiture
{
    /**
     * @var int
     */
    private $id;
    
    
    
    /**
     * @var integer
     * @Assert\Length(
     *      min = 3,
     *      max = 10,
     *      minMessage = "Saisissez un Prix Valide",
     *      maxMessage = "Saisissez un Prix Valide"
     * )
     */
    private $prix;
    
    private $user;

    private $nbrportes;
    
    private $intervention_User;

    private $marque;


    private $modele;


    /**
     * @var int
     * @Assert\Length(
     *      max = 8,
     *      maxMessage = "Kilometrage Incorrect > 8 Chiffres"
     * )
     */
    private $kilometrage;

    /**
     * @var \DateTime
     */
    private $anneecirculation;

    /**
     * @var string
     */
    private $style;

    /**
     * @var int
     */
    private $chevaux;

    /**
     * @var string
     */
    private $boitevitesse;

    /**
     * @var string
     * @Assert\Type(
     *      type="string",
     *      message="Ceci n'est pas une couleur"
     * )
     */
    private $couleur;
    /**
     * @var string
     */
    private $airbag;
    /**
     * @var string
     */
    private $systemedesecurite;    /**
     * @var string
     */
    private $climatisation;
    /**
     * @var string
     */
    private $roueenalliage;    /**
     * @var string
     */
    private $freinsabs;
    /**
     * @var string
     */
    private $antivol;
    /**
     * @var string
     */
    private $retroviseurselectrique;
    /**
     * @var string
     */
    private $directionassiste;
    /**
     * @var string
     */
    private $lecteurcd;
    /**
     * @var string
     */
    private $siegeelectrique;
    /**
     * @var string
     */
    private $vitreelectrique;
    /**
     * @var string
     */
    private $airbagconducteur;


    
    /**
     * @var string
     */
    private $description;
    
    /**
     * @var string
     */
    protected $path;
    
    /**
     * @Assert\File(maxSize="6000000")
     */    
    protected $file;

    /**
     * @var string
     */
    private $carraosserie;

    /**
     * @var string
     * @Assert\Length(
     *      min = 4,
     *      max = 30,
     *      minMessage = "Saisissez une Matricule Valide",
     *      maxMessage = "Saisissez une Matricule Valide"
     * )
     */
    private $matricule;

    /**
     * @var int
     * @Assert\Length(
     *      max = 8,
     *      maxMessage = "Kilometrage du dernier Vidange est Incorrect > 8 Chiffres"
     * )
     */
    private $kilometragederniervidange;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
public function __toString() {
    return $this->matricule;
    
}
    /**
     * Set kilometrage
     *
     * @param integer $kilometrage
     * @return Voiture
     */
    public function setKilometrage($kilometrage)
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    /**
     * Get kilometrage
     *
     * @return integer 
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * Set anneecirculation
     *
     * @param \string $anneecirculation
     * @return Voiture
     */
    public function setAnneecirculation($anneecirculation)
    {
        $this->anneecirculation = $anneecirculation;

        return $this;
    }

    /**
     * Get anneecirculation
     *
     * @return \string
     */
    public function getAnneecirculation()
    {
        return $this->anneecirculation;
    }

    /**
     * Set style
     *
     * @param string $style
     * @return Voiture
     */
    public function setStyle($style)
    {
        $this->style = $style;

        return $this;
    }

    /**
     * Get style
     *
     * @return string 
     */
    public function getStyle()
    {
        return $this->style;
    }

    /**
     * Set chevaux
     *
     * @param integer $chevaux
     * @return Voiture
     */
    public function setChevaux($chevaux)
    {
        $this->chevaux = $chevaux;

        return $this;
    }

    /**
     * Get chevaux
     *
     * @return integer 
     */
    public function getChevaux()
    {
        return $this->chevaux;
    }

    /**
     * Set boitevitesse
     *
     * @param string $boitevitesse
     * @return Voiture
     */
    public function setBoitevitesse($boitevitesse)
    {
        $this->boitevitesse = $boitevitesse;

        return $this;
    }

    /**
     * Get boitevitesse
     *
     * @return string 
     */
    public function getBoitevitesse()
    {
        return $this->boitevitesse;
    }

    /**
     * Set couleur
     *
     * @param string $couleur
     * @return Voiture
     */
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }

    /**
     * Get couleur
     *
     * @return string 
     */
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set carraosserie
     *
     * @param string $carraosserie
     * @return Voiture
     */
    public function setCarraosserie($carraosserie)
    {
        $this->carraosserie = $carraosserie;

        return $this;
    }

    /**
     * Get carraosserie
     *
     * @return string 
     */
    public function getCarraosserie()
    {
        return $this->carraosserie;
    }

    /**
     * Set matricule
     *
     * @param string $matricule
     * @return Voiture
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }

    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set kilometragederniervidange
     *
     * @param integer $kilometragederniervidange
     * @return Voiture
     */
    public function setKilometragederniervidange($kilometragederniervidange)
    {
        $this->kilometragederniervidange = $kilometragederniervidange;

        return $this;
    }

    /**
     * Get kilometragederniervidange
     *
     * @return integer 
     */
    public function getKilometragederniervidange()
    {
        return $this->kilometragederniervidange;
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
     * Set marque
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Marque $marque
     * @return Voiture
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

    /**
     * Set modele
     *
     * @param \SpoiledCar\FrontOfficeBundle\Entity\Modele $modele
     * @return Voiture
     */
    public function setModele(\SpoiledCar\FrontOfficeBundle\Entity\Modele $modele = null)
    {
        $this->modele = $modele;

        return $this;
    }

    /**
     * Get modele
     *
     * @return \SpoiledCar\FrontOfficeBundle\Entity\Modele 
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * Set nbrportes
     *
     * @param integer $nbrportes
     * @return Voiture
     */
    public function setNbrportes($nbrportes)
    {
        $this->nbrportes = $nbrportes;

        return $this;
    }

    /**
     * Get nbrportes
     *
     * @return integer 
     */
    public function getNbrportes()
    {
        return $this->nbrportes;
    }

    /**
     * Set airbag
     *
     * @param string $airbag
     * @return Voiture
     */
    public function setAirbag($airbag)
    {
        $this->airbag = $airbag;

        return $this;
    }

    /**
     * Get airbag
     *
     * @return string 
     */
    public function getAirbag()
    {
        return (boolean)$this->airbag;
    }

    /**
     * Set systemedesecurite
     *
     * @param string $systemedesecurite
     * @return Voiture
     */
    public function setSystemedesecurite($systemedesecurite)
    {
        $this->systemedesecurite = $systemedesecurite;

        return $this;
    }

    /**
     * Get systemedesecurite
     *
     * @return string 
     */
    public function getSystemedesecurite()
    {
        return (boolean)$this->systemedesecurite;
    }

    /**
     * Set climatisation
     *
     * @param string $climatisation
     * @return Voiture
     */
    public function setClimatisation($climatisation)
    {
        $this->climatisation = $climatisation;

        return $this;
    }

    /**
     * Get climatisation
     *
     * @return string 
     */
    public function getClimatisation()
    {
        return (boolean)$this->climatisation;
    }

    /**
     * Set roueenalliage
     *
     * @param string $roueenalliage
     * @return Voiture
     */
    public function setRoueenalliage($roueenalliage)
    {
        $this->roueenalliage = $roueenalliage;

        return $this;
    }

    /**
     * Get roueenalliage
     *
     * @return string 
     */
    public function getRoueenalliage()
    {
        return (boolean)$this->roueenalliage;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Voiture
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
     * Set airbagconducteur
     *
     * @param string $airbagconducteur
     * @return Voiture
     */
    public function setAirbagconducteur($airbagconducteur)
    {
        $this->airbagconducteur = $airbagconducteur;

        return $this;
    }

    /**
     * Get airbagconducteur
     *
     * @return string 
     */
    public function getAirbagconducteur()
    {
        return (boolean)$this->airbagconducteur;
    }

    /**
     * Set vitreelectrique
     *
     * @param string $vitreelectrique
     * @return Voiture
     */
    public function setVitreelectrique($vitreelectrique)
    {
        $this->vitreelectrique = $vitreelectrique;

        return $this;
    }

    /**
     * Get vitreelectrique
     *
     * @return string 
     */
    public function getVitreelectrique()
    {
        return (boolean)$this->vitreelectrique;
    }

    /**
     * Set siegeelectrique
     *
     * @param string $siegeelectrique
     * @return Voiture
     */
    public function setSiegeelectrique($siegeelectrique)
    {
        $this->siegeelectrique = $siegeelectrique;

        return $this;
    }

    /**
     * Get siegeelectrique
     *
     * @return string 
     */
    public function getSiegeelectrique()
    {
        return (boolean)$this->siegeelectrique;
    }

    /**
     * Set lecteurcd
     *
     * @param string $lecteurcd
     * @return Voiture
     */
    public function setLecteurcd($lecteurcd)
    {
        $this->lecteurcd = $lecteurcd;

        return $this;
    }

    /**
     * Get lecteurcd
     *
     * @return string 
     */
    public function getLecteurcd()
    {
        return (boolean)$this->lecteurcd;
    }

    /**
     * Set directionassiste
     *
     * @param string $directionassiste
     * @return Voiture
     */
    public function setDirectionassiste($directionassiste)
    {
        $this->directionassiste = $directionassiste;

        return $this;
    }

    /**
     * Get directionassiste
     *
     * @return string 
     */
    public function getDirectionassiste()
    {
        return (boolean)$this->directionassiste;
    }

    /**
     * Set retroviseurselectrique
     *
     * @param string $retroviseurselectrique
     * @return Voiture
     */
    public function setRetroviseurselectrique($retroviseurselectrique)
    {
        $this->retroviseurselectrique = $retroviseurselectrique;

        return $this;
    }

    /**
     * Get retroviseurselectrique
     *
     * @return string 
     */
    public function getRetroviseurselectrique()
    {
        return (boolean)$this->retroviseurselectrique;
    }

    /**
     * Set antivol
     *
     * @param string $antivol
     * @return Voiture
     */
    public function setAntivol($antivol)
    {
        $this->antivol = $antivol;

        return $this;
    }

    
    public function getPath()
    {
        return $this->path;
    }
    /**
     * Get antivol
     *
     * @return string 
     */
    public function getAntivol()
    {
        return (boolean)$this->antivol;
    }

    /**
     * Set freinsabs
     *
     * @param string $freinsabs
     * @return Voiture
     */
    public function setFreinsabs($freinsabs)
    {
        $this->freinsabs = $freinsabs;

        return $this;
    }

    /**
     * Get freinsabs
     *
     * @return string 
     */
    public function getFreinsabs()
    {
        return (boolean)$this->freinsabs;
    }
    
     public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }
        /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    public function upload()
{
    // the file property can be empty if the field is not required
    if (null === $this->getFile()) {
        return;
    }

    // use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the
    // target filename to move to
    $this->getFile()->move(
        $this->getUploadRootDir(),
        $this->getFile()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->path = $this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->file = null;
}

    /**
     * Set path
     *
     * @param string $path
     * @return Voiture
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
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
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }
}
