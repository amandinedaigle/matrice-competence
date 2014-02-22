<?php 

namespace Amandine\MatriceCompetenceBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ComptenceType extends AbstractType{
	
	public function buildForm(FormBuilder $builder,array $options){
		$builder->add('intitule');	
	}
	
	public function getDefaultOptions(array $options)
	{
		return array(
			'data_class' => 'Amandine\MatriceCompetencekBundle\Entity\Competence',
		);
	}

	public function getName()
	{
		return 'Competence';
	}
}
