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


else if($_SESSION['role'] == 'administrator') {
    header("Location: admin.php");
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
    <form class="bootstrap-form-with-validation" method="POST" action="editGridAction.php?id=<?=$_GET['id']?>" style="margin-top: 194px;margin-right: 92px;margin-left: 130px;">
    <?php
                 if (isset($_GET['id']))
                 {
                     require('config/connectBDD.php');
                     $id = $_GET['id'];
                     $req = "SELECT * FROM grid WHERE id='$id'";
                     
                     $res = $conn->query($req);
              
                     
                     if ($res->rowCount() > 0) {
                         
                         if($row = $res->fetch(PDO::FETCH_ASSOC)) { 
                            echo'<h2 class="text-center">Modifier la grille du candidat N°'. " ". $row['candidat_number'] . '</h2>';
                            echo'<div class="form-group mb-3"><label class="form-label" for="text-input">Numéro de candidat :</label><input class="form-control" type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" id="text-input" maxlength="9" name="candidat_number" value='. $row['candidat_number'] . " " . 'required></div>';
                            echo'<div class="form-group mb-3"><label class="form-label" for="text-input">Nom :</label><input class="form-control" type="text" id="text-input" name="lastname" value='. $row['lastname'] . " " . 'required></div>';
                            echo'<div class="form-group mb-3"><label class="form-label" for="text-input">Prénom :</label><input class="form-control" type="text" id="text-input" name="firstname" value='. $row['firstname'] . " " . 'required></div>';
                            echo' <div class="form-group mb-3"><label class="form-label" for="text-input" >Série :</label>';
                            echo'<select class="form-control" type="text" id="text-input" name="serie" required>';
                                echo'<option value="null">Choisir une série</option>';
                                echo'<option value="ES_S">ES / S (12pts)</option>';
                                echo'<option value="STMG">STMG (10pts)</option>';
                                echo'<option value="PRO">PRO (8pts)</option>';
                                echo'<option value="L">L (9pts)</option>';
                                echo'<option value="Autres">Autres (5pts)</option>';
                            echo'</select>';
                            echo'</div>';
                            echo'<div class="form-group mb-3">';
                            echo'<div class="form-check"><label for="">Travail sérieux :</label>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="serious" value="vrai" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Oui (+1pt)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="serious" value="faux"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Non (-1pt)</label></div>';
                            echo'</div> <br>'; 
                            echo'<div class="form-group mb-3">'; 
                            echo'<div class="form-check"><label for="">Absence :</label>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="absence" value="vrai" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Oui (-2pts ou dossier refusé)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="absence" value="faux"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Non (+0pt)</label></div>';
                            echo'</div> <br>';
                            echo'<div class="form-group mb-3">';
                            echo'<div class="form-check"><label for="">Attitude / Comportement :</label>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="behavior" value="vrai" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Oui (dossier refusé)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="behavior" value="faux"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Non (+1pt)</label></div>';
                            echo'</div> <br>';
                            echo'<div class="form-group mb-3">';
                            echo'<div class="form-check"><label for="">Étude supérieur :</label>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="higher_education" value="vrai" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Oui (+1pt)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="higher_education" value="faux"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Non (+0pt)</label></div>';
                            echo'</div> <br>';
                            echo'<div class="form-group mb-3">';
                            echo'<div class="form-check"><label for="">Avis PP :</label>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="avis_pp" value="B" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Bien (+2pts)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="avis_pp" value="AB"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Assez bien (+1pt)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="avis_pp" value="Insuf" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Insuffisant (+0pt)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="avis_pp" value="Negatif"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Négatif (-2pts)</label></div>';
                            echo'</div> <br>';
                            echo'<div class="form-group mb-3">';
                            echo'<div class="form-check"><label for="">Avis Proviseur :</label>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="avis_principal" value="B" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Bien (+2pts)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="avis_principal" value="AB"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Assez bien (+1pt)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="avis_principal" value="Insuf" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Insuffisant (+0pt)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="avis_principal" value="Negatif"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Négatif (-2pts)</label></div>';
                            echo'</div> <br>';
                            echo'<div class="form-group mb-3">';
                            echo'<div class="form-check"><label for="">Lettre de motivation :</label>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="motivation_letter" value="B" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Bien (+2pts)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="motivation_letter" value="AB"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Assez bien (+1pt)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="motivation_letter" value="Insuf" id="formCheck-10"><label class="form-check-label" for="formCheck-10">Insuffisant (+0pt)</label></div>';
                                echo'<div class="form-check"><input class="form-check-input" type="radio" name="motivation_letter" value="Negatif"  id="formCheck-11"><label class="form-check-label" for="formCheck-11">Négatif (-2pts)</label></div>';
                            echo'</div> <br>';
                            echo'<div class="form-group mb-3"><label class="form-label" for="textarea-input">Remarques </label><textarea class="form-control" id="textarea-input" name="notice" placeholder="Votre remarque..." required></textarea></div>';
                            echo' <div class="form-group mb-3"><label class="form-label" for="text-input">Note du candidat : (0 si dossier refusé)</label><input class="form-control" placeholder="/20" type="number" min="0" max="20" id="text-input" name="note" value='. $row['note'] . " " . 'required></div>';
                         }
                    }
                }    
    ?>
        <div class="form-group mb-3"><button class="btn btn-primary" type="submit">Ajouter le candidat</button></div>
    </form>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>