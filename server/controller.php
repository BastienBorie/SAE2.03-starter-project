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
    $title = $_REQUEST['title'] ?? null;
    $real = $_REQUEST['real'] ?? null;
    $year = $_REQUEST['year'] ?? null;
    $duree = $_REQUEST['duree'] ?? null;
    $desc = $_REQUEST['desc'] ?? null;
    $cate = $_REQUEST['cate'] ?? null;
    $img = $_REQUEST['img'] ?? null;
    $url = $_REQUEST['url'] ?? null;
    $age = $_REQUEST['age'] ?? null;

    if (empty($title) || empty($real) || empty($year) || empty($duree) || empty($desc) || empty($cate) || empty($img) || empty($url) || empty($age)){
        return "Erreur : Tous les champs doivent être remplis.";
    }
    $ok = updateMovie($title, $real, $year, $duree, $desc, $cate, $img, $url, $age);
    if ($ok!=0){
      return "Le film $title a été ajouté";
    }
    else{
      return "Une erreur est survenue lors de l'ajout du film";
    }
  }

  function readMovieDetailsController(){
    $id = $_REQUEST['id'] ?? null;
    if (empty($id)) {
        return "erreur";
    }
    return getMovielookdetails($id);
  }