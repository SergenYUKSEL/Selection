<?php
session_start();

require('config/connectBDD.php');

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
?>