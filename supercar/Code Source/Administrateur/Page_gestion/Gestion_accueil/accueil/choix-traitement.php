<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["choix"] == "modifierTitresTextes") 
    {
        header("Location: modif-texte/accueil.php");
        exit();
    } 
    
    elseif ($_POST["choix"] == "modifierImagesVideos") 
    {
        header("Location: modif-img-vid/accueil-2.php");
        exit();
    }

    elseif ($_POST["choix"] == "ajout") 
    {
        header("Location: ajouter/ajout-accueil.php");
        exit();
    }
}
?>
