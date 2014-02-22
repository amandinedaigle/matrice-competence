<?php

namespace Amandine\MatriceCompetenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Personnel")
 */
class Personnel {
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $id_personnel;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $identifiant;

    /**
     
	* Get id_personnel
     *
     * @return integer 
     */
    
public function getIdPersonnel()
    {
        return $this->id_personnel;
    }

    /**
     * Set identifiant
     *
     * @param \varchar $identifiant
     * @return Personnel
     */
    public function setIdentifiant(\varchar $identifiant)
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * Get identifiant
     *
     * @return \varchar 
     */
    public function getIdentifiant()
    {
        return $this->identifiant;
    }
}
