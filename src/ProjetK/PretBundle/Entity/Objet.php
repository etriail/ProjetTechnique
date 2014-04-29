<?php

namespace ProjetK\PretBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Objet
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProjetK\PretBundle\Entity\ObjetRepository")
 */
class Objet
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
	 * @ORM\ManyToOne(targetEntity="ProjetK\UserBundle\Entity\User", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
	 */
	 private $proprietaire;

	/**
     * @var string
     *
     * @ORM\Column(name="statut", type="string", length=255)
     */
    private $statut;
	
	/**
     * @ORM\OneToOne(targetEntity="ProjetK\PretBundle\Entity\Transaction", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=true)
     */
    private $transaction;

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
     * Set libelle
     *
     * @param string $libelle
     * @return Objet
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Objet
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set proprietaire
     *
     * @param string $proprietaire
     * @return string
     */
    public function setProprietaire($proprietaire)
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    /**
     * Get proprietaire
     *
     * @return string
     */
    public function getProprietaire()
    {
        return $this->proprietaire;
    }
	
	/**
     * Set statut
     *
     * @param string $proprietaire
     * @return string
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
	
	 /**
     * Set transaction
     *
     * @param ProjetK\PretBundle\Entity\Transaction $transaction
     * @return Objet
     */
    public function setTransaction(\ProjetK\PretBundle\Entity\Transaction $transaction = null)
    {
        $this->transaction = $transaction;

        return $this;
    }

    /**
     * Get transaction
     *
     * @return ProjetK\PretBundle\Entity\Transaction
     */
    public function getTransaction()
    {
        return $this->transaction;
    }
}
