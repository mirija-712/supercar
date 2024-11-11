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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css"  type="text/css"  rel="stylesheet"/>
    <title>Modification description</title>
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
        
        input[type="text"],input[type="number"],input[type="file"],
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
        b{
            color : red;
        }

    </style>
</head>

<body>

    <?php
    // mettre en ligne la connexion avec la base de données
    include ("../../../../../../include_bdd/connexion.bdd.php");

    $sql = "SELECT * FROM voitures";
    $resultat = $connexion->query($sql);

    ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 align="center">
            <br><br>Tableau de modification des descriptions
            </h1>
            <p align="right">
                <a href="../choix_modification_modifier.php" class="btn btn-info"> Retour</a>
            </p>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="tableau">
                    <thead>
                        <tr>	
                            <th class="text-center">Nom modèle</th>
                            <th class="text-center">Marque</th>
                            <th class="text-center">Année</th>
                            <th class="text-center">Transmission</th>
                            <th class="text-center">Sièges</th>
                            <th class="text-center">Vitesse Max</th>
                            <th class="text-center">Moteur</th>
                            <th class="text-center">Consommation</th>
                            <th class="text-center">Puissance</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        if ($resultat->num_rows > 0) {
                            while ($row = $resultat->fetch_assoc()) {
                                echo "<tr>";
                                echo "<form action='../../../fonction_php_voiture/manage_informations_voiture.php' method='post'>";
                                echo "<td class='text-center'><p align='center'>" . htmlspecialchars($row["nom_modele"]) . "</p></td>";
                                echo "<td class='text-center'><p align='center'>" . htmlspecialchars($row["marque"]) . "</p></td>";
                                echo "<td class='text-center'><input type='number' name='annee' value='" . htmlspecialchars($row["annee"]) . "' required class='form-control'></td>";
                                echo "<td class='text-center'><input type='text' name='transmission' value='" . htmlspecialchars($row["transmission"]) . "' required class='form-control'></td>";
                                echo "<td class='text-center'><input type='number' name='sieges' value='" . htmlspecialchars($row["sieges"]) . "' required class='form-control'></td>";
                                echo "<td class='text-center'><input type='number' name='vitesse_max' value='" . htmlspecialchars($row["vitesse_max"]) . "' required class='form-control'></td>";
                                echo "<td class='text-center'><input type='text' name='moteur' value='" . htmlspecialchars($row["moteur"]) . "' required class='form-control'></td>";
                                echo "<td class='text-center'><input type='text' name='consommation' value='" . htmlspecialchars($row["consommation"]) . "' required class='form-control'></td>";
                                echo "<td class='text-center'><input type='number' name='puissance' value='" . htmlspecialchars($row["puissance"]) . "' required class='form-control'></td>";
                                echo "<td class='text-center'><textarea name='description' required class='form-control'>" . htmlspecialchars($row["description"]) . "</textarea></td>";
                                echo "<td class='text-center'>";
                                echo "<input type='hidden' name='id_voiture' value='" . $row['id_voiture'] . "'>"; 
                                echo "<input type='submit' class='btn btn-warning' value='Modifier' name='update_desc'>";
                                echo "</td>";
                                echo "</form>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10'>Aucune voiture trouvée.</td></tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>