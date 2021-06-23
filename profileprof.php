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
<html>
<head>
<title>profil</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta charset="utf-8">
</head>
<body>
<?php include("menu.php");
?>
<div align="center">
<h2>Profil de <?php echo $userinfo['pseudo']; ?></h2>
<br /><br />
Bonjour <?php echo $userinfo['pseudo']; ?> Bienvenue sur le portail professeur !
<br />
<?php
if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id']) {
?>
<br />
<a href="editionprofil.php">Editer mon profil</a>
<a href="deconnexion.php">Se déconnecter</a>
<?php
}
?>
</div>
<div >
<ul class="middle"> <a href="grille.php">
    <button>Créer une grille</button>
</a>

  <a href="modifiergrille.php">
    <button>Modifier une grille</button>
</a>
    <a href="visualisergrille.php">
    <button>Visualiser une grille</button>
</a> </ul>
</div>
</body>
</html>
