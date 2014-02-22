<?php

namespace Amandine\MatriceCompetenceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categorie_competence")
 */
class CategorieCompetence {
	
	/**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
	protected $id_categorie;
	
	/**
     * @ORM\Column(type="string")
     */
	protected $intitule;

    /**
     * Get id_categorie
     *
     * @return integer 
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * Set intitule
     *
     * @param \varchar $intitule
     * @return CategorieCompetence
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
