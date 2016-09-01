<?php
/****************************************************
* Class model lié au MVC
* gère toutes les données mémoriser en base de donnée
* - Se connecte à la db et place l'objet PDO actif dans un variable de la class model
* - Effectue les requête sql SELECT, INSERT, DELETE et UPDATE
*
* Dernière modification : 27/05/2016
* Auteur : Sébastien Mader
/***************************************************/
class model {
	var $DDB;//Objet PDO connecté à la base de donnée SQL
	
	function __construct(){
		//Connexion à la BD elle sera accéssible sous $dataOfModel->DDB
		$this->DDB = $this->getBDD();
	}
	
	//On effectue la connexion à la db via PDO
	public static function getBDD(){
		/**************************************
		Para. et connexion via PDO à Mysql
		**************************************/
		$pass = 'pHHtpml24#';
		$user = 'W3B_all';
		$db = 'w3b_all';
		$dbh = new PDO('mysql:host=localhost;dbname='.$db, $user, $pass);

		//Force la sortie en encodage UTF-8
		$dbh->exec("SET CHARACTER SET utf8");
		//parent::PDO = $dbh;
		//$this->DDB = $dbh;
		
		//echo '<div style="color:#FF0000; font-size:50px;" > ON RECREE LA CONNEXION OU PAS </div>';
		return $dbh;
	}
	
	/*
	function getLastID(){
		//echo $this->getBDD()->lastInsertId();
	}*/
	
	
	
}
?>