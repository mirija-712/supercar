<?php
session_start(); // Démarrer la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['nom_utilisateur'])) {
    $lien_demande_essai = "pages/demande_essaie/demande_essai.php";
    $lien_connexion = "pages/login/fonction_php/deconnexion.php"; // Lien de déconnexion lorsque l'utilisateur est connecté
    $icone_connexion = "icones/icone_connexion/icons8-logout-96.png"; // Icône de déconnexion
} else {
    $lien_demande_essai = "pages/login/seconnecter.php";
    $lien_connexion = "pages/login/inscription_main.php"; // Lien d'inscription lorsque l'utilisateur n'est pas connecté
    $icone_connexion = "icones/icone_connexion/icons8-connexion-96.png"; // Icône de connexion
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCUEIL</title>

    <!-- FICHIER CSS DE BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <style>
        .zoomable-image {
            transition: transform 0.3s ease; /* Ajoute une transition sur la transformation */
        }

        .zoomable-image:hover {
            transform: scale(1.1); /* Zoom de 10% lorsque la souris passe dessus */
        }

        .zoomable {
        transition: transform 0.3s ease; /* Ajoute une transition sur la transformation */
        }

        .zoomable:hover {
            transform: scale(1.3); /* Zoom de 10% lorsque la souris passe dessus */
        }

        .zoomable-video {
        transition: border-color 0.2s ease; /* Ajoute une transition sur la couleur de l'encadrement */
        border: 8px solid #E2E2E2; /* Définit une bordure de 5 pixels solide de couleur #E2E2E2 */
        }

        .zoomable-video:hover {
            border-color: #4cbdda; /* Changement de la couleur de l'encadrement lors du survol */
        }
    </style>

    <?php
    // Informations de connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "supercar";

    // Créer une connexion à la base de données
    $db = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if ($db->connect_error) {
        die("Connexion échouée : " . $db->connect_error);
}

    ?>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-md navbar-dark bg-light">

        <div class="container"> 
    
            <a class="navbar-brand" href="#">
                <img src="Logo_page/supercar.png" alt="" id = "logo">
            </a>
    
            <!-- LE TOGGER A TROIS BARRES -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto text-center">
    
                    <li class="nav-item">
                        <a class="nav-link" href="#">ACCUEIL</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="pages/voitures/1-0-voitures.php">VOITURES</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $lien_demande_essai; ?>">DEMANDE ESSAI</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="pages/evenement/evenement.php">EVENEMENTS</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link" href="pages/contact/contactez-nous.php">CONTACTEZ-NOUS</a>
                    </li>
    
                </ul>
            </div>
    
            <a href="<?php echo $lien_connexion; ?>" class="logo-container">
                <img src="<?php echo $icone_connexion; ?>" alt="Logo">
            </a>
            
        </div>
    </nav>
    
<!---------------------------------------------------------SECTION MAIN AVEC LA VIDEO COMME FOND--------------------------------------------------------------------->

<!-- PARTIE TITRE / PARAMETRE BOOTSTRAP + CSS POUR TITRE -->
<section class="main">
        <div class="container-fluid">
            <div class = "row">
                <div class = "col-md-12 text-center">
                    <h1 class = "titre">
                        <!-- CONNEXION TITRE AVEC BASE DE DONNEE -->
                        <?php
                            $sql = "SELECT * FROM accueil WHERE id_partie = 0";
                            $result = $db->query($sql);
 
                            // Vérifie si la requête a retourné des résultats
                            if ($result !== null && $result->num_rows > 0) {
                                // Affiche les données de chaque ligne
                                while ($row = $result->fetch_assoc()) {
                                    echo $row["titre"] ;
                                }
                            } else {
                                echo "0 résultats";
                            }
                        ?>
                    </h1>
                </div>
            </div>
        </div>
 
<!-- PARTIE VIDEO -->
        <video autoplay loop muted> <!-- POUR QU'ELLE TOURNE EN BOUCLE -->
            <?php
                $sql = "SELECT * FROM accueil WHERE id_partie = 0";
                $result = $db->query($sql);
 
                // Vérifie si la requête a retourné des résultats
                if ($result !== null && $result->num_rows > 0) {
                    // Affiche les données de chaque ligne
                    while ($row = $result->fetch_assoc()) {
                        echo "<source src='mp4/".$row["video"]."'type='video/mp4'>" ;
                    }
                } else {
                    echo "0 résultats";
                }
            ?>        
        </video>
    </section>
    <br><br><br>
 
    <!-- LES TROIS BOUTON/IMAGE : VOITURES, EVENEMENTS ET QUI SOMMES NOUS ? -->
 
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-4 text-center">
                <img src="icones/icone-deco/icons8-voiture-100.png" alt="img-fluid" style="width:20%;">
                <br><br>
                <a href="#mod" class="btn btn-outline-primary">VOITURES</a>
                <br><br>
            </div>
 
            <div class = "col-md-4 text-center">
                <img src="icones/icone-deco/icons8-bookmark-book-128.png" alt="img-fluid" style="width:20%;">
                <br><br>
                <a href="#ev" class="btn btn-outline-primary">EVENEMENTS</a>
                <br><br>
            </div>
 
            <div class = "col-md-4 text-center">
                <img src="icones/icone-deco/icons8-groupe-d'utilisateurs-80.png" alt="img-fluid" style="width:20%;">
                <br><br>
                <a href="#qsn" class="btn btn-outline-primary">QUI SOMMES-NOUS ?</a>
                <br><br>
            </div>
        </div>
    </div>
 
<!---------------------------------------------------------PARTIE DEMANDE ESSAI--------------------------------------------------------------------->
   
<!-- TEXTE INTRO DE DEMANDE ESSAI -->
    <br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php
                    $sql = "SELECT * FROM accueil WHERE id_partie = 1";
                    $result = $db->query($sql);
 
                    // Vérifie si la requête a retourné des résultats
                    if ($result !== null && $result->num_rows > 0) {
 
                        // Affiche les données de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            echo "<p>" . $row["texte"] . "</p>";
                        }
                    } else {
                        echo "0 résultats";
                    }
                ?>
            </div>
        </div>
    </div>
 
    <!-- VIDEO INTRODCTIF + BOUTON POUR LA DEMANDE D'ESSAI, LE USER DOIT D'ABORD SE CONNECTER OU S'INSCRIRE AVANT -->
 
    <br><br>
    <br><br>
    <section class="accueil-demande-essaie">
        <a href="pages/login/seconnecter.php">
            <video autoplay loop muted class="zoomable">
                <?php
                    $sql = "SELECT * FROM accueil WHERE id_partie = 1";
                    $result = $db->query($sql);
 
                    // Vérifie si la requête a retourné des résultats
                    if ($result !== null && $result->num_rows > 0) {
 
                        // Affiche les données de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            echo "<source src='mp4/".$row["video"]."' type='video/mp4'>" ;
                        }
                    } else {
                        echo "0 résultats";
                    }
                ?>        
            </video>
        </a>
    </section>
 
    <br><br><br><br>
 
   
