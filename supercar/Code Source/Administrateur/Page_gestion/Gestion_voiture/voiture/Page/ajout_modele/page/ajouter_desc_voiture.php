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
    <title>Ajout description</title>
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

    // probleme de jointure a regler
    $sql = "SELECT * FROM voitures";
    $resultat = $connexion->query($sql);

    // Requête pour récupérer les marques
    $sql_modele = "SELECT id_modele , nom_modele  FROM modele ";
    $resultat_modele = $connexion->query($sql_modele);

?>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <br><br>
                    <h1 align="center">
                        Ajouter voiture
                    </h1>
                    <p align="right">
                        <a href="../choix_modification_ajouter.php" class="btn btn-info"> Retour</a>
                    </p>
                    <br><br>
                    <form action="../../../fonction_php_voiture/manage_informations_voiture.php" method="post">
                        <div class="row justify-content-center">
                            <div class="col-md-3">
                                <label for="nom_modele">Nom modèle :</label>
                                    <select name="nom_modele" id="nom_modele" required onchange="this.options[this.selectedIndex].getAttribute('data-id')"  class="form-control">
                                        <?php
                                            if ($resultat_modele->num_rows > 0) {
                                                while ($row_modele = $resultat_modele->fetch_assoc()) {
                                                    echo "<option value='" . htmlspecialchars($row_modele['nom_modele']) . "' data-id='" . $row_modele['id_modele'] . "'>" . htmlspecialchars($row_modele['nom_modele']) . "</option>";
                                                }
                                            } else {
                                                echo "<option>Aucune marque trouvée</option>";
                                            }
                                        ?>
                                    </select>
                                    <input type="hidden" name="id_modele" id="id_modele">

                                <label for="marque">Marque :</label>
                                <select name="marque" id="marque" required class="form-control">
                                    <option value="">Choisir marque</option>
                                    <option value="BMW">BMW</option>
                                    <option value="MERCEDES">MERCEDES</option>
                                    <option value="AUDI">AUDI</option>
                                    <option value="PORSCHE">PORSCHE</option>
                                </select>

                                <label for="annee">Année :</label>
                                <select name="annee" id="annee" required class="form-control">
                                    <option value="">Choisir année</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
                                    <option value="2019">2019</option>
                                </select>

                                <label for="transmission">Transmission :</label>
                                <select name="transmission" id="transmission" required class="form-control">
                                    <option value="">Choisir transmission</option>
                                    <option value="Automatique">Automatique</option>
                                    <option value="Manuel">Manuel</option>
                                </select>
                            </div>
                            <div class="col-md-3">  
                                <label for="sieges">Sièges :</label>
                                <input type="number" name="sieges" required class="form-control">

                                <label for="prix">Prix :</label>
                                <input type="number" name="prix" required class="form-control">

                                <label for="vitesse_max">Vitesse max :</label>
                                <input type="number" name="vitesse_max" required class="form-control">

                                <label for="moteur">Moteur :</label>
                                <input type="text" name="moteur" required class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label for="consommation">Consommation :</label>
                                <input type="text" name="consommation" required class="form-control">

                                <label for="puissance">Puissance :</label>
                                <input type="number" name="puissance" required class="form-control">

                                <label for="description">Description :</label>
                                <textarea id="description" name="description" rows="6" cols="50" required class="form-control"></textarea>
    
                            </div>
                            <div class="col-md-3">
                                <div class="row justify-content-center">
                                    <label for="photo_1">Image 1 :</label><br>
                                    <input type="url" name="photo_1" required class="form-control">
                                    <label for="photo_2">Image 2 :</label><br>
                                    <input type="url" name="photo_2" required class="form-control">
                                    <label for="photo_3">Image 3 :</label><br>
                                    <input type="url" name="photo_3" required class="form-control">
                                    <label for="photo_4">Image 4 :</label><br>
                                    <input type="url" name="photo_4" required class="form-control">
                                </div> 
                                <div class="row justify-content-center">
                                    <div class="col-md-6">          
                                        <br><br><input type="submit" class="btn btn-success" value="Ajouter" name="insert">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        <br><br><br>

    <div class="row justify-content-center">
        <div class="col-md-11">
            <h1 align="center">
                Tableau
            </h1>   
                <div class="table-responsive">
                    <table class="table table-striped table-bordered" id="tableau">
                        <thead>
                            <tr>	
                                <th>ID modele</th>
                                <th>Nom modele</th>
                                <th>Marque</th>
                                <th>Année</th>
                                <th>Transmission</th>
                                <th>Sieges</th>
                                <th>Prix</th>
                                <th>Vitesse Max</th>
                                <th>Moteur</th>
                                <th>Consommation</th>
                                <th>Puissance</th>
                                <th>Description</th>
                                <th>Photo_1</th>
                                <th>Photo_2</th>
                                <th>Photo_3</th>
                                <th>photo_4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // AFFICHER CLIENT DANS TABLEAU ? A CHANGER SI PAS BON 
                            
                            if ($resultat->num_rows > 0) { //TANT QU'IL Y A UNE LIGNE LIBRE DANS LA TABLE "client_inscrit" (BASE)//
                                while ($row = $resultat->fetch_assoc()) { //PERMET DE RECUP CHAQUE LIGNE SOUS FORME DE TABLEAU ASSOCIATIF AVEC LA BASE//
                                    echo "<tr>";
                                        echo "<td class='text-center'>" . $row["id_modele"] . "</td>";
                                        echo "<td class='text-center'>" . $row["nom_modele"] . "</td>";
                                        echo "<td class='text-center'>" . $row["marque"] . "</td>";
                                        echo "<td class='text-center'>" . $row["annee"] . "</td>";
                                        echo "<td class='text-center'>" . $row["transmission"] . "</td>";
                                        echo "<td class='text-center'>" . $row["sieges"] . "</td>";
                                        echo "<td class='text-center'>" . $row["prix"] . "</td>";
                                        echo "<td class='text-center'>" . $row["vitesse_max"] . "</td>";
                                        echo "<td class='text-center'>" . $row["moteur"] . "</td>";
                                        echo "<td class='text-center'>" . $row["consommation"] . "</td>";
                                        echo "<td class='text-center'>" . $row["puissance"] . "</td>";
                                        echo "<td class='text-center'>" . $row["description"] . "</td>";
                                        echo "<td class='text-center'><img src='" . $row["photo_1"] . "' width='200px' height='200px' ></td>";
                                        echo "<td class='text-center'><img src='" . $row["photo_2"] . "' width='200px' height='200px' ></td>";
                                        echo "<td class='text-center'><img src='" . $row["photo_3"] . "' width='200px' height='200px' ></td>";
                                        echo "<td class='text-center'><img src='" . $row["photo_4"] . "' width='200px' height='200px' ></td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Aucune voiture trouvée.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
        
</body>
</html>