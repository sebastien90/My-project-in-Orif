<?php
/****************************************************
* Class controlleur lié au MVC
* gère tout les events demandé par l'utilisateur,
* - changer de page / chargement de la view
* - soumission d'un formulaire, contrôle des données insérer
* - ajout d'une nouvelle 'fonctionnalités' structurée en MVC extends
*
* Dernière modification : 27/05/2016
* Auteur : Sébastien Mader
/***************************************************/
class controller {
	
	var $view; //définira la fonctionnalité appeller tel que 'note'
	
	//Le constructeur du controller définit quelle fonctionnalité est demandé pas l'utilisateur
	function __construct($view = null){
		//Par défaut on affiche les 'notes' si non on prend le valeur get 'v'
		if($view == null){
			if(isset($_GET['v'])){
				$this->view = $_GET['v'];
			}else{
				$this->view = 'note';
			}	
		}else{
			$this->view = $view;
		}
		
	}
		
	//Cette méthode inclue et instencie les extends de class en fonction de la demande de l'utilisateur
	//Il faut respecter une norme de nomage pour que le processus soit automatique via les variable _GET
	function includeExtendsClass($className){
		global $dataOfModel, $printOfView, $eventOfUser;
		
		//Controle l'existance des 3 extends de class néssecaire à la bonne structuration du code
		if(file_exists('class/extends/view_'.$className.'.php') AND file_exists('class/extends/model_'.$className.'.php') AND file_exists('class/extends/controller_'.$className.'.php')){
			include('class/extends/view_'.$className.'.php');
			include('class/extends/model_'.$className.'.php');
			include('class/extends/controller_'.$className.'.php');
			
			//on génère les noms pour instencier les class de manière dynamique, le chemin d'accès des extends est connu grace à la norme de nomage.
			$extendNameModel = 'model_'.$className;
			$extendNameView = 'view_'.$className;
			$extendNameController = 'controller_'.$className;
			
			//On instancie les extends de class dans un variable de la class parent correspondante 
			$dataOfModel->$extendNameModel = new $extendNameModel();
			$printOfView->$extendNameView = new $extendNameView();
			$eventOfUser->$extendNameController = new $extendNameController();

			
			
		}else{
			//Il n'exite pas de structure entière en mvc dans le bon dossier portant le nom appellé en get 'v', erreur
			$printOfView->template_base('<span class="FatalError">Impossible d\'affichier la page demandée : '.$_GET['v'].'.</span>');
		}
	}
}
?>