<?php
    // mettre en ligne la connexion avec la base de données
    include ("../../../../include_bdd/connexion.bdd.php");
    
if (isset($_POST["id_client"])) {
    $id_client = $_POST["id_client"];
    $sql = "DELETE FROM `client_inscrit` WHERE `id_client` = $id_client";
    if ($connexion->query($sql) === TRUE) {
        echo "Client supprimé avec succès.";
        header("Location: ../voir_clients.php");
    } else {
        echo "Erreur lors de la suppression du client: " . $connexion->error;
    }
} else {
    echo "ID du client non spécifié.";
}

$connexion->close();
?>
