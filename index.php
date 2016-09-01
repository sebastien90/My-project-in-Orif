<!--/**************************************
Affichage d'une note textuel extraite 
d'une base de donnée MySQL vià PDO
avec un concepte MVC et des extends class

* Dernière modification : 27/05/2016
* Auteur : Sébastien Mader
**************************************/-->
<?php
//fichier de fonctions
include('function.php');

//inclue les class de base pour le modèle MVC
include('class/class_model.php');
include('class/class_view.php');
include('class/class_controller.php');


//On instancie les class dans un ordre précie
$dataOfModel = new model(); //Connexion à la base de donnée
$printOfView = new view(); //aucun constructeur, l'intégration de la view dans un ou des templates
$eventOfUser = new controller(); //coordinateur de l'ensemble en fonction des pages demandées

//cette méthode va automatiquement inclure les extends class structuer en MVC correspondant à la page demandé
$eventOfUser->includeExtendsClass($eventOfUser->view);

?>