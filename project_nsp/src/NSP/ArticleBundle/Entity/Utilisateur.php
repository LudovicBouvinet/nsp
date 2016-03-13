<?php

namespace NSP\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NSP\ArticleBundle\Entity\UtilisateurRepository")
 */
class Utilisateur extends BaseUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date")
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="lienPhoto", type="string", length=255)
     */
    private $lienPhoto;

    /**
     * @var string
     *
     * @ORM\Column(name="grade", type="string", length=255)
     */
    private $grade;

    /**
     * @var boolean
     *
     * @ORM\Column(name="modo", type="boolean")
     */
    private $modo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="newsletter", type="boolean")
     */
    private $newsletter;

    /**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;


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
     *
     * @return Utilisateur
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

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Utilisateur
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set lienPhoto
     *
     * @param string $lienPhoto
     *
     * @return Utilisateur
     */
    public function setLienPhoto($lienPhoto)
    {
        $this->lienPhoto = $lienPhoto;

        return $this;
    }

    /**
     * Get lienPhoto
     *
     * @return string
     */
    public function getLienPhoto()
    {
        return $this->lienPhoto;
    }

    /**
     * Set grade
     *
     * @param string $grade
     *
     * @return Utilisateur
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return string
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set modo
     *
     * @param boolean $modo
     *
     * @return Utilisateur
     */
    public function setModo($modo)
    {
        $this->modo = $modo;

        return $this;
    }

    /**
     * Get modo
     *
     * @return boolean
     */
    public function getModo()
    {
        return $this->modo;
    }

    /**
     * Set newsletter
     *
     * @param boolean $newsletter
     *
     * @return Utilisateur
     */
    public function setNewsletter($newsletter)
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * Get newsletter
     *
     * @return boolean
     */
    public function getNewsletter()
    {
        return $this->newsletter;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Utilisateur
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }
    
    // Relations // 
    /**
   * @ORM\OneToOne(targetEntity="NSP\ArticleBundle\Entity\Photo", cascade={"persist"})
   */
    private $photo;
    
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Admin", inversedBy = "utilisateurs", cascade={"persist"})
   */
  private $admin;
    
          /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Article", mappedBy="utilisateur")
   */
  private $articlesEcrits; 
    
              /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Article", mappedBy="modo")
   */
  private $articlesVerifies; 
    
                  /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\UtilisateurArticle", mappedBy="utilisateur")
   */
  private $articlesNotes; 
    
    /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Photo", mappedBy="utilisateur")
   */
  private $photos; 
    
    /**
   * @ORM\ManyToMany(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", mappedBy="utilisateurs", cascade={"persist"})
   */
  private $rubriques;
    
    /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Commentaire", mappedBy="utilisateur")
   */
  private $commentairesEcrits; 
    
        /**
   * @ORM\ManyToMany(targetEntity="NSP\ArticleBundle\Entity\Commentaire", mappedBy="utilisateurs")
   */
  private $commentairesModifies; 
    
          /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\UtilisateurCommentaire", mappedBy="utilisateur")
   */
  private $commentairesSignales; 
    
   /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Notification", mappedBy="emetteur")
   */
  private $notificationsEmises; 
    
       /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Notification", mappedBy="destinataire")
   */
  private $notificationsRecues; 
    
   /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Message", mappedBy="emetteur")
   */
  private $MessagesEmis; 
    
   /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Message", mappedBy="destinataire")
   */
  private $MessagesRecus; 
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->articlesEcrits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->articlesVerifies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->articlesNotes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->rubriques = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentairesEcrits = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentairesModifies = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commentairesSignales = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notificationsEmises = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notificationsRecues = new \Doctrine\Common\Collections\ArrayCollection();
        $this->MessagesEmis = new \Doctrine\Common\Collections\ArrayCollection();
        $this->MessagesRecus = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set photo
     *
     * @param \NSP\ArticleBundle\Entity\Photo $photo
     *
     * @return Utilisateur
     */
    public function setPhoto(\NSP\ArticleBundle\Entity\Photo $photo = null)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return \NSP\ArticleBundle\Entity\Photo
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set admin
     *
     * @param \NSP\ArticleBundle\Entity\Admin $admin
     *
     * @return Utilisateur
     */
    public function setAdmin(\NSP\ArticleBundle\Entity\Admin $admin = null)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return \NSP\ArticleBundle\Entity\Admin
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Add articlesEcrit
     *
     * @param \NSP\ArticleBundle\Entity\Article $articlesEcrit
     *
     * @return Utilisateur
     */
    public function addArticlesEcrit(\NSP\ArticleBundle\Entity\Article $articlesEcrit)
    {
        $this->articlesEcrits[] = $articlesEcrit;

        return $this;
    }

    /**
     * Remove articlesEcrit
     *
     * @param \NSP\ArticleBundle\Entity\Article $articlesEcrit
     */
    public function removeArticlesEcrit(\NSP\ArticleBundle\Entity\Article $articlesEcrit)
    {
        $this->articlesEcrits->removeElement($articlesEcrit);
    }

    /**
     * Get articlesEcrits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticlesEcrits()
    {
        return $this->articlesEcrits;
    }

    /**
     * Add articlesVerify
     *
     * @param \NSP\ArticleBundle\Entity\Article $articlesVerify
     *
     * @return Utilisateur
     */
    public function addArticlesVerify(\NSP\ArticleBundle\Entity\Article $articlesVerify)
    {
        $this->articlesVerifies[] = $articlesVerify;

        return $this;
    }

    /**
     * Remove articlesVerify
     *
     * @param \NSP\ArticleBundle\Entity\Article $articlesVerify
     */
    public function removeArticlesVerify(\NSP\ArticleBundle\Entity\Article $articlesVerify)
    {
        $this->articlesVerifies->removeElement($articlesVerify);
    }

    /**
     * Get articlesVerifies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticlesVerifies()
    {
        return $this->articlesVerifies;
    }

    /**
     * Add articlesNote
     *
     * @param \NSP\ArticleBundle\Entity\UtilisateurArticle $articlesNote
     *
     * @return Utilisateur
     */
    public function addArticlesNote(\NSP\ArticleBundle\Entity\UtilisateurArticle $articlesNote)
    {
        $this->articlesNotes[] = $articlesNote;

        return $this;
    }

    /**
     * Remove articlesNote
     *
     * @param \NSP\ArticleBundle\Entity\UtilisateurArticle $articlesNote
     */
    public function removeArticlesNote(\NSP\ArticleBundle\Entity\UtilisateurArticle $articlesNote)
    {
        $this->articlesNotes->removeElement($articlesNote);
    }

    /**
     * Get articlesNotes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticlesNotes()
    {
        return $this->articlesNotes;
    }

    /**
     * Add photo
     *
     * @param \NSP\ArticleBundle\Entity\Photo $photo
     *
     * @return Utilisateur
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
     * Add rubrique
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $rubrique
     *
     * @return Utilisateur
     */
    public function addRubrique(\NSP\ArticleBundle\Entity\Utilisateur $rubrique)
    {
        $this->rubriques[] = $rubrique;

        return $this;
    }

    /**
     * Remove rubrique
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $rubrique
     */
    public function removeRubrique(\NSP\ArticleBundle\Entity\Utilisateur $rubrique)
    {
        $this->rubriques->removeElement($rubrique);
    }

    /**
     * Get rubriques
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRubriques()
    {
        return $this->rubriques;
    }

    /**
     * Add commentairesEcrit
     *
     * @param \NSP\ArticleBundle\Entity\Commentaire $commentairesEcrit
     *
     * @return Utilisateur
     */
    public function addCommentairesEcrit(\NSP\ArticleBundle\Entity\Commentaire $commentairesEcrit)
    {
        $this->commentairesEcrits[] = $commentairesEcrit;

        return $this;
    }

    /**
     * Remove commentairesEcrit
     *
     * @param \NSP\ArticleBundle\Entity\Commentaire $commentairesEcrit
     */
    public function removeCommentairesEcrit(\NSP\ArticleBundle\Entity\Commentaire $commentairesEcrit)
    {
        $this->commentairesEcrits->removeElement($commentairesEcrit);
    }

    /**
     * Get commentairesEcrits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentairesEcrits()
    {
        return $this->commentairesEcrits;
    }

    /**
     * Add commentairesModify
     *
     * @param \NSP\ArticleBundle\Entity\Commentaire $commentairesModify
     *
     * @return Utilisateur
     */
    public function addCommentairesModify(\NSP\ArticleBundle\Entity\Commentaire $commentairesModify)
    {
        $this->commentairesModifies[] = $commentairesModify;

        return $this;
    }

    /**
     * Remove commentairesModify
     *
     * @param \NSP\ArticleBundle\Entity\Commentaire $commentairesModify
     */
    public function removeCommentairesModify(\NSP\ArticleBundle\Entity\Commentaire $commentairesModify)
    {
        $this->commentairesModifies->removeElement($commentairesModify);
    }

    /**
     * Get commentairesModifies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentairesModifies()
    {
        return $this->commentairesModifies;
    }

    /**
     * Add commentairesSignale
     *
     * @param \NSP\ArticleBundle\Entity\UtilisateurCommentaire $commentairesSignale
     *
     * @return Utilisateur
     */
    public function addCommentairesSignale(\NSP\ArticleBundle\Entity\UtilisateurCommentaire $commentairesSignale)
    {
        $this->commentairesSignales[] = $commentairesSignale;

        return $this;
    }

    /**
     * Remove commentairesSignale
     *
     * @param \NSP\ArticleBundle\Entity\UtilisateurCommentaire $commentairesSignale
     */
    public function removeCommentairesSignale(\NSP\ArticleBundle\Entity\UtilisateurCommentaire $commentairesSignale)
    {
        $this->commentairesSignales->removeElement($commentairesSignale);
    }

    /**
     * Get commentairesSignales
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentairesSignales()
    {
        return $this->commentairesSignales;
    }

    /**
     * Add notificationsEmise
     *
     * @param \NSP\ArticleBundle\Entity\Notification $notificationsEmise
     *
     * @return Utilisateur
     */
    public function addNotificationsEmise(\NSP\ArticleBundle\Entity\Notification $notificationsEmise)
    {
        $this->notificationsEmises[] = $notificationsEmise;

        return $this;
    }

    /**
     * Remove notificationsEmise
     *
     * @param \NSP\ArticleBundle\Entity\Notification $notificationsEmise
     */
    public function removeNotificationsEmise(\NSP\ArticleBundle\Entity\Notification $notificationsEmise)
    {
        $this->notificationsEmises->removeElement($notificationsEmise);
    }

    /**
     * Get notificationsEmises
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotificationsEmises()
    {
        return $this->notificationsEmises;
    }

    /**
     * Add notificationsRecue
     *
     * @param \NSP\ArticleBundle\Entity\Notification $notificationsRecue
     *
     * @return Utilisateur
     */
    public function addNotificationsRecue(\NSP\ArticleBundle\Entity\Notification $notificationsRecue)
    {
        $this->notificationsRecues[] = $notificationsRecue;

        return $this;
    }

    /**
     * Remove notificationsRecue
     *
     * @param \NSP\ArticleBundle\Entity\Notification $notificationsRecue
     */
    public function removeNotificationsRecue(\NSP\ArticleBundle\Entity\Notification $notificationsRecue)
    {
        $this->notificationsRecues->removeElement($notificationsRecue);
    }

    /**
     * Get notificationsRecues
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotificationsRecues()
    {
        return $this->notificationsRecues;
    }

    /**
     * Add messagesEmi
     *
     * @param \NSP\ArticleBundle\Entity\Message $messagesEmi
     *
     * @return Utilisateur
     */
    public function addMessagesEmi(\NSP\ArticleBundle\Entity\Message $messagesEmi)
    {
        $this->MessagesEmis[] = $messagesEmi;

        return $this;
    }

    /**
     * Remove messagesEmi
     *
     * @param \NSP\ArticleBundle\Entity\Message $messagesEmi
     */
    public function removeMessagesEmi(\NSP\ArticleBundle\Entity\Message $messagesEmi)
    {
        $this->MessagesEmis->removeElement($messagesEmi);
    }

    /**
     * Get messagesEmis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessagesEmis()
    {
        return $this->MessagesEmis;
    }

    /**
     * Add messagesRecus
     *
     * @param \NSP\ArticleBundle\Entity\Message $messagesRecus
     *
     * @return Utilisateur
     */
    public function addMessagesRecus(\NSP\ArticleBundle\Entity\Message $messagesRecus)
    {
        $this->MessagesRecus[] = $messagesRecus;

        return $this;
    }

    /**
     * Remove messagesRecus
     *
     * @param \NSP\ArticleBundle\Entity\Message $messagesRecus
     */
    public function removeMessagesRecus(\NSP\ArticleBundle\Entity\Message $messagesRecus)
    {
        $this->MessagesRecus->removeElement($messagesRecus);
    }

    /**
     * Get messagesRecus
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMessagesRecus()
    {
        return $this->MessagesRecus;
    }
}
