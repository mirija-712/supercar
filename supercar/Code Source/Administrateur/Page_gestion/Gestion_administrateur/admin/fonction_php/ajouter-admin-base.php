<?php
    // mettre en ligne la connexion avec la base de données
    include ("../../../../include_bdd/connexion.bdd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identifiant = $_POST["identifiant"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // INSERER CLIENT AVEC LA DATE DE CREATION
    $sql = "INSERT INTO `admin` (`identifiant`, `mot_de_passe`, `date`) VALUES ('$identifiant', '$mot_de_passe', NOW())";
    if ($connexion->query($sql) === TRUE) {
        echo "Administrateur ajouté avec succès.";
        header("Location: ../ajouter-admin.php");
        exit();
    } else {
        echo "Erreur lors de l'ajout de l'administrateur: " . $connexion->error;
    }
}

// FERMER CONNEXION DE BASE 
$connexion->close();
?>

