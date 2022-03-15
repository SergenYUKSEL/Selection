<?php
session_start();

require('config/connectBDD.php');
require_once __DIR__.'/vendor/autoload.php';

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
              $_SESSION['chl'] = $userinfo['chl'];
              $_SESSION['active'] = $userinfo['active'];
              $_SESSION['logged'] = true;
              if($userinfo['active'] === "true") {
                $_SESSION['verify'] = false;
              }
              else if ($userinfo['active'] === "false") {
                $_SESSION['verify'] = true;
              }
              if($_SESSION['active'] == 'true') {
                echo"<script language=\"javascript\">"
                . "alert('Vous devez rentrer votre code qr code :')" .  "</script>"
                  . "<script language=\"javascript\">" .  "window.location.replace('qrcode_verif.php');" .  "</script>";
              }
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
              echo"<script language=\"javascript\">"
                 . "alert('Mauvais mail ou mot de passe.')"  .  "</script>"
                 . "<script language=\"javascript\">" .  "window.location.replace('teacher.php');" .  "</script>"; 
              die();
            }
        }
        else
        {
              echo"<script language=\"javascript\">"
              . "alert('Tous les champs doivent être complétés !')"  .  "</script>"
              . "<script language=\"javascript\">" .  "window.location.replace('teacher.php');" .  "</script>"; 
              die();
        }
    }
  // }
   else {
    echo"<script language=\"javascript\">"
    . "alert('Qr code invalide.')"  .  "</script>"
      . "<script language=\"javascript\">" .  "window.location.replace('teacher.php');" .  "</script>"; 
      die();
   }

  
// }
  ?>