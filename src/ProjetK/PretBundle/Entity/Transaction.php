<?php

namespace ProjetK\PretBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProjetK\PretBundle\Entity\TransactionRepository")
 */
class Transaction
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
     * @var \DateTime
     *
     * @ORM\Column(name="date_pret", type="date")
     */
    private $datePret;

    /**
     * @var string
     *
     * @ORM\Column(name="emprunteur", type="string", length=255)
     */
    private $emprunteur;

    /**
     * @ORM\OneToOne(targetEntity="ProjetK\PretBundle\Entity\Objet", cascade={"persist"})
	 * @ORM\JoinColumn(nullable=false)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="preteur", type="string", length=255)
     */
    private $preteur;


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
     * Set datePret
     *
     * @param \DateTime $datePret
     * @return Transaction
     */
    public function setDatePret($datePret)
    {
        $this->datePret = $datePret;

        return $this;
    }

    /**
     * Get datePret
     *
     * @return \DateTime 
     */
    public function getDatePret()
    {
        return $this->datePret;
    }

    /**
     * Set emprunteur
     *
     * @param string $emprunteur
     * @return Transaction
     */
    public function setEmprunteur($emprunteur)
    {
        $this->emprunteur = $emprunteur;

        return $this;
    }

    /**
     * Get emprunteur
     *
     * @return string 
     */
    public function getEmprunteur()
    {
        return $this->emprunteur;
    }
	
	    /**
     * Set preteur
     *
     * @param string $preteur
     * @return Transaction
     */
    public function setPreteur($preteur)
    {
        $this->preteur = $preteur;

        return $this;
    }

    /**
     * Get preteur
     *
     * @return string 
     */
    public function getPreteur()
    {
        return $this->preteur;
    }

    /**
     * Set objet
     *
     * @param ProjetK\PretBundle\Entity\Objet $objet
     * @return Transaction
     */
    public function setObjet(\ProjetK\PretBundle\Entity\Objet $objet = null)
    {
        $this->objet = $objet;

        return $this;
    }

    /**
     * Get objet
     *
     * @return ProjetK\PretBundle\Entity\Objet
     */
    public function getObjet()
    {
        return $this->objet;
    }
}