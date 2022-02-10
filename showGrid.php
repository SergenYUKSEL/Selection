<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header("Location: index.php");
    die();
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
    <div class="col-md-12 search-table-col" style="margin-top: 183px;margin-right: 0px;">
    <?php
                 if (isset($_GET['id']))
                 {
                     require('config/connectBDD.php');
                     $id = $_GET['id'];
                     $req = "SELECT * FROM grid WHERE id='$id'";
                     
                     $res = $conn->query($req);
              
                     
                     if ($res->rowCount() > 0) {
                         
                         if($row = $res->fetch(PDO::FETCH_ASSOC)) { 
                            echo'<h1 style="margin-left: 250px;">Information sur le candidat N°'  . $row['candidat_number'].'</h1> <br>';
                            echo'<div class="table-responsive table table-hover table-bordered results">';
                                echo' <table class="table table-hover table-bordered">';
                                echo'<tbody align="center">';
                                    echo '<th>Numéro du candidat</th><td>' , $row['candidat_number'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Nom</th><td>' , $row['lastname'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Prénom</th><td>' , $row['firstname'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Série</th><td>' , $row['serie'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Travail sérieux</th><td>' , $row['serious'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Absence</th><td>' , $row['absence'], '</td>';
                                    echo '</tr>';
                                    echo ' <tr>';
                                    echo '<th>Attitude / Comportement</th><td>' , $row['behavior'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Etude supérieur</th><td>' , $row['higher_education'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Avis PP</th><td>' , $row['avis_pp'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Avis Proviseur</th><td>' , $row['avis_principal'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Lettre de motivation</th><td>' , $row['motivation_letter'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Remarque</th><td>' , $row['notice'], '</td>';
                                    echo '</tr>';
                                    echo '<tr>';
                                    echo '<th>Note</th><td>' , $row['note'], '/20</td>';
                                    echo '</tr>';
                         }
                        }
                    }
                    ?>
                    </tbody>
            </table>
        </div>
        <a type="button" href="listGrid.php?req=1" style="margin-left:45%" class="btn btn-primary">Revenir en arrière</a>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>