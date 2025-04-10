<?php

/** ARCHITECTURE PHP SERVEUR  : Rôle du fichier controller.php
 * 
 *  Dans ce fichier, on va définir les fonctions de contrôle qui vont traiter les requêtes HTTP.
 *  Les requêtes HTTP sont interprétées selon la valeur du paramètre 'todo' de la requête (voir script.php)
 *  Pour chaque valeur différente, on déclarera une fonction de contrôle différente.
 * 
 *  Les fonctions de contrôle vont éventuellement lire les paramètres additionnels de la requête, 
 *  les vérifier, puis appeler les fonctions du modèle (model.php) pour effectuer les opérations
 *  nécessaires sur la base de données.
 *  
 *  Si la fonction échoue à traiter la requête, elle retourne false (mauvais paramètres, erreur de connexion à la BDD, etc.)
 *  Sinon elle retourne le résultat de l'opération (des données ou un message) à includre dans la réponse HTTP.
 */

/** Inclusion du fichier model.php
 *  Pour pouvoir utiliser les fonctions qui y sont déclarées et qui permettent
 *  de faire des opérations sur les données stockées en base de données.
 */
require("model.php");

function readMoviesController(){
    $movies = getAllMovies();
    return $movies;
}


function updateController(){
    $title = $_REQUEST['title'];
    $real = $_REQUEST['real'];
    $year = $_REQUEST['year'];
    $desc = $_REQUEST['desc'];
    $cate = $_REQUEST['cate'];
    $img = $_REQUEST['img'];
    $url = $_REQUEST['url'];
    $age = $_REQUEST['age'];

    if (empty($title) || empty($real) || empty($year) || empty($desc) || empty($cate) || empty($img) || empty($url) || empty($age)){
        return "Erreur : Un ou plusieurs champs n'ont pas étés remplis.";
    }
    $ok = updateMovie($title, $real, $year, $duree, $desc, $cate, $img, $url, $age);
    if ($ok!=0){
      return "Le film $title a été ajouté";
    }
    else{
      return "Une erreur est survenue lors de l'ajout du film";
    }
  }