<!---------------------------------------------------------PARTIE VOITURES--------------------------------------------------------------------->
 
<!-- TEXTE INTRO DES VOITURES -->
 
    <div class = "container-fluid" id = "mod">
        <div class = "row">
            <div class = "col-md-12 text-center">
                <?php
                    $sql = "SELECT * FROM accueil WHERE id_partie = 2";
                    $result = $db->query($sql);
 
                    // Vérifie si la requête a retourné des résultats
                    if ($result !== null && $result->num_rows > 0) {
 
                        // Affiche les données de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            echo "<p>" . $row["texte"] . "</p>";
                        }
                    } else {
                        echo "0 résultats";
                    }
                    ?>
            </div>
        </div>
    </div>
 
    <!-- PARTIE DES VOITURES : MERCEDES, BMW, PORSCHE ET AUDI -->
 
    <!-- MERCEDES -->
 
    <section class = "mercedes-acc">
    <a href="pages/voitures/2-2-0-voitures.php">
        <video autoplay loop muted class="zoomable-video">
                <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 3";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
 
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<source src='mp4/".$row["video"]."'type='video/mp4'>" ;
                            }
                        } else {
                            echo "0 résultats";
                        }
                ?>        
        </video>
    </a>
    </section>
 
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-12 text-center">
                <?php
                    $sql = "SELECT * FROM accueil WHERE id_partie = 3";
                    $result = $db->query($sql);
 
                    // Vérifie si la requête a retourné des résultats
                    if ($result !== null && $result->num_rows > 0) {
                        // Affiche les données de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            echo "<p>" . $row["texte"] . "</p>";
                        }
                    } else {
                        echo "0 résultats";
                    }
                ?>
            </div>
        </div>
    </div>
 
    <!-- BMW -->
 
    <section class = "bmw-acc">
        <a href="pages/voitures/2-1-0-voitures.php">
            <video autoplay loop muted class="zoomable-video">
                <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 4";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
 
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<source src='mp4/".$row["video"]."'type='video/mp4'>" ;
                            }
                        } else {
                            echo "0 résultats";
                        }
                ?>        
            </video>
        </a>
    </section>
 
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-12 text-center">
                <?php
                    $sql = "SELECT * FROM accueil WHERE id_partie = 4";
                    $result = $db->query($sql);
 
                    // Vérifie si la requête a retourné des résultats
                    if ($result !== null && $result->num_rows > 0) {
                        // Affiche les données de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            echo "<p>" . $row["texte"] . "</p>";
                        }
                    } else {
                        echo "0 résultats";
                    }
                ?>
            </div>
        </div>
    </div>
 
    <!-- PORSCHE -->
 
    <section class = "porsche-acc">
        <a href="pages/voitures/2-4-0-voitures.php">
            <video autoplay loop muted class="zoomable-video">
                <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 5";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
 
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<source src='mp4/".$row["video"]."'type='video/mp4'>" ;
                            }
                        } else {
                            echo "0 résultats";
                        }
                ?>        
            </video>
        </a>
    </section>
 
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-12 text-center">
                <?php
                    $sql = "SELECT * FROM accueil WHERE id_partie = 5";
                    $result = $db->query($sql);
 
                    // Vérifie si la requête a retourné des résultats
                    if ($result !== null && $result->num_rows > 0) {
                        // Affiche les données de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            echo "<p>" . $row["texte"] . "</p>";
                        }
                    } else {
                        echo "0 résultats";
                    }
                ?>
            </div>
        </div>
    </div>
 
    <!-- AUDI -->
 
    <section class = "audi-acc">
        <a href="pages/voitures/2-3-0-voitures.php">
            <video autoplay loop muted class="zoomable-video">
                <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 6";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
 
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<source src='mp4/".$row["video"]."'type='video/mp4'>" ;
                            }
                        } else {
                            echo "0 résultats";
                        }
                ?>        
            </video>
        </a>
    </section>
 
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-12 text-center">
                <?php
                    $sql = "SELECT * FROM accueil WHERE id_partie = 6";
                    $result = $db->query($sql);
 
                    // Vérifie si la requête a retourné des résultats
                    if ($result !== null && $result->num_rows > 0) {
                        // Affiche les données de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            echo "<p>" . $row["texte"] . "</p>";
                        }
                    } else {
                        echo "0 résultats";
                    }
                ?>
            </div>
        </div>
    </div>
    <br><br><br>
 
   <!---------------------------------------------------------PARTIE EVENEMENTS --------------------------------------------------------------------->
 
