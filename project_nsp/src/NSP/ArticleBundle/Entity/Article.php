<?php

namespace NSP\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NSP\ArticleBundle\Entity\ArticleRepository")
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="texteFirst", type="text")
     */
    private $texteFirst;

    /**
     * @var string
     *
     * @ORM\Column(name="texteSecond", type="text")
     */
    private $texteSecond;

    /**
     * @var string
     *
     * @ORM\Column(name="chapeau", type="text")
     */
    private $chapeau;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePublication", type="datetime")
     */
    private $datePublication;

    /**
     * @var boolean
     *
     * @ORM\Column(name="choixRedaction", type="boolean")
     */
    private $choixRedaction;
    
     /**
     * @var boolean
     *
     * @ORM\Column(name="publier", type="boolean")
     */
    private $publier;

    

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
     * Set titre
     *
     * @param string $titre
     *
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    

    /**
     * Set chapeau
     *
     * @param string $chapeau
     *
     * @return Article
     */
    public function setChapeau($chapeau)
    {
        $this->chapeau = $chapeau;

        return $this;
    }

    /**
     * Get chapeau
     *
     * @return string
     */
    public function getChapeau()
    {
        return $this->chapeau;
    }
    
      /**
     * Set texteFirst
     *
     * @param string $texteFirst
     *
     * @return Article
     */
    public function setTexteFirst($texteFirst)
    {
        $this->texteFirst = $texteFirst;

        return $this;
    }

    /**
     * Get texteFirst
     *
     * @return string
     */
    public function getTexteFirst()
    {
        return $this->texteFirst;
    }
    
          /**
     * Set texteSecond
     *
     * @param string $texteSecond
     *
     * @return Article
     */
    public function setTexteSecond($texteSecond)
    {
        $this->texteSecond = $texteSecond;

        return $this;
    }

    /**
     * Get texteSecond
     *
     * @return string
     */
    public function getTexteSecond()
    {
        return $this->texteSecond;
    }

    

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     *
     * @return Article
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set choixRedaction
     *
     * @param boolean $choixRedaction
     *
     * @return Article
     */
    public function setChoixRedaction($choixRedaction)
    {
        $this->choixRedaction = $choixRedaction;

        return $this;
    }

    /**
     * Get choixRedaction
     *
     * @return boolean
     */
    public function getChoixRedaction()
    {
        return $this->choixRedaction;
    }
    
    
    // RELATIONS // 
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Theme", inversedBy="articles", cascade={"persist"})
   */
  private $theme;
    
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Rubrique", inversedBy = "articles", cascade={"persist"})
   */
  private $rubrique;
    
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", inversedBy="articlesEcrits", cascade={"persist"})
   */
  private $utilisateur;
    
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", inversedBy ="articlesVerifies", cascade={"persist"})
   */
  private $modo;
    
   /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Photo", mappedBy="article", cascade={"persist"})
   */
  private $photos; 
    
       /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Commentaire", mappedBy="article")
   */
  private $commentaire; 
    
                  /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\UtilisateurArticle", mappedBy="article")
   */
  private $utilisateursNoteurs; 
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentaire = new \Doctrine\Common\Collections\ArrayCollection();
        $this->utilisateursNoteurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->datePublication = new \Datetime();
        $this->choixRedaction = false;
        $this->publier = false;
    }

    /**
     * Set theme
     *
     * @param \NSP\ArticleBundle\Entity\Theme $theme
     *
     * @return Article
     */
    public function setTheme(\NSP\ArticleBundle\Entity\Theme $theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return \NSP\ArticleBundle\Entity\Theme
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set rubrique
     *
     * @param \NSP\ArticleBundle\Entity\Rubrique $rubrique
     *
     * @return Article
     */
    public function setRubrique(\NSP\ArticleBundle\Entity\Rubrique $rubrique)
    {
        $this->rubrique = $rubrique;

        return $this;
    }

    /**
     * Get rubrique
     *
     * @return \NSP\ArticleBundle\Entity\Rubrique
     */
    public function getRubrique()
    {
        return $this->rubrique;
    }

    /**
     * Set utilisateur
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $utilisateur
     *
     * @return Article
     */
    public function setUtilisateur(\NSP\ArticleBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \NSP\ArticleBundle\Entity\Utilisateur
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set modo
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $modo
     *
     * @return Article
     */
    public function setModo(\NSP\ArticleBundle\Entity\Utilisateur $modo)
    {
        $this->modo = $modo;

        return $this;
    }

    /**
     * Get modo
     *
     * @return \NSP\ArticleBundle\Entity\Utilisateur
     */
    public function getModo()
    {
        return $this->modo;
    }

    /**
     * Add photo
     *
     * @param \NSP\ArticleBundle\Entity\Photo $photo
     *
     * @return Article
     */
    public function addPhoto(\NSP\ArticleBundle\Entity\Photo $photo)
    {
        $this->photos[] = $photo;

        return $this;
    }

    /**
     * Remove photo
     *
     * @param \NSP\ArticleBundle\Entity\Photo $photo
     */
    public function removePhoto(\NSP\ArticleBundle\Entity\Photo $photo)
    {
        $this->photos->removeElement($photo);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add commentaire
     *
     * @param \NSP\ArticleBundle\Entity\Commentaire $commentaire
     *
     * @return Article
     */
    public function addCommentaire(\NSP\ArticleBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \NSP\ArticleBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\NSP\ArticleBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire->removeElement($commentaire);
    }

    /**
     * Get commentaire
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Add utilisateursNoteur
     *
     * @param \NSP\ArticleBundle\Entity\UtilisateurArticle $utilisateursNoteur
     *
     * @return Article
     */
    public function addUtilisateursNoteur(\NSP\ArticleBundle\Entity\UtilisateurArticle $utilisateursNoteur)
    {
        $this->utilisateursNoteurs[] = $utilisateursNoteur;

        return $this;
    }

    /**
     * Remove utilisateursNoteur
     *
     * @param \NSP\ArticleBundle\Entity\UtilisateurArticle $utilisateursNoteur
     */
    public function removeUtilisateursNoteur(\NSP\ArticleBundle\Entity\UtilisateurArticle $utilisateursNoteur)
    {
        $this->utilisateursNoteurs->removeElement($utilisateursNoteur);
    }

    /**
     * Get utilisateursNoteurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateursNoteurs()
    {
        return $this->utilisateursNoteurs;
    }

    /**
     * Set publier
     *
     * @param boolean $publier
     *
     * @return Article
     */
    public function setPublier($publier)
    {
        $this->publier = $publier;

        return $this;
    }

    /**
     * Get publier
     *
     * @return boolean
     */
    public function getPublier()
    {
        return $this->publier;
    }
}
