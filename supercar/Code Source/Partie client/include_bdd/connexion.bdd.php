<?php
// Informations de connexion à la base de données
$serveur = "localhost"; // ou "127.0.0.1"
$utilisateur = "root";
$mot_de_passe = "";
$nom_bdd = "supercar_officiel";

// Connexion à la base de données
$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

// Vérification de la connexion avec la base de données
if ($connexion->connect_error) {
    die("Échec de la connexion à MySQL: " . $connexion->connect_error);
} 

// Changer le jeu de caractères à utf8
if (!$connexion->set_charset("utf8")) {
    die("Erreur lors du chargement du jeu de caractères utf8: " . $connexion->error);
}

?>
