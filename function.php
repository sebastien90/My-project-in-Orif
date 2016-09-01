<?php
//Fonction php

//Converti le format d'heure SQL DATETIME en timestamp, puis le formation pour nos régions.
function formatDateTime ($dateAndTime){
	return date("d.m.y - h:i:s", mktime(substr($dateAndTime,11,2),substr($dateAndTime,14,2),substr($dateAndTime,17,2),substr($dateAndTime,5,2),substr($dateAndTime,8,2),substr($dateAndTime,0,4)));
}

?>