<?php
// mettre en ligne la connexion avec la base de données
include ("../../../../include_bdd/connexion.bdd.php");

if (isset($_POST['delete_voiture'])) {
    $nom_modele = $_POST['nom_modele'];

    // Commencer une transaction pour garantir les suppressions correctes
    mysqli_begin_transaction($connexion);

    try {
        // Récupérer l'id du modèle à partir de son nom
        $sql_get_id = "SELECT id_modele FROM modele WHERE nom_modele = ?";
        $stmt_get_id = mysqli_prepare($connexion, $sql_get_id);
        mysqli_stmt_bind_param($stmt_get_id, 's', $nom_modele);
        mysqli_stmt_execute($stmt_get_id);
        $result = mysqli_stmt_get_result($stmt_get_id);
        $row = mysqli_fetch_assoc($result);
        $id_modele = $row['id_modele'];

        if (!$id_modele) {
            throw new Exception("Modèle non trouvé");
        }

        // Supprimer d'abord toutes les voitures associées au modèle
        $sql1 = "DELETE FROM voitures WHERE id_modele = ?";
        $stmt1 = mysqli_prepare($connexion, $sql1);
        mysqli_stmt_bind_param($stmt1, 'i', $id_modele);

        if (!mysqli_stmt_execute($stmt1)) {
            throw new Exception("Erreur lors de la suppression dans 'voitures': " . mysqli_error($connexion));
        }

        // Ensuite, supprimer le modèle dans la table 'modele'
        $sql2 = "DELETE FROM modele WHERE id_modele = ?";
        $stmt2 = mysqli_prepare($connexion, $sql2);
        mysqli_stmt_bind_param($stmt2, 'i', $id_modele);

        if (!mysqli_stmt_execute($stmt2)) {
            throw new Exception("Erreur lors de la suppression dans 'modele': " . mysqli_error($connexion));
        }

        // Valider la transaction si tout s'est bien passé
        mysqli_commit($connexion);

        echo "Le modèle et les voitures associées ont été supprimés avec succès.";
        
        // Redirection après la suppression
        header("Location: ../Page/suppression_modele/page/supprimer_modele_voiture.php");
        exit(); // Arrêter l'exécution du script après la redirection

    } catch (Exception $e) {
        // Si une erreur survient, annuler la transaction
        mysqli_rollback($connexion);
        echo "Échec de la suppression : " . $e->getMessage();
    }
}
?>
