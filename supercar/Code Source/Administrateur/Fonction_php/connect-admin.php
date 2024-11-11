<?php
session_start();

    // mettre en ligne la connexion avec la base de données
    include ("../include_bdd/connexion.bdd.php");

    
// Vérifier la connexion
if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $identifiant = $_POST["identifiant"];
    $mot_de_passe = $_POST["mot_de_passe"];


    // Préparation de la requête SQL (utilisation de requête préparée pour éviter les injections SQL)
    $sql = "SELECT * FROM `admin` WHERE `identifiant`='$identifiant' AND `mot_de_passe`='$mot_de_passe'";
    $stmt = $connexion->prepare($sql);
    
    // Exécution de la requête
    $stmt->execute();

    // Vérification du résultat
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        // Informations de connexion correctes, démarrer la session
        $_SESSION['identifiant'] = $identifiant;
        // Redirection si les identifiants sont corrects
        echo "<h1 align='center'><br><br>Connexion autorisé</h1>";
        header("refresh:2; url= ../Accueil_admin/menu-admin.php"); 
        exit(); 
    } else {
        echo "<h1 align='center'><br><br>Identifiant ou mot de passe incorrect</h1>";
        header("refresh:2; url= ../index.php");
    }

    // Fermeture du statement
    $stmt->close();
}
