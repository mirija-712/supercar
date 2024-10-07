<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Espace modele </title>
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
    // Informations de connexion à la base de données
    $serveur = "localhost"; // ou "127.0.0.1"
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
    $sql = "SELECT id_modele, nom_modele FROM modele";
    $resultat = $connexion->query($sql);

    ?>

            <div class="row justify-content-center">
                <div class="col-md-10">
                        <br><br>
                        <h1 align="center">
                            Suppression Modele
                        </h1>

                        <p align="right">
                            <button>
                                <a href="../choix_modification.php" class="btn btn-info"> Retour</a>
                            </button>
                        </p>

                        
                    <div class="row justufy-content-center">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <form action="../../../fonction_php_voiture/manage_informations_modele.php" method="post">
                                <div class="col-md-12">   
                                    <p> * Pour supprimer sans avoir a remplir le formulaire, juste entrer le  'id modele'</p>  
                                    <label for="nom">ID modele :</label>
                                    <input type="number" name="id_modele" required><br>
                                    <p align="center">
                                        <input type="submit" class="btn btn-danger" value="Supprimer" name="delete">
                                    </p>  
                                    <br><br>
                                </div>
                            </form> 
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>   
                </div>
            </div>

            <br><br>


            <div class="row justify-content-center">
                <h1 align="center">
                    Tableau
                </h1>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>	
                                <th>ID modele</th>
                                <th>Nom modele</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // AFFICHER CLIENT DANS TABLEAU ? A CHANGER SI PAS BON 
                            
                            if ($resultat->num_rows > 0) { //TANT QU'IL Y A UNE LIGNE LIBRE DANS LA TABLE "client_inscrit" (BASE)//
                                while ($row = $resultat->fetch_assoc()) { //PERMET DE RECUP CHAQUE LIGNE SOUS FORME DE TABLEAU ASSOCIATIF AVEC LA BASE//
                                    echo "<tr>";
                                    echo "<td width='20px' height='20px' class='text-center'>" . $row["id_modele"] . "</td>";
                                    echo "<td width='20px' height='70px' class='text-center'>" . $row["nom_modele"] . " </td>";
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

</body>
</html>