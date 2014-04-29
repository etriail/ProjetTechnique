<?php

namespace ProjetK\UserBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ProjetK\UserBundle\Entity\UserRepository")
 */
class User extends BaseUser
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
	   * @ORM\OneToMany(targetEntity="ProjetK\PretBundle\Entity\Objet", mappedBy="user")
	   */
	  private $objets;
	  
	public function _construct()
	{
		$this->objets=new \Doctrine\Common\Collections\ArrayCollection(); 
	}  

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
	   * @param ProjetK\PretBundle\Entity\Objet $objet
	   * @return Article
	   */
	  public function addObjet(\ProjetK\PretBundle\Entity\Objet $objet)
	  {
	    $this->objets[] = $objet;
	    return $this;
	  }
	
	  /**
	   * @param ProjetK\PretBundle\Entity\Objet $objet
	   */
	  public function removeObjet(\ProjetK\PretBundle\Entity\Objet $objet)
	  {
	    $this->objets->removeElement($objet);
	  }
	
	  /**
	   * @return Doctrine\Common\Collections\Collection
	   */
	  public function getObjets()
	  {
	    return $this->objets;
	  }
	}
