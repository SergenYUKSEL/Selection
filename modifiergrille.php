<?php
session_start();
$bdd = new  PDO('mysql:host=localhost;dbname=espace_professeur', 'root', 'student');

if(isset($_GET['id']) AND $_GET['id'] > 0) 
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM professeurs WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
}
?>