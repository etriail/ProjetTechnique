<?php

namespace ProjetK\PretBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Response;
use ProjetK\PretBundle\Entity\Objet;
use ProjetK\PretBundle\Entity\Transaction;
use ProjetK\PretBundle\Form\ObjetType;
use ProjetK\PretBundle\Form\TransactionType;

class ObjetController extends Controller
{
	/*public function __construct()
    {
      $this->proprietaire = $this->get('security.context')->getToken()->getUser();
      $this->statut="possede";
    }*/
	
	public function voirObjetsAction($username=null){
		$em = $this->getDoctrine()->getEntityManager();
		if($username==null){
			$user=$this->get('security.context')->getToken()->getUser();
		} else {
			$userRepo = $this->getDoctrine()->getRepository('ProjetKUserBundle:User');
			$user=$userRepo->findBy(
				array(
					'username'=>$username
				)
			);
		}
		
		
		//Récupération de la liste des objets actuellement possédés par l'utilisateur
		$objetRepo = $this->getDoctrine()->getRepository('ProjetKPretBundle:Objet');
		$listeObjetsPossedes=$objetRepo->findBy(
	            		array(
	                		'proprietaire' => $user,
	                		'statut' =>"possede"
	            		)
        			);
		
		//Récupération de la liste des objets prêtés par l'utilisateur
		$listeObjetsPretes=$objetRepo->findBy(
	            		array(
	                		'proprietaire' => $user,
	                		'statut' =>"prete"
	            		)
        );
		
		$listeEmprunts=$em->getRepository('ProjetKPretBundle:Transaction')->findBy(
			array(
				'emprunteur'=>$user
			)
		);
		
		return $this->render('ProjetKPretBundle:Objet:voir.html.twig', array(
             'objetsPossedes' => $listeObjetsPossedes,
             'objetsPretes' => $listeObjetsPretes,
             'emprunts' => $listeEmprunts             
        ));
	}
	
	public function createObjetAction(){
		
		
		$user=$this->get('security.context')->getToken()->getUser();
		
		$em=$this->getDoctrine()->getManager();
		$objet=new Objet();
		$objet->setProprietaire($user);
		$objet->setStatut("possede");
		
		$form=$this->createForm(new ObjetType, $objet);
		
		$request=$this->get('request');
		//On regarde si cette méthode est executée avant ou après l'envoi du formulaire
		if($request->getMethod()=='POST'){
			//Si oui, on récupère les données entrées par l'utilisateur
			$form->bind($request);
			
			//Si le formulaire récupéré est valide on enregistre l'objet en base
			if($form->isValid()){
				$em = $this->getDoctrine()->getManager();
			    $em->persist($objet);
			    $em->flush();
				
				return $this->redirect($this->generateUrl('projet_k_pret_homepage'));
			}
		}
		//Si non, on affiche le formulaire
		return $this->render('ProjetKPretBundle:Objet:ajouter.html.twig', array(
		    'form' => $form->createView(),
		));
	}
}
?>