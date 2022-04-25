<?php
 if(session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    if(!isset($_SESSION['logged'])) {
        header("Location: index.php");
        die();
    }

    else if($_SESSION['verify'] == false) {
        echo"<script language=\"javascript\">"
        . "alert('Il faut être authentifier pour pouvoir accéder à cette page)" .  "</script>"
          . "<script language=\"javascript\">" .  "window.location.replace('qrcode_verif.php');" .  "</script>";
          // cette condition permet à l'utilisateur, connecté mais n'ayant pas validé le qr code à ne pas passer à travers la page d'authentification
    }
    
    else if($_SESSION['role'] == 'secretary') {
        header("Location: secretary.php");
        die();
    }
    else if($_SESSION['role'] == 'administrator') {
        header("Location: admin.php");
        die();
    }
    $id = $_GET['id']; // on récupère l'id grâce à la méthode GET
    
?>
<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Suppression de compte</title>
</head>
<body>
    <?php
    require_once('config/connectBDD.php');
                $req = "DELETE FROM grid WHERE id=:id LIMIT 1"; // on supprime la grille lorsque l'id est égale à l'id récupérer grâce à la méthode GET
                $res = $conn->prepare($req);
                $res->bindValue(':id', $id);
                $res->execute();
                header('Location: listGrid.php?req=1');
                exit();
    ?>
   
</body>
</html>