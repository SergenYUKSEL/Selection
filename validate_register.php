<?php
session_start();

require_once __DIR__.'/vendor/autoload.php';

use OTPHP\TOTP;
$otp = TOTP::create();

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
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$passwd = sha1($_POST['password']);
$confirm_passwd = sha1($_POST['confirm_password']);
$role = $_POST['role'];
$chl = $otp->getSecret();
$active = "false";

if ($_POST['password'] !== $_POST['confirm_password']) {
    die();
    }
    try {
        require('config/connectBDD.php');
        $send = $conn->prepare("INSERT INTO account(firstname, lastname, email, password, confirm_password, role, chl, active) 
                                VALUES(:firstname, :lastname, :email, :password, :confirm_password, :role, :chl, :active)");
        $send->execute(array(
            ":firstname" => $firstname,
            ":lastname" => $lastname,
            ":email" => $email,
            ":password" => $passwd,
            ":confirm_password" => $confirm_passwd,
            ":role" => $role,
            ":chl" => $chl,
            ":active" => $active));
            sleep(3);
            echo"<script language=\"javascript\">"
            . "alert('Le compte a bien été créé !')" . "</script>"
              . "<script language=\"javascript\">" .  "window.location.replace('admin.php');" .  "</script>";
    }
    catch(PDOExeption $e) {
        echo 'Impossible de traiter les donnée, Erreur !  : '. $e->getMessage();
    }
    
 ?>