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
    }
    
    else if($_SESSION['role'] == 'secretary') {
        header("Location: secretary.php");
        die();
    }
    else if($_SESSION['role'] == 'administrator') {
        header("Location: admin.php");
        die();
    }
    $id = $_GET['id'];
    
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
                $req = "DELETE FROM grid WHERE id=:id LIMIT 1";
                $res = $conn->prepare($req);
                $res->bindValue(':id', $id);
                $res->execute();
                header('Location: listGrid.php?req=1');
                exit();
    ?>
   
</body>
</html>