<?php
/****************************************************
* Extends de la class modèle lié au MVC
* gère toutes les données mémoriser en base de donnée au sujet des notes
* - utilise la connexion DB de la class parent(model)
* - Effectue les requête sql SELECT, INSERT, DELETE et UPDATE
* - enregistre les valeurs dans un array afin de les transmettre à la vue
/***************************************************/
class model_note extends model {
    // Initalitation des variables 'modèle de données' pour les notes
	var $noteId			= null;
	var $txtNote		= null;
	var $userNote		= null;
	var $statutNote		= null;
	var $dateNote		= null;
	var $dateModifNote	= null;

	
	function __construct(){
		
	}
	
	
	//Fonction de extraire la données concerant les notes
	function getListNote($id = null){
		global $dataOfModel, $printOfView, $eventOfUser;
		//La demande souhaite avoir les données d'une seule note ou toutes les notes
		if ($id == null){
		//Format et préparation de la requête SQL pour extraire la table `t_note`
		$stmt = $dataOfModel->DDB->prepare("SELECT * FROM `t_note` WHERE `statutNote` > 0 ORDER BY `dateNote` DESC");
		}else{
			$stmt = $dataOfModel->DDB->prepare("SELECT * FROM `t_note` WHERE `noteId` = '".$id."' LIMIT 1");
		}

		//Déclaration de l'array pour une sortie multiple
		$arrayNote		= array();

		//Execute la requête SQL précédemment préparé 
		if ($stmt->execute()) {
			
			//Parcoure le résultat et enregistre les valeurs dans leurs variables
			while ($row = $stmt->fetch()) {
				
				//Contrôle si la valeur est vide ou inexistant, par défault elles valent null
				if(!empty(isset($row['noteId']))){
					$this->noteId	= $row['noteId'];
				}
				if(!empty(isset($row['txtNote']))){
					$this->txtNote = $row['txtNote'];
				}	
				if(!empty(isset($row['userNote']))){
					$this->userNote = $row['userNote'];
				}
				if(!empty(isset($row['statutNote']))){
					$this->statutNote	= $row['statutNote'];
				}
				if(!empty(isset($row['dateNote']))){
					$this->dateNote = formatDateTime($row['dateNote']);
				}	
				if(!empty(isset($row['dateModifNote']))){
					$this->dateModifNote = $row['dateModifNote'];
				}
				
				if($id == null){
				//On enregistre les valeurs dans un tableau
				$arrayNote[$this->noteId]['noteId'] = $this->noteId; 
				$arrayNote[$this->noteId]['txtNote'] = $this->txtNote; 
				$arrayNote[$this->noteId]['userNote'] = $this->userNote; 
				$arrayNote[$this->noteId]['statutNote'] = $this->statutNote; 
				$arrayNote[$this->noteId]['dateNote'] = $this->dateNote; 
				$arrayNote[$this->noteId]['dateModifNote'] = $this->dateModifNote; 		
				}else{
				$arrayNote['noteId'] = $this->noteId; 
				$arrayNote['txtNote'] = $this->txtNote; 
				$arrayNote['userNote'] = $this->userNote; 
				$arrayNote['statutNote'] = $this->statutNote; 
				$arrayNote['dateNote'] = $this->dateNote; 
				$arrayNote['dateModifNote'] = $this->dateModifNote; 						
				}
				
			}
			//Retourne le tableau à son correspondant (celui qui a appelé)
			return $arrayNote;
		}
	}
	
	//Lorsque le controller valide les données d'un formulaire lié aux notes, elles sont ensuite envoyé ici dans le model pour être enregistrer dans la DB
	function saveData($data){
		global $dataOfModel, $printOfView, $eventOfUser;
		
		//Si l'idNote est à 0 alors c'est un nouvelle enregistrement, si non c'est un UPDATE
		if($data['noteId']['data'] > 0){
			$sql = "UPDATE `t_note` SET `txtNote` = '".$data['txtNote']['data']."', `userNote` = '".$data['userNote']['data']."' WHERE `noteId` = '".$data['noteId']['data']."';";
		}else{
			$sql = "INSERT INTO `t_note` (`txtNote`, `userNote`, `statutNote`) VALUES ('".$data['txtNote']['data']."', '".$data['userNote']['data']."', '1');";
		}
		
		//Execution de la requête SQL, sans gestion des erreurs
		$stmt = $dataOfModel->DDB->prepare($sql);
		$stmt->execute();
	}
	
	//Supprime un enregistrement dans la DB sur demande du controller
	function removeData($id){
		global $dataOfModel, $printOfView, $eventOfUser;
		
		echo $sql = "DELETE FROM `t_note` WHERE `noteId` = '".$id."';";
		$stmt = $dataOfModel->DDB->prepare($sql);
		$stmt->execute();
	}
}
?>