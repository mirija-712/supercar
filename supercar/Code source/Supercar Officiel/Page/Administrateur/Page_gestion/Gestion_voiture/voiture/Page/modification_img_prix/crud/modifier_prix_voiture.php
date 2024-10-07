<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css"  type="text/css"  rel="stylesheet"/>
    <title>Espace texte</title>
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
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$nom_bdd = "supercar";

$connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

if ($connexion->connect_error) {
    die("Connexion échouée: " . $connexion->connect_error);
}

// Requête SQL
$sql = "SELECT * FROM voitures";
$resultat = $connexion->query($sql);

// Stocker les résultats dans un tableau
$voitures = [];
if ($resultat->num_rows > 0) {
    while ($row = $resultat->fetch_assoc()) {
        $voitures[] = $row;
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <br><br>
        <h1 align="center">Modification prix voiture</h1>
        <p align="right">
            <button>
                <a href="../choix_modification.php" class="btn btn-info"> Retour</a>
            </button>
        </p>
        <br><br>
        <form action="../../../fonction_php_voiture/manage_informations_voiture.php" method="post">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <label for="nom">Nom modele :</label>
                    <select name="nom_modele" id="">
                        <option>...</option>
                        <?php foreach ($voitures as $voiture) { ?>
                            <option><?php echo $voiture['nom_modele']; ?></option>
                        <?php } ?>
                        <option>...</option>
                    </select>
                    <br><br>
                    <label for="nom">Prix :</label>
                    <input type="number" name="prix" required><br><br>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <p align="center"><input type="submit" class="btn btn-warning" value="Modifier" name="update_prix"></p>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
        <br><br>
    </div>
</div>

<br><br><br>

<div class="row justify-content-center">
    <div class="col-md-11">
        <h1 align="center">Tableau</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered" id="tableau">
                <thead>
                    <tr>	
                        <th>Nom modele</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($voitures)) { ?>
                        <?php foreach ($voitures as $voiture) { ?>
                            <tr>
                                <td class="text-center"><?php echo $voiture['nom_modele']; ?></td>
                                <td class="text-center"><?php echo $voiture['prix']; ?><b> €</b></td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr><td colspan="3">Aucune voiture trouvée.</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

        
</body>
</html>