<!-- LE TEXTE D'INTRO DE EVENEMENTS -->
    <br>
    <section class = "ev" id = "ev">
        <div class = "container-fluid">
            <div class = "row">
                <div class = "col-md-12 text-center">
                    <?php
                    $sql = "SELECT * FROM accueil WHERE id_partie = 7";
                    $result = $db->query($sql);
 
                    // Vérifie si la requête a retourné des résultats
                    if ($result !== null && $result->num_rows > 0) {
                        // Affiche les données de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            echo "<p>" . $row["texte"] . "</p>";
                        }
                    } else {
                        echo "0 résultats";
                    }
                    ?>
                </div>
            </div>
        </div>
 
        <br>
 
<!-- LES DEUX IMAGES DE EVENEMENTS  -->
        <div class = "container-fluid">
            <div class = "row">
                <div class = "col-md-6 text-center">
                    <a href="pages/evenement/evenement.php">
                        <?php
                                $sql = "SELECT * FROM accueil WHERE id_partie = 7";
                                $result = $db->query($sql);
 
                                // Vérifie si la requête a retourné des résultats
                                if ($result !== null && $result->num_rows > 0) {
                                    // Affiche les données de chaque ligne
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<img src='pages/evenement/images/".$row["img"]."'class='zoomable-image' style='width: 80%; height: auto;'>" ;
                                    }
                                } else {
                                    echo "0 résultats";
                                }
                            ?>
                    </a>
                </div>
 
                <div class = "col-md-6 text-center">
                    <a href="pages/evenement/evenement.php">
                        <?php
                                $sql = "SELECT * FROM accueil WHERE id_partie = 7";
                                $result = $db->query($sql);
 
                                // Vérifie si la requête a retourné des résultats
                                if ($result !== null && $result->num_rows > 0) {
                                    // Affiche les données de chaque ligne
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<img src='pages/evenement/images/".$row["img2"]."'class='zoomable-image' style='width: 80%; height: auto;'>" ;
                                    }
                                } else {
                                    echo "0 résultats";
                                }
                            ?>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <br><br><br><br>
 
