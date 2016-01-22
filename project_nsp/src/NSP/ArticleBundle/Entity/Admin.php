<?php

namespace NSP\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NSP\ArticleBundle\Entity\AdminRepository")
 */
class Admin
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
     * @ORM\Column(name="mdp", type="string", length=255)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=255)
     */
    private $mail;


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
     * Set mdp
     *
     * @param string $mdp
     *
     * @return Admin
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Admin
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
    
    
    // RELATIONS // 
    
  /**
   * @ORM\OneToOne(targetEntity="NSP\ArticleBundle\Entity\Photo", cascade={"persist"})
   */
  private $photo;

   /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Commentaire", mappedBy="admin")
   */
  private $commentaires; 
    
    
   /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", mappedBy="admin")
   */
  private $utilisateurs; 
    
   /**
   * @ORM\OneToMany(targetEntity="NSP\ArticleBundle\Entity\Notification", mappedBy="admin")
   */
  private $notifications; 
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commentaires = new \Doctrine\Common\Collections\ArrayCollection();
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
        $this->notifications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set photo
     *
     * @param \NSP\ArticleBundle\Entity\Photo $photo
     *
     * @return Admin
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
     * Add commentaire
     *
     * @param \NSP\ArticleBundle\Entity\Commentaire $commentaire
     *
     * @return Admin
     */
    public function addCommentaire(\NSP\ArticleBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \NSP\ArticleBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\NSP\ArticleBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaires->removeElement($commentaire);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

    /**
     * Add utilisateur
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $utilisateur
     *
     * @return Admin
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
     * Add notification
     *
     * @param \NSP\ArticleBundle\Entity\Notification $notification
     *
     * @return Admin
     */
    public function addNotification(\NSP\ArticleBundle\Entity\Notification $notification)
    {
        $this->notifications[] = $notification;

        return $this;
    }

    /**
     * Remove notification
     *
     * @param \NSP\ArticleBundle\Entity\Notification $notification
     */
    public function removeNotification(\NSP\ArticleBundle\Entity\Notification $notification)
    {
        $this->notifications->removeElement($notification);
    }

    /**
     * Get notifications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNotifications()
    {
        return $this->notifications;
    }
}
