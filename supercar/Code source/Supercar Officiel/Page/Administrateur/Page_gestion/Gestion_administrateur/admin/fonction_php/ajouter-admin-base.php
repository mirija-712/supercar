<?php
$serveur = "localhost"; 
$utilisateur = "root";
$mot_de_passe = "";
$nom_bdd = "supercar";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST["identifiant"];
    $mot_de_passe = $_POST["motdepasse"];

    // INSERER CLIENT
    $sql = "INSERT INTO `admin` (`identifiant`, `mot_de_passe`) VALUES ('$identifiant', '$mot_de_passe')";
    if ($connexion->query($sql) === TRUE) {
        echo "Administrateur ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout de l'administrateur: " . $connexion->error;
    }
}

// FERMER CONNEXION DE BASE 
$connexion->close();
?>
