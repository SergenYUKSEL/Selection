<?php
session_start();
session_destroy();

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
                    <h4 class="h4 modal-title">Portail de connexion</h4>
                </div>
                <div class="modal-body">
                    <!-- <img style="margin-left:4vh;margin-bottom:3vh;" src="<?php // echo $link ?>"></img> -->
                    <form action="logged.php" method="POST">
                        <div class="form-group"><i class="fa fa-star fa-user"></i><input class="form-control" type="email" name="email" placeholder="Email" required="required" style="margin-top: 0px;"></div>
                        <div class="form-group"><i class="fa fa-star fa-lock"></i><input class="form-control" type="password" name="password" placeholder="Password" required="required" style="margin-top: 45px;"></div>
                      <!--  <div class="form-group"><i class="fa fa-google" aria-hidden="true"></i><input class="form-control" type="number" name="code-auth" placeholder="Google Authenticator" required="required" style="margin-top: 45px;"></div> -->
                      <!--  <p>Code Google Auth : <?php // echo $otp->now();?></p> -->
                        <div class="form-group"><button class="btn btn-primary btn-block btn-lg" type="submit" name="validateform" style="margin-top: 33px;">Se connecter</button></div>
                        

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>