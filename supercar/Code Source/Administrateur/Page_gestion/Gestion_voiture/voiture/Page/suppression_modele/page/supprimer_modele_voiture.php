<?php
session_start();
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['identifiant'])) {
    // Rediriger vers la page de connexion s'il n'est pas connecté
    header("Location: ../../../../../../index.php");
    exit();
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Suppression modele </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        label {
            font-weight: bold;
        }
        input[type="text"],input[type="file"], input[type="number"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"], button {
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

    </style>

</head>
<body>

    <?php
    // mettre en ligne la connexion avec la base de données
    include ("../../../../../../include_bdd/connexion.bdd.php");

    // AVEC TROIS TABLE ?
    // probleme de jointure a regler
    $sql = "SELECT id_modele, nom_modele FROM modele";
    $resultat = $connexion->query($sql);

    ?>                            

<div class="row justify-content-center">
    <div class="col-md-10">
        <br><br>
        <h1 align="center">Liste des Modèles</h1>
        <p align="right">
            <a href="../../../admin-voitures.php" class="btn btn-info"> Retour</a>
        </p>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">Nom modèle</th>
                                <th class='text-center'>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                // Récupérer tous les modèles depuis la table 'modele'
                                $sql = "SELECT * FROM modele";
                                $resultat = mysqli_query($connexion , $sql);

                                if ($resultat && mysqli_num_rows($resultat) > 0) {
                                    // Afficher chaque ligne dans le tableau
                                    while ($row = mysqli_fetch_assoc($resultat)) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>" . htmlspecialchars($row['nom_modele']) . "</td>"; // Sécuriser la sortie
                                        echo "<td class='text-center'>";
                                        // Formulaire pour supprimer le modèle
                                        echo "<form action='../../../fonction_php_voiture/supprimer_voiture.php' method='post'>";
                                        echo "<input type='hidden' name='nom_modele' value='" . htmlspecialchars($row['nom_modele']) . "'>";
                                        echo "<input type='submit' name='delete_voiture' value='Supprimer' class='btn btn-danger'>";
                                        echo "</form>";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='2'>Aucun modèle trouvé.</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>