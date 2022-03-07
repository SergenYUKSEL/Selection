<?php
session_start();
require_once __DIR__.'/vendor/autoload.php';

use OTPHP\TOTP;
$otp = TOTP::create($_SESSION['chl']);

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
    <div id="myModal">
        <div class="modal-dialog modal-login">
            <div class="modal-content" style="margin: 0px;margin-top: 194px;">
                <div class="modal-header">
                    <h4 class="h4 modal-title">Portail de connexion</h4>
                </div>
    <div class="modal-body">
                    <form action="validate_qrcode.php" method="POST">
                      <div class="form-group"><i class="fa fa-google" aria-hidden="true"></i><input class="form-control" type="number" name="code-auth" placeholder="Google Authenticator" required="required" style="margin-top: 45px;"></div>
                         <p>Code Google Auth : <?php  echo $otp->now();?></p>
                        <div class="form-group"><button class="btn btn-primary btn-block btn-lg" type="submit" name="validateform" style="margin-top: 33px;">Confirmer</button></div>
                        

                    </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>