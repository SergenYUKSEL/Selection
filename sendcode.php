<?php
session_start();

require_once __DIR__.'/vendor/autoload.php';

use OTPHP\TOTP;
$otp = TOTP::create($_SESSION['chl']);


 $dest = $_SESSION['email'];
 $name = $_SESSION['lastname'] . " " .  $_SESSION['firstname'];
 $subject = "Code de secours SELECTION : ". $name;
 $message = 'Demande du code de double authentification de la part de' . " " .  $name . "\r\n" . "\r\n" . $otp->now() . "\r\n" . "NE PAS RÉPONDRE SOUS CE MAIL MERCI"; 
 $headers = 'From: Egnom SELECTION <contact.selection.egnom@gmail.com>' . PHP_EOL .
      'X-Mailer: PHP/' . phpversion();

 $sended = NULL;

 if (mail($dest,$subject,$message,$headers)) {
   $sended = 1;
 }
   else {
         
     }
 if ($sended === 1) {
  echo"<script language=\"javascript\">"
  . "alert('Le code a bien été envoyé par mail')" . "</script>"
    . "<script language=\"javascript\">" .  "window.location.replace('qrcode_verif.php');" .  "</script>";
   
 }
 else {

 }


 if($sended === NULL) {
   die();
 }
 else {

 }

?>