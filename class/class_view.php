<?php
/****************************************************
* Class view lié au MVC
* gère tout les affichage en html, la partie template "global"
* - inclue le code html au bonne endroit dans le template
*
* Dernière modification : 27/05/2016
* Auteur : Sébastien Mader
/***************************************************/
class view {
	
	function __construct(){

	}
	
	//Le template capte la variable $html et la print au bonne endroit
	function template_base($html){
		include('template/template.php');
	}
	

}
?>