<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
        }
    sleep(3);
    session_destroy();
    
    echo"<script language=\"javascript\">"
            . "alert('Vous êtes désormais déconnecté, vous allez être redirigé vers la page de connexion :')"  .  "</script>"
              . "<script language=\"javascript\">" .  "window.location.replace('index.php');" .  "</script>";
?>