<?php

namespace NSP\ArticleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Photo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="NSP\ArticleBundle\Entity\PhotoRepository")
 */
class Photo
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
     * @ORM\Column(name="fichier", type="string", length=255)
     */
    private $fichier;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255)
     */
    private $source;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     */
    private $format;


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
     * Set fichier
     *
     * @param string $fichier
     *
     * @return Photo
     */
    public function setFichier($fichier)
    {
        $this->fichier = $fichier;

        return $this;
    }

    /**
     * Get fichier
     *
     * @return string
     */
    public function getFichier()
    {
        return $this->fichier;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Photo
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set format
     *
     * @param string $format
     *
     * @return Photo
     */
    public function setFormat($format)
    {
        $this->format = $format;

        return $this;
    }

    /**
     * Get format
     *
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }
    
    //Relation // 
   /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Article", inversedBy ="photos", cascade={"persist"})
   */
  private $article;
    
       /**
   * @ORM\ManyToOne(targetEntity="NSP\ArticleBundle\Entity\Utilisateur", inversedBy = "photos", cascade={"persist"})
   */
  private $utilisateur;

    /**
     * Set article
     *
     * @param \NSP\ArticleBundle\Entity\Article $article
     *
     * @return Photo
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
     * @return Photo
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
}
