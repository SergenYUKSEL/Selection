<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$passwd = sha1($_POST['password']);
$confirm_passwd = sha1($_POST['confirm_password']);
$role = $_POST['role'];

if ($_POST['password'] !== $_POST['confirm_password']) {
    die();
    }
    try {
        require('config/connectBDD.php');
        $send = $conn->prepare("INSERT INTO account(firstname, lastname, email, password, confirm_password, role) 
                                VALUES(:firstname, :lastname, :email, :password, :confirm_password, :role)");
        $send->execute(array(
            ":firstname" => $firstname,
            ":lastname" => $lastname,
            ":email" => $email,
            ":password" => $passwd,
            ":confirm_password" => $confirm_passwd,
            ":role" => $role));
            sleep(3);
            echo"<script language=\"javascript\">"
            . "alert('Le compte a bien été créé !')" . "</script>"
              . "<script language=\"javascript\">" .  "window.location.replace('index.php');" .  "</script>";
    }
    catch(PDOExeption $e) {
        echo 'Impossible de traiter les donnée, Erreur !  : '. $e->getMessage();
    }
    
 ?>