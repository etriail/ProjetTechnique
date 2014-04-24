<?php

namespace ProjetK\PretBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Httpfoundation\Response;
use ProjetK\PretBundle\Entity\Objet;
use ProjetK\PretBundle\Entity\Transaction;
use ProjetK\PretBundle\Form\ObjetType;
use ProjetK\PretBundle\Form\TransactionType;

class TransactionController extends Controller
{
	public function __construct()
    {
      $this->date_pret=new \DateTime();
    }
	
	public function createTransactionAction($objetId){
		$em=$this->getDoctrine()->getManager();
		
		//TODO remplacer par utilisateur courant.
		$preteur="etriail";
		
		$objet=$em->getRepository('ProjetKPretBundle:Objet')->find($objetId);
		$objet->setStatut("prete");
		
		$transaction=new Transaction();
		$transaction->setObjet($objet);
		$transaction->setPreteur($preteur);
		
		$form=$this->createForm(new TransactionType, $transaction);
		
		$request=$this->get('request');
		//On regarde si cette méthode est executée avant ou après l'envoi du formulaire
		if($request->getMethod()=='POST'){
			//Si oui, on récupère les données entrées par l'utilisateur
			$form->bind($request);
			
			//Si le formulaire récupéré est valide on enregistre la transaction en base
			if($form->isValid()){
				$em = $this->getDoctrine()->getManager();
			    $em->persist($transaction);
			    $em->flush();
				
				return $this->redirect($this->generateUrl('projet_k_pret_homepage'));
			}
		}
		//Si non, on affiche le formulaire
		return $this->render('ProjetKPretBundle:Transaction:ajouter.html.twig', array(
		    'form' => $form->createView(),
		));
	}
}
?>