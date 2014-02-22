<?php

namespace Amandine\MatriceCompetenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="competence")
 */
class Competence {
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id_competence;
	
	/**
     * @ORM\Column(type="string")
     */
	protected $intitule;

    /**
     * Get id_competence
     *
     * @return integer 
     */
    public function getIdCompetence()
    {
        return $this->id_competence;
    }

    /**
     * Set intitule
     *
     * @param \varchar $intitule
     * @return Competence
     */
    public function setIntitule($intitule)
    {
        $this->intitule = $intitule;

        return $this;
    }

    /**
     * Get intitule
     *
     * @return \varchar 
     */
    public function getIntitule()
    {
        return $this->intitule;
    }
}
