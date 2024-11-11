<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../index.php");
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>liste-clients</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5dc; /* beige clair */
        }

        .container {
            margin-top: 50px;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .table {
            background-color: #fff; /* Fond blanc pour la table */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }
    </style>
</head>
<body>
<?php
// mettre en ligne la connexion avec la base de données
include ("../../../include_bdd/connexion.bdd.php");

// Requête SQL pour récupérer DEMANDE ESSAI
$sql = "SELECT * FROM `demande_essai`";
$resultat = $connexion->query($sql);

?>
    <div class="container">
        <div class="title">
            <h1>VOICI LA LISTE DES DEMANDE D'ESSAI DE SUPERCAR</h1>
            <p align="right">
                <a href="../../../Accueil_admin/menu-admin.php" class="btn btn-info"> Retour</a>
            </p>
        </div>
        <br>
        <div class="table-responsive">
        <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date de demande</th>
                <th>Utilisateur</th>
                <th>Modèle</th>
                <th>Heure d'arrivée</th>
                <th>État</th>
                <th>Action</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Affichage des demandes d'essai
            if ($resultat->num_rows > 0) {
                while ($row = $resultat->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id_demande_essai"] . "</td>";
                    echo "<td>" . $row["date_demande"] . "</td>";
                    echo "<td>" . $row["nom_utilisateur"] . "</td>";
                    echo "<td>" . $row["nom_modele"] . "</td>";
                    echo "<td>" . $row["heure_arriver"] . "</td>";
                    echo "<td>" . $row["etat"] . "</td>";

                    // Afficher "Confirmer" ou "Terminer" selon l'état
                    if (strtolower(trim($row["etat"])) == "en attente") {  
                        // BOUTON CONFIRMER
                        echo "<td>
                            <form action='fonction_php/traitement-confirmer-demande.php' method='post'>
                                <input type='hidden' name='id_demande_essai' value='" . $row["id_demande_essai"] . "'>
                                <button type='submit' class='btn btn-danger' name='confirmer'>Confirmer</button>
                            </form>
                            </td>";
                    } elseif (strtolower(trim($row["etat"])) == "confirmé") {
                        // BOUTON TERMINER
                        echo "<td>
                            <form action='fonction_php/traitement-terminer-demande.php' method='post'>
                                <input type='hidden' name='id_demande_essai' value='" . $row["id_demande_essai"] . "'>
                                <button type='submit' class='btn btn-warning'>Terminer</button>
                            </form>
                            </td>";
                    } elseif (strtolower(trim($row["etat"])) == "terminé") {
                        // État déjà terminé
                        echo "<td>
                            <button type='button' class='btn btn-success' disabled>Terminé</button>
                            </td>";
                    }

                    // BOUTON SUPPRIMER
                    echo "<td>
                        <form action='fonction_php/traitement-supprimer-demande.php' method='post'>
                            <input type='hidden' name='id_demande_essai' value='" . $row["id_demande_essai"] . "'>
                            <button type='submit' class='btn btn-danger' name='supprimer'>Supprimer</button>
                        </form>
                        </td>";
                    
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Aucune demande trouvée</td></tr>";
            }
            ?>

        </tbody>
    </table>
        </div>
    </div>

    <!-- FICHIER JS DE BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
