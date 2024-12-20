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
    <title>Ajout modele</title>
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

// Requête pour récupérer les modèles
$sql_modele = "SELECT id_modele, nom_modele FROM modele";
$resultat_modele = $connexion->query($sql_modele);

// Requête pour récupérer les marques
$sql_marque = "SELECT id_marque, nom_marque FROM marque";
$resultat_marque = $connexion->query($sql_marque);

?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <br><br>
        <h1 align="center">
            Ajout Modele
        </h1>

        <p align="right">
            <a href="../choix_modification_ajouter.php" class="btn btn-info"> Retour</a>
        </p> 
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-md-4">
        <br><br>
        <form action="../../../fonction_php_voiture/manage_informations_modele.php" method="post">
            <label for="nom">Nom modele :</label>
            <input type="text" id="nom" name="nom_modele" required><br><br>

            <label for="id_marque">Marque :</label>
            <select name="id_marque" id="id_marque" required>
                <option value=""></option>
                <?php
                if ($resultat_marque->num_rows > 0) {
                    while ($row_marque = $resultat_marque->fetch_assoc()) {
                        echo "<option value='" . $row_marque['id_marque'] . "'>" . $row_marque['nom_marque'] . "</option>";
                    }
                } else {
                    echo "<option>Aucune marque trouvée</option>";
                }
                ?>
            </select>
            <br><br>        
            <p align="center"><input type="submit" class="btn btn-success" value="Ajouter" name="insert"></p>
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
                        <th class="text-center">Nom modele</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Affichage des modèles dans le tableau
                    if ($resultat_modele->num_rows > 0) {
                        while ($row_modele = $resultat_modele->fetch_assoc()) {
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