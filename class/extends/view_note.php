<?php
/****************************************************
* Extends de la class view lié au MVC
* gère tout les affichage en html des vue et formulaire des notes
* - affichage en liste de toutes les notes
* - affichage du formulaire de modification avec gestion des erreurs (simple)
*
* Dernière modification : 27/05/2016
* Auteur : Sébastien Mader
/***************************************************/
class view_note extends view {

	function __construct(){

	}
	
	//View de la liste des notes en lecture et la génération de la structure en html pour l'affichage
	function printListNote(){
		global $dataOfModel, $printOfView, $eventOfUser;
		
		//Demande au modèle 'note' de lui communiquer les données
		$arrayNote = $dataOfModel->model_note->getListNote();		
		$html = null;
		foreach($arrayNote as $current){
			$html .='<div id="note"><div class="content">'.$current['txtNote'];
			$html .='<br style="clear:both"/><span class="controlNote">
			<a href="?v=note&m=1&i='.$current['noteId'].'"><div class="btnEdit">&nbsp;</div></a> &nbsp;
			<a href="??v=note&d=1&i='.$current['noteId'].'"><div class="btnDel">&nbsp;</div></a>
			</span></div><div id="topbarreNote">
			<span class="leftSide">'.$current['userNote'].'</span>';
			$html .='<span class="rightSide">'.$current['dateNote'].'</span></div></div>';
		}
		
		//On envoi l'affichage dans la class view pour intégration dans le template
		$this->template_base($html);
	}
	
	//Formulaire de modification et d'ajout d'une nouvelle donnée (note)
	function editNote($idNote = null, $error = null){
		global $dataOfModel, $printOfView, $eventOfUser;
		
		$txtNoteError = null;
		$userNoteError = null;
		
		//si on édite une note, on va demandé ses données à la class model
		if ($idNote != null){
			$arrayNote = $dataOfModel->model_note->getListNote($idNote);		
		}else{ //Pas d'id alors on veut inseré un nouvelle enregistrement
			$arrayNote['noteId'] = 0;
			$arrayNote['txtNote'] = null;
			$arrayNote['userNote'] = null;
		}
		
		//Gestion des erreurs et persistance des données dans les champs du formulaire
		if($error != null){
			$arrayNote['noteId'] = $error['noteId']['data'];
			$arrayNote['txtNote'] = $error['txtNote']['data'];
			$arrayNote['userNote'] = $error['userNote']['data'];
			$txtNoteError = $error['txtNote']['check'];
			$userNoteError = $error['userNote']['check'];
		}
		
		//Ecriture du formulaire de modification, insertion
		$html = null;
		$html .= ('<form action="?v='.$_GET['v'].'&m=2&i='.$arrayNote['noteId'].'" method="post" accept-charset="UTF-8" autocomplete="off">');
		$html .= ('<div id="note"><div class="content">Écrivez votre note ici-dessous. <a href="index.php?v='.$_GET['v'].'">Retour</a>');
		
		$html .= ('<textarea name="txtNote" class="'.$txtNoteError.'" style="width:734px;height:200px;max-width:734px;">'.$arrayNote['txtNote'].'</textarea>');
		
		$html .= ('<br style="clear:both"/></div><div id="topbarreNote"><span class="leftSide">Votre nom : ');
		
		$html .= ('<input type="text" size="50" class="'.$userNoteError.'" name="userNote" value="'.$arrayNote['userNote'].'">');
		
		$html .= ('<br></span><input type="submit" style="float:right;" name="valider" value="Enregistrer">');
		$html .= ('<input type="hidden" name="noteId" value="'.$arrayNote['noteId'].'"></div>');
		$html .= ('</div>');
		
		
		//Envoyer le code html dans le template pour la mise en page finale
		$this->template_base($html);
		
	}
}
?>