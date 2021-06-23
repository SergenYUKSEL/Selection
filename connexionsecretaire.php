<?php
$bdd = new  PDO('mysql:host=localhost;dbname=espace_secretaire', 'root', 'student');

if(isset($_POST['formconnexion']))
{
    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $passwdconnect = sha1($_POST['passwdconnect']);
    if(!empty($mailconnect) AND !empty($passwdconnect))
    {
        $requser = $bdd->prepare("SELECT * FROM secretaires WHERE mail = ? AND password = ?");
        $requser->execute(array($mailconnect, $passwdconnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
          $userinfo = $requser->fetch();
          $_SESSION['id'] = $userinfo['id'];
          $_SESSION['pseudo'] = $userinfo['pseudo'];
          $_SESSION['mail'] = $userinfo['mail'];
          header("Location: profilesecretaire.php?id=".$_SESSION['id']); 
        }
        else
        {
            $erreur = "Mauvais mail ou mot de passe";
        }
    }
    else
    {
        $erreur = "Tous les champs doivent être complétés !";
    }
}
?>
<html>
  <head>
    <title>Page de connexion pour Secretaire</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="urf-8">
  </head>
  <body>
  
  <?php include("menu.php")
  ?>
    <div align="center">
      <h2>Connexion</h2>
      <br /><br />
      <form method="POST" action="">
        <input type="email" name="mailconnect" placeholder="Mail">
        <input type="password" name="passwdconnect" placeholder="Mot de passe">
        <input type="submit" name="formconnexion" value="Se connecter !">
      </form>
      <?php
      if(isset($erreur))
      {
        echo '<font color="red">' .$erreur. "</font>";
      }
      ?>
    </div>
  </body>
</html>