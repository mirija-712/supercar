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
    <title>Modification modele</title>
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

// Récupérer les modèles de voitures triés par la marque (extrait du nom du modèle)
$sql = "SELECT id_modele, nom_modele FROM modele ORDER BY nom_modele";
$resultat = $connexion->query($sql);
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <br><br>
        <h1 align="center">
            Modifier Modele
        </h1>

        <p align="right">
            <a href="../choix_modification_modifier.php" class="btn btn-info"> Retour</a>
        </p> 
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-4">
        <br><br>

        <form action="../../../fonction_php_voiture/manage_informations_modele.php" method="post">
            <label for="id">Modèles existants :</label>
            <?php 
                // Requêter les modèles pour le select
                $sql_models = "SELECT id_modele, nom_modele FROM modele ORDER BY nom_modele";
                $result_models = $connexion->query($sql_models);
                if ($result_models->num_rows > 0) {
                    echo "<select name='id_modele' id=''>";
                    echo "<option value=''>Sélectionnez un modèle</option>";
                    while ($row = $result_models->fetch_assoc()) {
                        echo "<option value='" . $row['id_modele'] . "'>" . $row['nom_modele'] . "</option>";
                    }
                    echo "</select>"; 
                    echo "<br><br>";
                } else {
                    echo "<option> Aucune information trouvée </option>";
                }
            ?>
            <label for="nom">Nouveau nom modèle :</label>
            <input type="text" id="nom" name="nom_modele" required><br><br>
            <p align="center"><input type="submit" class="btn btn-warning" value="Modifier" name="update"></p>
        </form>
    </div>
</div>

<br><br>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>    
                        <th class="text-center">Nom Modèle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Affichage des modèles dans le tableau
                    if ($resultat->num_rows > 0) {
                        while ($row_modele = $resultat->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='text-center'>" . $row_modele["nom_modele"] . "</td>";
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

</body>
</html>
