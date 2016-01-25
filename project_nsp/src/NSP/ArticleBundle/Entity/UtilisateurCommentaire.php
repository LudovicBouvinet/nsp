<?php

namespace NSP\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UtilisateurCommentaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NSP\ArticleBundle\Entity\UtilisateurCommentaireRepository")
 */
class UtilisateurCommentaire
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
     * @return UtilisateurCommentaire
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
    
    // Relations // 
    
       /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", inversedBy ="commentairesSignales", cascade={"persist"} )
   */
  private $utilisateur;
    
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Commentaire", inversedBy = "utilisateursSignaleurs", cascade={"persist"})
   */
  private $commentaire;

    /**
     * Set utilisateur
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $utilisateur
     *
     * @return UtilisateurCommentaire
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
     * Set commentaire
     *
     * @param \NSP\ArticleBundle\Entity\Commentaire $commentaire
     *
     * @return UtilisateurCommentaire
     */
    public function setCommentaire(\NSP\ArticleBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return \NSP\ArticleBundle\Entity\Commentaire
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}
