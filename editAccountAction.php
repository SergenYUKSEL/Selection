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

    $id = $_GET['id'];

            if(isset($_POST['firstname'])) {
                $firstname = $_POST['firstname'];
            }
            else {
                $firstname = null;

            }
            if(isset($_POST['lastname'])) {
                $lastname = $_POST['lastname'];
            }
            else {
                $lastname = null;
                
            }
            if(isset($_POST['email'])) {
                $email = $_POST['email'];
            }
            else {
                $email = null;
                
            }
            if(isset($_POST['password'])) {
                $password = sha1($_POST['password']);
            }
            else {
                $password = null;
                
            }
            if(isset($_POST['confirm_password'])) {
                $confirm_password = sha1($_POST['confirm_password']);
            }
            else {
                $confirm_password = null;
                
            }
            if(isset($_POST['role'])) {
                $role = $_POST['role'];
            }
            else {
                $role = null;
                
            }
           
            
            try{
                require('config/connectBDD.php');

                $update = $conn->prepare("
                  UPDATE account
                  SET firstname= ?,
                  lastname= ?,
                  email = ?,
                  password = ?,
                  confirm_password = ?,
                  role = ?
                  WHERE id = $id
                ");
                $update->execute(array($firstname,$lastname,$email,$password,$confirm_password,$role));
                $update->execute();
                
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
            if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password']) && isset($_POST['role'])) {
                sleep(3); // attends 3 secondes
                echo "<script language=\"javascript\">"
                . "alert('Vous avez bien modifié le compte, vous allez être redirigé vers la page de liste de comptes :')"  .  "</script>"
                  . "<script language=\"javascript\">" .  "window.location.replace('listAccounts.php');" .  "</script>";
            }

?>