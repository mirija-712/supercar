<?php
// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['nom_utilisateur'])) {
    $lien_demande_essai = "../demande_essaie/demande_essai.php";
} else {
    $lien_demande_essai = "../login/seconnecter.php";
}
?>
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Accès rapide</h3>
                <ul class="list-unstyled">
                    <li><a href="<?php echo $lien_demande_essai; ?>">Demande d'essai</a></li>
                    <li><a href="../contact/contactez-nous.php">Contact</a></li>
                    <li><a href="../voitures/1-0-voitures.php">Les véhicules disponibles</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Modèles</h3>
                <ul class="list-unstyled">
                    <li><a href="../voitures/1-1-bmw.php">BMW</a></li>
                    <li><a href="../voitures/1-2-mercedes.php">Mercedes-Benz</a></li>
                    <li><a href="../voitures/1-3-audi.php">Audi</a></li>
                    <li><a href="../voitures/1-4-porsche.php">Porsche</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Événements</h3>
                <ul class="list-unstyled">
                    <li><a href="../evenement/evenement.php">Les événements à venir</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-12 text-center">
                    <p>© 2023 SUPER CAR.MU - Tous droits réservés</p>
                    <p>MU.lot54 Bâtiment 4 | contact@supercar.com | +230 3215 8794</p>
                    <p>
                        | <a href="../politique de confidentialité/politique_de_confidentialite.php">Politique de confidentialité</a> |
                        | <a href="../politique de confidentialité/gerer_cookies.php">Gérer vos cookies</a> |
                        | <a href="../politique de confidentialité/mentions_legales.php">Mentions légales</a> |
                        | <a href="../politique de confidentialité/condition_d'utilisation.php">Conditions d'utilisation</a> |
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer> 