<?php
session_start();

require_once __DIR__.'/vendor/autoload.php';

use OTPHP\TOTP;
$otp = TOTP::create($_SESSION['chl']);

if(isset($_POST['validateform']))
    {
        if(!empty($_POST['code-auth'])) {
             if($otp->verify(htmlspecialchars($_POST['code-auth']))) {
                if($_SESSION['role']=='administrator') {
                header('Location: admin.php');

                } else if($_SESSION['role'] =='secretary') {
                header('Location: secretary.php');
                }
                else if ($_SESSION['role'] =='teacher') {
                header('Location: teacher.php');
                }
    } else {
        echo"<script language=\"javascript\">"
        . "alert('Qr code invalide !')"  .  "</script>"
          . "<script language=\"javascript\">" .  "window.location.replace('index.php');" .  "</script>"; 
    }
}
    }
?>