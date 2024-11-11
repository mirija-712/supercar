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
    <link href="css/bootstrap.css" rel="stylesheet"/>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Espace evenements </title>
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
        input[type="text"],[type="date"],[type="time"],[type="file"],[type="number"],
        select,textarea {
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
include ("../../../include_bdd/connexion.bdd.php");


    // AVEC TROIS TABLE ?
    $sql = "SELECT * FROM evenements";
    $resultat = $connexion->query($sql);

    ?>

        <div class="row justify-content-center">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <br><br><p align="center">
                    <a href="../../../Accueil_admin/menu-admin.php" class="btn btn-info"> Retour</a>
                </p>
            </div>
        </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <br>
                    <h1 align="center">
                        Ajouter 
                    </h1><br>
                    
                    <form action="fonction_php/manage_evenements.php" method="post">
                        <label> Titre de l'évènement :</label><br>
                        <input type="text" name="titre" required>
                        <div class="row">
                            <div class="col-md-6">
                                <label> Date :</label><br>
                                <input type="date" name="date_evenement" required>
                            </div>
                            <div class="col-md-6">
                                <label> Heure :</label><br>
                                <input type="time" name="heure" required>
                            </div>
                        </div>
                        <label> Lieu :</label><br>
                        <input type="text" name="lieu" required>
                        <label> Invitation :</label><br>
                        <input type="text" name="type_voiture" required>
                        <label> Déscription :</label><br>
                        <textarea id="message" name="description" rows="10" cols="100" required></textarea><br>
                        <label > Photo : </label><br>
                        <input type="file" name="photo" required> <br><br>

                        <div class="row justify-content-center">
                            <div class="col-md-2">          
                                <input type="submit" class="btn btn-success" value="Ajouter" name="insert">
                            </div>
                        </div>
                    </form>
                </div>    
 
                <div class="col-md-5">
                    <br>
                    <h1 align="center">
                        Modifier 
                    </h1><br>

                    <form action="fonction_php/manage_evenements.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label> Titre de l'évènement :</label>
                                <input type="text" name="titre" required>
                            </div>
                            <div class="col-md-6">
                                <label >ID de l'évènement: </label>
                                <input type="number" name="id_evenement" required> <br>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label> Date :</label><br>
                                <input type="date" name="date_evenement" required>
                            </div>
                            <div class="col-md-6">
                                <label> Heure :</label><br>
                                <input type="time" name="heure" required>
                            </div>
                        </div>
                        <label> Lieu :</label><br>
                        <input type="text" name="lieu" required>
                        <label> Invitation :</label><br>
                        <input type="text" name="type_voiture" required>
                        <label> Déscription :</label><br>
                        <textarea id="message" name="description" rows="10" cols="100" required></textarea><br>
                        <label > Photo : </label><br>
                        <input type="file" name="photo" required> <br><br>



                        <div class="row justify-content-center">
                            <div class="col-md-2">          
                                <input type="submit" class="btn btn-warning" value="Modifier" name="update">
                            </div>
                        </div>

                    </form>
                </div>    
            </div>

            <div class="row justify-content-center">
                <div class="col-md-4">
                    <br><br><br>

                    <form action="fonction_php/manage_evenements.php" method="post">
                    <h1 align="center">
                        Supprimer
                    </h1><br>
                        <label > ID de l'évènement:(pour supprimer directement l'evenement entier)</label><br>
                        <input type="number" name="id_evenement" required> <br><br>


                        <div class="row justify-content-center">
                            <div class="col-md-2">          
                                <input type="submit" class="btn btn-danger" value="Supprimer" name="delete">
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <br><br>

            <div class="row justify-content-center">
                <div class="col-md-11">
                    <h1 align="center">
                        Tableau
                    </h1>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>	
                                    <th>ID de l'évènement</th>
                                    <th>Titre de l'évènement</th>
                                    <th>Date</th>
                                    <th>Heure</th>
                                    <th>Lieu</th>
                                    <th>Type de voiture</th>
                                    <th>Description</th>
                                    <th>photo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // AFFICHER CLIENT DANS TABLEAU ? A CHANGER SI PAS BON 
                                
                                if ($resultat->num_rows > 0) { //TANT QU'IL Y A UNE LIGNE LIBRE DANS LA TABLE "client_inscrit" (BASE)//
                                    while ($row = $resultat->fetch_assoc()) { //PERMET DE RECUP CHAQUE LIGNE SOUS FORME DE TABLEAU ASSOCIATIF AVEC LA BASE//
                                        echo "<tr>";
                                        echo "<td width='20px' height='20px' class='text-center' >" . $row["id_evenement"] . " </td>";
                                        echo "<td width='20px' height='20px' class='text-center' >" . $row["titre"] . " </td>";
                                        echo "<td width='70px' height='70px' class='text-center' >" . $row["date_evenement"] . " </td>";
                                        echo "<td width='70px' height='70px' class='text-center' >" . $row["heure"] . " </td>";
                                        echo "<td width='70px' height='70px' class='text-center' >" . $row["lieu"] . " </td>";
                                        echo "<td width='70px' height='70px' class='text-center' >" . $row["type_voiture"] . " </td>";
                                        echo "<td width='70px' height='70px' class='text-center' >" . $row["description"] . " </td>";
                                        echo "<td width='70px' height='70px' class='text-center'><img src='" . $row["photo"] . "' width='200px' height='200px' ></td>";
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