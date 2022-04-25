<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header("Location: index.php");
    die();
}

require_once __DIR__.'/vendor/autoload.php';

use OTPHP\TOTP;
$otp = TOTP::create($_SESSION['chl']); // on créer l'authentification qr code grâce au code chl qu'on a généré automatiquement et insérer dans la bdd lors de l'inscription
$otp->setLabel('Selection' . ' ' . $_SESSION['lastname']); // Lorsque l'utilisateur scannera le qr code, le nom du code sera Selection suivi de son nom de famille
$chl = $otp->getProvisioningUri(); // génération d'un uri qui est dynamique avec les données de l'utilisateurs pour la variable $link
$link = "https://chart.googleapis.com/chart?cht=qr&chs=200x200&chl=".$chl;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>selection</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Hover-cards.css">
    <link rel="stylesheet" href="assets/css/Modal-Login-form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/reveal-nav-on-scroll.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body>
    <?php require('header.php'); ?>
    <div id="myModal">
        <div class="modal-dialog modal-login">
            <div class="modal-content" style="margin: 0px;margin-top: 194px;">
                <div class="modal-header">
                    <h4 class="h4 modal-title">Activer la double authentification</h4>
                </div>
                <div class="modal-body">
                     <img style="margin-left:4vh;margin-bottom:3vh;" src="<?php  echo $link ?>"></img> <!-- on affiche le qr code -->
                    <form action="validate_active_qrcode.php" method="POST">
                       <div class="form-group"><p>Veuillez scanner le QR code avec l'application Google Authentification</p></div>
                       <?php if($_SESSION['active'] == 'true') {
                         echo '<div class="form-group"><a href="validate_disabled_qrcode.php" class="btn btn-danger" >Désactiver</a></div>'; // si active est true, alors on va afficher le bouton désactiver
                       } else {
                           echo '<div class="form-group"><button class="btn btn-primary btn-block btn-lg" type="submit" name="validateform" style="margin-top: 33px;">Activer</button></div>'; // si active est false, alors on va afficher le bouton activer
                       }
                        
                        ?>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>