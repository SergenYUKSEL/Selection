<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header("Location: index.php");
    die();
}


    $id = $_SESSION['id'];
    $active = 'true';
    $_SESSION['active'] = 'true';
            
            try{
                require('config/connectBDD.php');
                // on change la valeur de active de false à true
                $update = $conn->prepare("
                  UPDATE account
                  SET active = ?
                  WHERE id = $id
                ");
                $update->execute(array($active));
                $update->execute();
                
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
                sleep(3); // attends 3 secondes
                echo "<script language=\"javascript\">"
                . "alert('Double authentification activé !')"  .  "</script>"
                  . "<script language=\"javascript\">" .  "window.location.replace('admin.php');" .  "</script>";
            

?>