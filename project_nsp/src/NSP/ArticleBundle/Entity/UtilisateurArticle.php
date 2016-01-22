<?php

namespace NSP\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UtilisateurArticle
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NSP\ArticleBundle\Entity\UtilisateurArticleRepository")
 */
class UtilisateurArticle
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
     * @var integer
     *
     * @ORM\Column(name="note", type="integer")
     */
    private $note;


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
     * Set note
     *
     * @param integer $note
     *
     * @return UtilisateurArticle
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer
     */
    public function getNote()
    {
        return $this->note;
    }
    
    // Relations //
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", inversedBy ="articlesNotes", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
  private $utilisateur;
    
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Article", inversedBy = "utilisateursNoteurs", cascade={"persist"})
   * @ORM\JoinColumn(nullable=false)
   */
  private $article;

    /**
     * Set utilisateur
     *
     * @param \NSP\ArticleBundle\Entity\Utilisateur $utilisateur
     *
     * @return UtilisateurArticle
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
     * Set article
     *
     * @param \NSP\ArticleBundle\Entity\Article $article
     *
     * @return UtilisateurArticle
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
}
