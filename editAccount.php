<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header("Location: index.php");
    die();
}

else if($_SESSION['verify'] == false) {
    echo"<script language=\"javascript\">"
    . "alert('Il faut être authentifier pour pouvoir accéder à cette page)" .  "</script>"
      . "<script language=\"javascript\">" .  "window.location.replace('qrcode_verif.php');" .  "</script>";
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
            <form method="POST" class="custom-form" action="editAccountAction.php?id=<?=$_GET['id']?>">
                <?php
                 if (isset($_GET['id']))
                 {
                     require('config/connectBDD.php');
                     $id = $_GET['id'];
                     $req = "SELECT * FROM account WHERE id='$id'";
                     
                     $res = $conn->query($req);
              
                     
                     if ($res->rowCount() > 0) {
                         
                         if($row = $res->fetch(PDO::FETCH_ASSOC)) { 
                             echo "<h1>Modification du compte de". ' ' .  $row['lastname'] . ' ' . $row['firstname'] . ' ' . "</h1>";
                             echo '<div class="row form-group">';
                                echo'<div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Nom</label></div>';
                                echo '<div class="col-sm-6 input-column"><input class="form-control" type="text" name="lastname" value='. $row['lastname'] . " " . 'required></div>';
                             echo'</div>';
                             echo '<div class="row form-group">';
                                echo'<div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Prénom</label></div>';
                                echo '<div class="col-sm-6 input-column"><input class="form-control" type="text" name="firstname" value='. $row['firstname'] . " " . 'required></div>';
                             echo'</div>';
                             echo '<div class="row form-group">';
                                echo'<div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Email</label></div>';
                                echo '<div class="col-sm-6 input-column"><input class="form-control" type="email" name="email" value='. $row['email'] . " " . 'required></div>';
                             echo'</div>';
                             echo '<div class="row form-group">';
                                echo'<div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Mot de passe</label></div>';
                                echo '<div class="col-sm-6 input-column"><input class="form-control" type="password" name="password"  required></div>';
                             echo'</div>';
                             echo '<div class="row form-group">';
                                echo'<div class="col-sm-4 label-column"><label class="col-form-label" for="name-input-field">Répéter le mot de passe</label></div>';
                                echo '<div class="col-sm-6 input-column"><input class="form-control" type="password" name="confirm_password" required></div>';
                             echo'</div>';
                             echo' <div class="row form-group">';
                             echo'<div class="col-sm-4 label-column"><label class="col-form-label" for="dropdown-input-field">Rôle</label></div>';
                             echo'<select class="form-select" aria-label="Default select example" name="role" required>';
                                echo'<option selected>Choisi le rôle</option>';
                                echo'<option value="administrator">Administrateur</option>';
                                echo'<option value="teacher">Professeur</option>';
                                echo'<option value="secretary">Secrétaire</option>';
                             echo'</select>';

                         }
                        }
                }   
                ?>
                </div><button class="btn btn-light submit-button" name="updated"  type="submit">Créer le compte</button>
            </form>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>