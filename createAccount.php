<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header("Location: index.php");
    die();
}

else if($_SESSION['role'] == 'teacher') {
    header("Location: teacher.php");
    die();
} else if($_SESSION['role'] == 'secretary') {
    header("Location: secretary.php");
    die();
}
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
    <div class="row register-form" style="margin-top: 119px;">
        <div class="col-md-8 offset-md-2">
            <form method="POST" class="custom-form" action="validate_register.php">
            
                <h1>Création d'un compte</h1>
                <div class="row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Nom</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="lastname" required></div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Prénom</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="text" name="firstname" required></div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="email-input-field">Email </label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="email" name="email" required></div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="pawssword-input-field">Mot de passe</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password" name="password" required></div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="repeat-pawssword-input-field">Répéter le mot de passe</label></div>
                    <div class="col-sm-6 input-column"><input class="form-control" type="password" name="confirm_password" required></div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Rôle</label></div>
                    <select class="form-select" aria-label="Default select example" name="role" required>
                        <option selected>Choisi le rôle</option>
                        <option value="administrator">Administrateur</option>
                        <option value="teacher">Professeur</option>
                        <option value="secretary">Secrétaire</option>
                    </select>
                </div><button class="btn btn-light submit-button"  type="submit">Créer le compte</button>
            </form>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>