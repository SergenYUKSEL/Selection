<?php
session_start();

require('config/connectBDD.php');
require_once __DIR__.'/vendor/autoload.php';

use OTPHP\TOTP;
$otp =TOTP::create('UQ6PECBOFV7DAG6EYEGHC65HYJQNVW6ZPC6H6LB27RI4J76H3E3KJYC4P4N6QZ5CKDY4W4WFCCJUC3CPM2GFGA5BL4TIRJUJOLQNX7Y');
if(!empty($_POST['code-auth'])) {
   if($otp->verify(htmlspecialchars($_POST['code-auth']))) {
    if(isset($_POST['validateform']))
    {
        $emailconnect = htmlspecialchars($_POST['email']);
        $passwdconnect = sha1($_POST['password']);
        if(!empty($emailconnect) AND !empty($passwdconnect))
        {
            $requser = $conn->prepare("SELECT * FROM account WHERE email = ? AND password = ?");
            $requser->execute(array($emailconnect, $passwdconnect));
            $userexist = $requser->rowCount();
            if($userexist == 1)
            {
              $userinfo = $requser->fetch();
              $_SESSION['id'] = $userinfo['id'];
              $_SESSION['firstname'] = $userinfo['firstname'];
              $_SESSION['lastname'] = $userinfo['lastname'];
              $_SESSION['email'] = $userinfo['email'];
              $_SESSION['role'] = $userinfo['role'];
              $_SESSION['logged'] = true;
              if($_SESSION['role']=='administrator') {
                  sleep(3);
                echo"<script language=\"javascript\">"
                . "alert('Content de vous revoir Administrateur')" .  "</script>"
                  . "<script language=\"javascript\">" .  "window.location.replace('admin.php');" .  "</script>";
  
              } else if($_SESSION['role'] =='secretary') {
                sleep(3);
              echo"<script language=\"javascript\">"
                . "alert('Content de vous revoir secretaire')"  .  "</script>"
                  . "<script language=\"javascript\">" .  "window.location.replace('secretary.php');" .  "</script>"; 
              }
                else if ($_SESSION['role'] =='teacher') {
                    sleep(3);
              echo"<script language=\"javascript\">"
                . "alert('Content de vous revoir professeur')"  .  "</script>"
                  . "<script language=\"javascript\">" .  "window.location.replace('teacher.php');" .  "</script>"; 
                }
                  
            }
            else
            {
                $erreur = "Mauvais mail ou mot de passe";
            }
        }
        else
        {
            $erreur = "Tous les champs doivent être complétés !";
        }
    }
   }
   else {
    echo"<script language=\"javascript\">"
    . "alert('Qr code invalide.')"  .  "</script>"
      . "<script language=\"javascript\">" .  "window.location.replace('teacher.php');" .  "</script>"; 
      die();
   }

  
}
  ?>