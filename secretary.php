<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header("Location: index.php");
    die();
}

else if($_SESSION['role'] == 'teacher') {
    header("Location: teacher.php");
    die();
} else if($_SESSION['role'] == 'administrator') {
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
    <div class="container">
        <div class="card card1">
            <div class="card-body">
                <h3 class="card-title">Liste des candidats</h3>
                <p class="card-text small">Liste des candidats dèja inscrit.</p>
                <div class="go-corner">
                    <div class="go-arrow"><div class="go-arrow">→</div></div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>