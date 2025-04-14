<?php
/**
 * Ce fichier contient toutes les fonctions qui réalisent des opérations
 * sur la base de données, telles que les requêtes SQL pour insérer, 
 * mettre à jour, supprimer ou récupérer des données.
 */

/**
 * Définition des constantes de connexion à la base de données.
 *
 * HOST : Nom d'hôte du serveur de base de données, ici "localhost".
 * DBNAME : Nom de la base de données
 * DBLOGIN : Nom d'utilisateur pour se connecter à la base de données.
 * DBPWD : Mot de passe pour se connecter à la base de données.
 */
define("HOST", "localhost");
define("DBNAME", "borie54");
define("DBLOGIN", "borie54");
define("DBPWD", "borie54");

function getAllMovies(){
    // Connexion à la base de données
    $cnx = new PDO("mysql:host=".localhost.";dbname=".borie54, borie54, borie54);
    
    // Requête SQL pour récupérer le menu avec des paramètres
    $sql = "select id, name, image from Movie";
    
    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);
    
    // Exécute la requête SQL
    $stmt->execute();
    
    // Récupère les résultats de la requête sous forme d'objets
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);
    
    // Retourne les résultats
    return $res;
}


function updateMovie($title, $real, $year, $duree, $desc, $cate, $img, $url, $age){
    $cnx = new PDO("mysql:host=".localhost.";dbname=".borie54, borie54, borie54); 

    $sql = "INSERT INTO Movie (name, director, year, length, description, id_category, image, trailer, min_age)
            VALUES (:title, :realisateur, :year, :duree, :desc, :categorie, :image, :url, :age)";
            
    // Prépare la requête SQL
    $stmt = $cnx->prepare($sql);
    // Lie les paramètres aux valeurs
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':realisateur', $real);
    $stmt->bindParam(':year', $year);
    $stmt->bindParam(':duree', $duree);
    $stmt->bindParam(':desc', $desc);
    $stmt->bindParam(':categorie', $cate);
    $stmt->bindParam(':image', $img);
    $stmt->bindParam(':url', $url);
    $stmt->bindParam(':age', $age);
    // Exécute la requête SQL
    $stmt->execute();
    // Récupère le nombre de lignes affectées par la requête
    $res = $stmt->rowCount(); 
    return $res; // Retourne le nombre de lignes affectées
  }