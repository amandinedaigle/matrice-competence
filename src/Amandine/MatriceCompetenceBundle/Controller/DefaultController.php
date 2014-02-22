<?php

namespace Amandine\MatriceCompetenceBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Amandine\MatriceCompetenceBundle\Entity\Competence;
use Amandine\MatriceCompetenceBundle\Form\Type\ComptenceType;
/**
     * @Route("/", name="_listecompetence")
     * @Template()
     */
class DefaultController extends Controller
{
	/**
     * @Route("/liste", name="_listecompetence")
     * @Template()
     */
    public function indexAction()
    {
    	/* recuperation de la liste de l'ensemble des competences de tout le monde */
    	$listeCompetences = $this->getDoctrine()
        ->getRepository('AmandineMatriceCompetenceBundle:Competence')
        ->findAll();

	    if (!$listeCompetences) {
	        throw $this->createNotFoundException('Aucune competence listé pour l\'instant');
	    } else { 
	    	//print_r($listeCompetences);
	    }
    	
    	/*$listeCompetence[0]['identifiant'] = 'Toto';
		$listeCompetence[0]['cat_competence'] = 'Ressources Humaines';
		$listeCompetence[0]['competence'] = 'Ecoute';*/
    	
        return $this->render('AmandineMatriceCompetenceBundle:Default:index.html.twig', array('listeCompetences' => $listeCompetences));
    }
	
	/**
     * @Route("/add_form", name="addForm")
     * @Template("AmandineMatriceCompetenceBundle:Default:formCompetence.html.twig")
     */
	public function addFormAction(){
			
		// creation du formulaire d'ajout de competence
		$competence = new Competence();
		$competence->setIntitule('Langues');
		
		$form = $this->createFormBuilder($competence)
		->add('intitule', 'text')
		->getForm();
		
		return array('form' => $form->createView());
	}
	
	/**
     * @Route("/add", name="_add")
     * @Template("AmandineMatriceCompetenceBundle:Default:formCompetence.html.twig")
     */
	public function addAction(){
			
		$request = $this->get('request');
		$competence = new Competence();
		$form = $this->get('form.factory')->create(new CompetenceType(), $competence);
		
		// recupération des données du formulaire envoyé
		if ('POST' === $request->getMethod()) {
			$form->bindRequest($request);
			if ($form->isValid()) {
			
				$em = $this->getDoctrine()->getManager();
			    $em->persist($competence);
			    $em->flush();
				
				return $this->redirect($this->generateUrl('_listecompetence'));
			}else{
				return new Response('formulaire non valide');	
			}
			
		}else{
			return new Response('Données non envoyées ');	
		}
		
	}
	
	/**
     * @Route("/edit/{competenceId}", name="_editcompetence")
     * @Template("AmandineMatriceCompetenceBundle:Default:formCompetence.html.twig")
     */
	public function editAction($competenceId){
				
		/* modification d'une compétence */	
			
		
		return new Response('Id de la compétence créé : '.$competence->getId());
	}
	
	/**
     * @Route("/update", name="_majcompetence")
     * @Template()
     */
	public function UpdateAction($competence,$cat_competence){
		
		
	}
	
	/**
     * @Route("/del", name="_deletecompetence")
     * @Template()
     */
	public function RemoveAction($competence){
		
		
	}
	
	
	/**
     * @Route("/login", name="_login")
     * @Template()
     */
    public function loginAction(Request $request)
    {
    	echo 'hop';
		die();
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $request->getSession()->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return array(
            'last_username' => $request->getSession()->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        );
    }

    /**
     * @Route("/login_check", name="_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/logout", name="_demo_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request
    }
}
