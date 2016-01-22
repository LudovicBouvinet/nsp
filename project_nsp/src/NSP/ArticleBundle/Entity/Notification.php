<?php

namespace NSP\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Notification
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
     * @ORM\Column(name="motif", type="string", length=255)
     */
    private $motif;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;


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
     * Set motif
     *
     * @param string $motif
     *
     * @return Notification
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Notification
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Notification
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
     * Set etat
     *
     * @param string $etat
     *
     * @return Notification
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }
    
    // Relations // 
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Admin", inversedBy="notifications", cascade={"persist"})
   */
  private $admin;
    
       /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", inversedBy = "notifcationsEmises", cascade={"persist"})
   */
  private $emetteur;
    
           /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", inversedBy = "notificationsRecues", cascade={"persist"})
   */
  private $destinataire;
    
    

    /**
     * Set admin
     *
     * @param \NSP\ArticleBundle\Entity\Admin $admin
     *
     * @return Notification
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
     * Set emetteur
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $emetteur
     *
     * @return Notification
     */
    public function setEmetteur(\NSP\ArticleBundle\Entity\Utilisateur $emetteur = null)
    {
        $this->emetteur = $emetteur;

        return $this;
    }

    /**
     * Get emetteur
     *
     * @return \NSP\ArticleBundle\Entity\Utilisateur
     */
    public function getEmetteur()
    {
        return $this->emetteur;
    }

    /**
     * Set destinataire
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $destinataire
     *
     * @return Notification
     */
    public function setDestinataire(\NSP\ArticleBundle\Entity\Utilisateur $destinataire = null)
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    /**
     * Get destinataire
     *
     * @return \NSP\ArticleBundle\Entity\Utilisateur
     */
    public function getDestinataire()
    {
        return $this->destinataire;
    }
}
