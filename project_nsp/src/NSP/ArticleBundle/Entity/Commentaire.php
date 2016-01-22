<?php

namespace NSP\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NSP\ArticleBundle\Entity\CommentaireRepository")
 */
class Commentaire
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
     * @ORM\Column(name="texte", type="text")
     */
    private $texte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;


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
     * Set texte
     *
     * @param string $texte
     *
     * @return Commentaire
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Commentaire
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
    
    // Relation // 
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Article", inversedBy ="commentaires", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
  private $article;
    
       /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", inversedBy="commentairesEcrits", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
  private $utilisateur;
    
   /**
   * @ORM\ManyToMany(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", inversedBy = "commentairesModifies", cascade={"persist"})
   */
  private $utilisateurs;
    
           /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Admin", inversedBy ="commentaires", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
  private $admin;
    
          /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\UtilisateurCommentaire", mappedBy="commentaire")
   */
  private $utilisateursSignaleurs; 
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->utilisateursSignaleurs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set article
     *
     * @param \NSP\ArticleBundle\Entity\Article $article
     *
     * @return Commentaire
     */
    public function setArticle(\NSP\ArticleBundle\Entity\Article $article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \NSP\ArticleBundle\Entity\Article
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set utilisateur
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $utilisateur
     *
     * @return Commentaire
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
     * Add utilisateur
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $utilisateur
     *
     * @return Commentaire
     */
    public function addUtilisateur(\NSP\ArticleBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs[] = $utilisateur;

        return $this;
    }

    /**
     * Remove utilisateur
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $utilisateur
     */
    public function removeUtilisateur(\NSP\ArticleBundle\Entity\Utilisateur $utilisateur)
    {
        $this->utilisateurs->removeElement($utilisateur);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }

    /**
     * Set admin
     *
     * @param \NSP\ArticleBundle\Entity\Admin $admin
     *
     * @return Commentaire
     */
    public function setAdmin(\NSP\ArticleBundle\Entity\Admin $admin)
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
     * Add utilisateursSignaleur
     *
     * @param \NSP\ArticleBundle\Entity\UtilisateurCommentaire $utilisateursSignaleur
     *
     * @return Commentaire
     */
    public function addUtilisateursSignaleur(\NSP\ArticleBundle\Entity\UtilisateurCommentaire $utilisateursSignaleur)
    {
        $this->utilisateursSignaleurs[] = $utilisateursSignaleur;

        return $this;
    }

    /**
     * Remove utilisateursSignaleur
     *
     * @param \NSP\ArticleBundle\Entity\UtilisateurCommentaire $utilisateursSignaleur
     */
    public function removeUtilisateursSignaleur(\NSP\ArticleBundle\Entity\UtilisateurCommentaire $utilisateursSignaleur)
    {
        $this->utilisateursSignaleurs->removeElement($utilisateursSignaleur);
    }

    /**
     * Get utilisateursSignaleurs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUtilisateursSignaleurs()
    {
        return $this->utilisateursSignaleurs;
    }
}
