<?php
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bdd = "supercar";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

if (isset($_POST["id_client"])) {
    $id_client = $_POST["id_client"];
    $sql = "DELETE FROM `client_inscrit` WHERE `id_client` = $id_client";
    if ($connexion->query($sql) === TRUE) {
        echo "Client supprimé avec succès.";
        header("Location: voir_clients.php");
    } else {
        echo "Erreur lors de la suppression du client: " . $connexion->error;
    }
} else {
    echo "ID du client non spécifié.";
}

$connexion->close();
?>
