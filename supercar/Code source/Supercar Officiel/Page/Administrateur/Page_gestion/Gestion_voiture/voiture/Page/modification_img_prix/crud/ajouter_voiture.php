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
    // Informations de connexion à la base de données
    $serveur = "localhost";
    $utilisateur = "root";
    $mot_de_passe = "";
    $nom_bdd = "supercar";

    // Connexion à la base de données
    $connexion = new mysqli($serveur, $utilisateur, $mot_de_passe, $nom_bdd);

    // Vérifier la connexion
    if ($connexion->connect_error) {
        die("Connexion échouée: " . $connexion->connect_error);
    }

    // AVEC TROIS TABLE ?
    // probleme de jointure a regler
    $sql = "SELECT * FROM voitures";
    $resultat = $connexion->query($sql);

    ?>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <br><br>
                    <h1 align="center">
                        Ajouter voiture
                    </h1>

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
                                <input type="text" name="nom_modele" required><br><br>
                                <label for="nom">ID modele : </label>
                                <input type="text" name="id_modele" required><br><br>
                                <label for="nom">Marque :</label>
                                <input type="text" name="marque" required><br><br>
                                <label for="nom">Année :</label>
                                <input type="text" name="annee" required><br><br>
                                <label for="nom">Transmission :</label>
                                <input type="text" name="transmission" required><br><br>
                                <label for="nom">Sièges :</label>
                                <input type="number" name="sieges" required><br><br>
                                <label for="nom">Prix :</label>
                                <input type="number" name="prix" required><br><br>
                            </div>
                            <div class="col-md-6">
                                <label for="nom">Vitesse max :</label>
                                <input type="text" name="vitesse_max" required><br><br>
                                <label for="nom">Moteur :</label>
                                <input type="text" name="moteur" required><br><br>
                                <label for="nom">Consommation :</label>
                                <input type="text" name="consommation" required><br><br>
                                <label for="nom">Puissance :</label>
                                <input type="text" name="puissance" required><br><br>   
                                <label for="message">Description :</label><br>
                                <textarea id="message" name="description" rows="10" cols="50" required></textarea><br><br>
                            </div>
    
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <label for="message">Image_1 : <b>* importer une image web </b></label><br>
                                <input type="text" name="photo_1" required><br><br>
                                <label for="message">Image_2 : <b>* importer une image web </b></label><br>
                                <input type="text" name="photo_2" required><br><br>
                            </div>                         
                            <div class="col-md-6">
                                <label for="message">Image_3 : <b>* importer une image web </b></label><br>
                                <input type="text" name="photo_3" required><br><br>
                                <label for="message">Image_4 : <b>* importer une image web </b></label><br>
                                <input type="text" name="photo_4" required><br><br>
                            </div>                            
                        </div>   

                        </div>        

                        <div class="row justify-content-center">
                            <div class="col-md-2">          
                                <input type="submit" class="btn btn-success" value="Ajouter" name="insert">
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