<!---------------------------------------------------------PARTIE QUI SOMMES NOUS ?--------------------------------------------------------------------->
 
<!-- LE TITRE DE QUI SOMMES NOUS -->
 
    <section class="qsn" id="qsn">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 13";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<h1>" . $row["titre"] . "</h1>";
                            }
                        } else {
                            echo "0 résultats";
                        }
                    ?>
                </div>
            </div>
            <br>
 
<!-- IMAGE DE QUI SOMMES NOUS    : A METTRE ICI SI RAJOUTER -->    
 
            <br><br>        
            <div class="row">
                <div class="col-md-1">
   
                </div>
 
<!-- LES TROIS TEXTES DE QUI SOMMES NOUS -->
 
<!-- TEXTE 1 -->
   
                <div class="col-md-5 text-center">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 8";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            }
                        } else {
                            echo "0 résultats";
                        }
                    ?>
                </div>
   
                <div class="col-md-5 text-center">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 8";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["texte"] . "</p>";
                            }
                        } else {
                            echo "0 résultats";
                        }
                    ?>
                </div>
   
                <div class="col-md-1">
   
                </div>
            </div>
            <br><br>
   
            <div class="row">
                <div class="col-md-1">
   
                </div>
 
<!-- TEXTE 2 -->
 
                <div class="col-md-5 text-center">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 9";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            }
                        } else {
                            echo "0 résultats";
                        }
                    ?>
                </div>
   
                <div class="col-md-5 text-center">
                    <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 9";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["texte"] . "</p>";
                            }
                        } else {
                            echo "0 résultats";
                        }
                    ?>
                </div>
   
                <div class="col-md-1">
   
                </div>
            </div>
            <br><br>
   
            <div class="row">
                <div class="col-md-1">
   
                </div>
 
<!-- TEXTE 3 -->
   
                <div class="col-md-5 text-center">
                <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 10";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<h3><strong>" . $row["titre"] . "</strong></h3>";
                            }
                        } else {
                            echo "0 résultats";
                        }
                    ?>
                </div>
   
                <div class="col-md-5 text-center">
                <?php
                        $sql = "SELECT * FROM accueil WHERE id_partie = 10";
                        $result = $db->query($sql);
 
                        // Vérifie si la requête a retourné des résultats
                        if ($result !== null && $result->num_rows > 0) {
                            // Affiche les données de chaque ligne
                            while ($row = $result->fetch_assoc()) {
                                echo "<p>" . $row["texte"] . "</p>";
                            }
                        } else {
                            echo "0 résultats";
                        }
                    ?>
                </div>
   
                <div class="col-md-1">
   
                </div>
            </div>
   
