<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header("Location: index.php");
    die();
}
else if($_SESSION['role'] == 'administrator') {
    header("Location: admin.php");
    die();
}

    $id = $_GET['id'];
            
            if(isset($_POST['candidat_number'])) {
                $candidat = $_POST['candidat_number'];
            }
            else {
                $candidat = null;

            }

            if(isset($_POST['firstname'])) {
                $firstname = $_POST['firstname'];
            }
            else {
                $firstname = null;

            }
            if(isset($_POST['lastname'])) {
                $lastname = $_POST['lastname'];
            }
            else {
                $lastname = null;
                
            }
            if(isset($_POST['serie'])) {
                $serie = $_POST['serie'];
            }
            else {
                $serie = null;
                
            }
            if(isset($_POST['serious'])) {
                $serious = $_POST['serious'];
            }
            else {
                $serious = null;
                
            }
            if(isset($_POST['absence'])) {
                $absence = $_POST['absence'];
            }
            else {
                $absence = null;
                
            }
            if(isset($_POST['behavior'])) {
                $behavior = $_POST['behavior'];
            }
            else {
                $behavior = null;
                
            }
            if(isset($_POST['higher_education'])) {
                $education = $_POST['higher_education'];
            }
            else {
                $education = null;
                
            }
            if(isset($_POST['avis_pp'])) {
                $avispp = $_POST['avis_pp'];
            }
            else {
                $avispp = null;
                
            }
            if(isset($_POST['avis_principal'])) {
                $avisprincipal = $_POST['avis_principal'];
            }
            else {
                $avisprincipal = null;
                
            }
            if(isset($_POST['motivation_letter'])) {
                $motivation = $_POST['motivation_letter'];
            }
            else {
                $motivation = null;
                
            }
            if(isset($_POST['notice'])) {
                $notice = $_POST['notice'];
            }
            else {
                $notice = null;
                
            }
            if(isset($_POST['note'])) {
                $note = $_POST['note'];
            }
            else {
                $note = null;
                
            }
           
            require('config/connectBDD.php');
            try{

                $update = $conn->prepare("
                  UPDATE grid
                  SET candidat_number = ?,
                  lastname = ?,
                  firstname = ?,
                  serie = ?,
                  serious = ?,
                  absence = ?,
                  behavior = ?,
                  higher_education = ?,
                  avis_pp = ?,
                  avis_principal = ?,
                  motivation_letter = ?,
                  notice = ?,
                  note = ?
                  WHERE id = $id
                ");
                $update->execute(array($candidat,$lastname,$firstname,$serie,$serious,$absence,$behavior,$education,$avispp,$avisprincipal,$motivation,$notice,$note));
                $update->execute();
                
            }
                  
            catch(PDOException $e){
                echo "Erreur : " . $e->getMessage();
            }
            if(isset($_POST['candidat_number']) && isset($_POST['lastname']) && isset($_POST['firstname']) && isset($_POST['serie']) && isset($_POST['serious']) && isset($_POST['absence']) && isset($_POST['behavior']) && isset($_POST['higher_education']) && isset($_POST['avis_pp']) && isset($_POST['avis_principal']) && isset($_POST['motivation_letter']) && isset($_POST['notice']) && isset($_POST['note'])) {
                sleep(3); // attends 3 secondes
                echo "<script language=\"javascript\">"
                . "alert('Vous avez bien modifié le compte, vous allez être redirigé vers la page de liste de candidats :')"  .  "</script>"
                  . "<script language=\"javascript\">" .  "window.location.replace('listGrid.php');" .  "</script>";
            }

?>