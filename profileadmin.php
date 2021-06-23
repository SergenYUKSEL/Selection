<?php
session_start();
$bdd = new  PDO('mysql:host=localhost;dbname=espace_administrateur', 'root', 'student');

if(isset($_GET['id']) AND $_GET['id'] > 0) 
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM administrateurs WHERE id = ?');
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
Bonjour Monsieur <?php echo $userinfo['pseudo']; ?>, Bienvenue sur le portail Administrateur
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
<ul class="middle"> <a href="choixinscription.php">
    <button>Créer un compte</button>
</a>

</ul>
</body>
</html>