<!---------------------------------- TEXTE ENTRE QUI SOMMES NOUS ET LE RENDEZ VOUS (CONTACTE) ----------------------------------------------------------------->
            <br><br>
            <?php
                $sql = "SELECT * FROM accueil WHERE id_partie = 11";
                $result = $db->query($sql);
 
                // Vérifie si la requête a retourné des résultats
                if ($result !== null && $result->num_rows > 0) {
                    // Affiche les données de chaque ligne
                    while ($row = $result->fetch_assoc()) {
                        echo "<h3><center>".$row["texte"]."</center></h3>";
                    }
                } else {
                    echo "0 résultats";
                }
            ?>
        </div>
    </section>
 
<!-------------------------------------------------POUR PRENDRE UN RENDEZ VOUS, CONTACTE--------------------------------------------------------------------->
 
<!-- TEXTE DE RENDEZ VOUS -->
    <br><br>
    <div class = "container-fluid">
        <div class = "row">
            <div class = "col-md-6 text-center">
                <?php
                    $sql = "SELECT * FROM accueil WHERE id_partie = 12";
                    $result = $db->query($sql);
 
                    // Vérifie si la requête a retourné des résultats
                    if ($result !== null && $result->num_rows > 0) {
                        // Affiche les données de chaque ligne
                        while ($row = $result->fetch_assoc()) {
                            echo "<h3><strong><br><br><br>" . $row["titre"] . "</strong></h3>";
                            echo "<p>" . $row["texte"] . "</p>";
                        }
                    } else {
                        echo "0 résultats";
                    }
                ?>
            </div>
 
            <!-- IMAGE DE RENDEZ VOUS -->
                <div class="col-md-6">
                    <div class="image-container">
                        <a href="pages/contact/contactez-nous.php">
                            <?php
                                $sql = "SELECT * FROM accueil WHERE id_partie = 12";
                                $result = $db->query($sql);
 
                                // Vérifie si la requête a retourné des résultats
                                if ($result !== null && $result->num_rows > 0) {
                                    // Affiche les données de chaque ligne
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<img src='".$row["img"]."' class='zoomable-image' style='width: 80%; height: auto;'>" ;
                                    }
                                } else {
                                    echo "0 résultats";
                                }
                            ?>
                        </a>
                    </div>
                </div>
        </div>
    </div>
    <br><br>
 

    <!-- LE FOOTER DE NOTRE SITE -->

    <footer class="footer">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <label for="" align="left">
                            © 2023 SUPER CAR.MU .Tous droits réservés. <br>
                            | MU.lot54 Battiment4  |
                            | contact@supercar.com |
                            |   +230 3215 8794     |
                            | <a href="" id="link-footer">
                                Politique de confidentialité
                            </a> |
                            |  <a href="" id="link-footer">
                                Conditions d'utilisation
                            </a> |
                            |  <a href="" id="link-footer">
                                Gérer vos cookies
                            </a> |
                            |  <a href="" id="link-footer">
                                Mention légales
                            </a> |
                            |   Suivez-nous sur <img src="icones/icone_reseau/icons8-facebook-96.png" alt="" height="20px" width="20px">
                                                <img src="icones/icone_reseau/icons8-insta-96.png" alt="" height="20px" width="20px">
                                                <img src="icones/icone_reseau/icons8-twitter-96.png" alt="" height="20px" width="20px"> | <br>
                    </label>              
                </div>
            </div>
        </div>
    </footer>
        <!-- FICHIER JS DE BOOTSTRAP (dans body : eviter ralentir page > pas indispensable) -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


