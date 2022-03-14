<?php
session_start();

require_once __DIR__.'/vendor/autoload.php';

use OTPHP\TOTP;
$otp = TOTP::create($_SESSION['chl']);


 $email = "vlk.kruxy@gmail.com";
 $dest = $_SESSION['email'];
 $name = $_SESSION['lastname'] . " " .  $_SESSION['firstname'];
 $subject = "Code de secours SELECTION : ". $name;
 $message = 'Demande du code de double authentification de la part de' . " " .  $name . "\r\n" . "\r\n" . $otp->now(); 
 $headers = 'From:' . $email . "\r\n" .
     'Reply-To: ' . $email . "\r\n" .
     'X-Mailer: PHP/' . phpversion();
 $sended = NULL;


 if (mail($dest,$subject,$message,$headers)) {
   $sended = 1;
 }
   else {
         
     }
 if ($sended === 1) {
   echo "<script language=\"javascript\">" .  "window.location.replace('./');" .  "</script>";
   
 }
 else {

 }


 if($sended === NULL) {
   die();
 }
 else {

 }

?>