<?php
$candidat = $_POST['candidat_number'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$serie = $_POST['serie'];
$serious = $_POST['serious'];
$absence = $_POST['absence'];
$behavior = $_POST['behavior'];
$education = $_POST['higher_education'];
$avispp = $_POST['avis_pp'];
$avisprincipal = $_POST['avis_principal'];
$motivation = $_POST['motivation_letter'];
$notice = $_POST['notice'];
$note = $_POST['note'];

    try {
        require('config/connectBDD.php');
        $send = $conn->prepare("INSERT INTO grid(candidat_number, lastname, firstname, serie, serious, absence, behavior, higher_education, avis_pp, avis_principal, motivation_letter, notice, note) 
                                VALUES(:candidat_number, :lastname, :firstname, :serie, :serious, :absence, :behavior, :higher_education, :avis_pp, :avis_principal, :motivation_letter, :notice, :note)");
        $send->execute(array(
            ":candidat_number" => $candidat,
            ":lastname" => $lastname,
            ":firstname" => $firstname,
            ":serie" => $serie,
            ":serious" => $serious,
            ":absence" => $absence,
            ":behavior" => $behavior,
            ":higher_education" => $education,
            ":avis_pp" => $avispp,
            ":avis_principal" => $avisprincipal,
            ":motivation_letter" => $motivation,
            ":notice" => $notice,
            ":note" => $note));
            sleep(3);
            echo"<script language=\"javascript\">"
            . "alert('Le compte a bien été créé !')" . "</script>"
              . "<script language=\"javascript\">" .  "window.location.replace('listGrid.php?req=1');" .  "</script>";
    }
    catch(PDOExeption $e) {
        echo 'Impossible de traiter les donnée, Erreur !  : '. $e->getMessage();
    }
    
 ?>