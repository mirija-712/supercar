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
    <title>Modification image</title>
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

    // AVEC TROIS TABLE ?
    // probleme de jointure a regler
    $sql = "SELECT * FROM voitures";
    $resultat = $connexion->query($sql);

    ?>                  

<div class="row justify-content-center">
    <div class="col-md-11">
        <h1 align="center"><br><br>Tableau de Modification des Images</h1>
        <p align="right">
            <a href="../choix_modification_modifier.php" class="btn btn-info"> Retour</a>
        </p>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="tableau">
                <thead>
                    <tr>    
                        <th class="text-center">ID Modele</th>
                        <th class="text-center">Nom modele</th>
                        <th class="text-center">Photo_1</th>
                        <th class="text-center">Photo_2</th>
                        <th class="text-center">Photo_3</th>
                        <th class="text-center">Photo_4</th>
                        <th class="text-center">Modifier</th> <!-- Nouvelle colonne pour le bouton Modifier -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($resultat->num_rows > 0) {
                        while ($row = $resultat->fetch_assoc()) {
                            echo "<tr>";
                            echo "<form action='../../../fonction_php_voiture/manage_informations_voiture.php' method='POST'>";
                            
                            // ID Modele
                            echo "<td class='text-center'>
                                    <input type='hidden' name='id_modele' value='" . $row["id_modele"] . "'>" . $row["id_modele"] . "
                                  </td>";
                            
                            // Nom Modele
                            echo "<td class='text-center'>
                                    <p>" . $row["nom_modele"] . "</p>
                                  </td>";

                            // Image 1 avec champ de modification
                            echo "<td class='text-center'>
                                    <img src='" . $row["photo_1"] . "' width='200px' height='200px'><br>
                                    <input type='text' name='photo_1' value='" . $row["photo_1"] . "'>
                                  </td>";

                            // Image 2 avec champ de modification
                            echo "<td class='text-center'>
                                    <img src='" . $row["photo_2"] . "' width='200px' height='200px'><br>
                                    <input type='text' name='photo_2' value='" . $row["photo_2"] . "'>
                                  </td>";

                            // Image 3 avec champ de modification
                            echo "<td class='text-center'>
                                    <img src='" . $row["photo_3"] . "' width='200px' height='200px'><br>
                                    <input type='text' name='photo_3' value='" . $row["photo_3"] . "'>
                                  </td>";

                            // Image 4 avec champ de modification
                            echo "<td class='text-center'>
                                    <img src='" . $row["photo_4"] . "' width='200px' height='200px'><br>
                                    <input type='text' name='photo_4' value='" . $row["photo_4"] . "'>
                                  </td>";

                            // Bouton pour modifier
                            echo "<td class='text-center'>
                                    <br><br><br><br><input type='submit' class='btn btn-warning' value='Modifier' name='update_img'>
                                  </td>";
                            echo "</form>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Aucune voiture trouvée.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

        
</body>
</html>