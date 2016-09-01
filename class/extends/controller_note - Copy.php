<?php
/****************************************************
* Extends de la class controlleur lié au MVC
* A propos des 'note' gère tout les events demandés par l'utilisateur
* - changer de page / chargement de la view
* - soumission d'un formulaire, gestion et renvoi des erreurs au formulaire ou envoie des données au model pour insertion sql
* - supprime une note sans confirmation
*
* Dernière modification : 27/05/2016
* Auteur : Sébastien Mader
/***************************************************/
class controller_note extends controller {
	
	var $errorArray = array(); //Les valeurs du formulaire, les key et les erreurs sous forme de style css : structure se tableau pour la gestion des données au niveau du formulaire

	//Le constructeur traite la partie event avec des variable GET.
	function __construct(){
		global $dataOfModel, $printOfView, $eventOfUser;
		
		switch($action){
			case "new":
				
			break;
			case "update":
				
			break;
			case "delete":
				
			break;
			case "from":
				
			break;
			default:
			
			break;

		}
		
		//Si on ne demande pas la suppression d'une 'note'
		if(!isset($_GET['d'])){
			//Si on fait appel à un formulaire
			if(isset($_GET['m'])){
				switch ($_GET['m']){
					//Formulaire pour modifier, ajouter des données
					case 1 :
						if(!isset($_GET['i'])){
							$_GET['i'] = null;
						}
						$printOfView->view_note->editNote($_GET['i']);
					break;
					
					//Envoyer les données sur formulaire à la methode pour traitement ou ré-affichage du formulaire avec les erreurs
					case 2 :
						if($this->checkForm($_POST) == true){
							$dataOfModel->model_note->saveData($this->errorArray);
							$printOfView->view_note->printListNote();
						}else{
							$printOfView->view_note->editNote($_GET['i'], $this->errorArray);
						}
					break;
				}
			}else{
				$printOfView->view_note->printListNote();
			}
		}else{
			$dataOfModel->model_note->removeData($_GET['i']);
			//ensuite un affiche la liste des note en retour / aucun message de confirmation ni d'avertissement
			$printOfView->view_note->printListNote();
		}
	}
	
	//vérification simple des champs de formulaires (1 textarea et 1 text)
	function checkForm($formData){
		$frmValide = true;
		//print_r($formData);
		
		foreach($formData as $key => $current){
			//print $key.'  '.$current.' <br />';
			$this->errorArray[$key] = array();
			if($current != null){
				$this->errorArray[$key]['check'] = 'noStyle';
			}else{
				$this->errorArray[$key]['check'] = 'errorFrm';
				$frmValide = false;
			}
			$this->errorArray[$key]['data'] = $current;
		}
		return $frmValide;
	}
}
?>