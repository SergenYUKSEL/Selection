<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/connexion.css">
  <link rel="stylesheet" type="text/css" href="css/choix.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
 
<?php include("menu.php")
?>

<p class="middle"> 
   <strong>
    <?php 
    if (isset($_GET['nom']) AND isset($_GET['prenom']))
    {
   
      {
      echo 'Bonjour ' . $_GET['nom'] . ' ' .  $_GET['prenom'];
      }
    }
    else
    {
      echo 'Votre nom ou prénom n est pas défini.';
    }
    ?>
    </strong>
  </p> 
     <ul class="middle"> <a href="connexionprof.php">
    <button>Professeur</button>
</a>

  <a href="connexionsecretaire.php">
    <button>Secrétaire</button>
</a>
    <a href="connexionadmin.php">
    <button>Administrateur</button>
</a> </ul>

  </div>
</body>
</html>