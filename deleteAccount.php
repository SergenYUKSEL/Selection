<?php
 if(session_status() == PHP_SESSION_NONE) {
    session_start();
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
                $req = "DELETE FROM account WHERE id=:id LIMIT 1";
                $res = $conn->prepare($req);
                $res->bindValue(':id', $id);
                $res->execute();
                header('Location: listAccounts.php');
                exit();
    ?>
   
</body>
</html>