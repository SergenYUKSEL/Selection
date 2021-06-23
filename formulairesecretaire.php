<?php
$bdd = new  PDO('mysql:host=localhost;dbname=espace_secretaire', 'root', 'student');

if(isset($_POST['forminscription']))
{
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $mail = htmlspecialchars($_POST['mail']);
  $mail2 = htmlspecialchars($_POST['mail2']);
  $passwd = sha1($_POST['passwd']);
  $passwd2 = sha1($_POST['passwd2']);
    if(!empty($_POST['pseudo']) AND !empty($_POST['mail']) AND !empty($_POST['mail2']) AND !empty($_POST['passwd']) AND !empty($_POST['passwd2']))
    {    
      $pseudolength = strlen($pseudo);
      if ($pseudolength <= 255)
      {
        if($mail == $mail2)
        {
          if(filter_var($mail, FILTER_VALIDATE_EMAIL))
          {
            $reqmail = $bdd->prepare("SELECT * FROM secretaires WHERE mail = ? ");
            $reqmail->execute(array($mail));
            $mailexist = $reqmail-> rowCount();
            if($mailexist == 0)
            {
              if($passwd == $passwd2)
              {
                $insertmbr = $bdd->prepare("INSERT INTO secretaires(pseudo, mail, password) VALUES(?, ?, ?)");
                $insertmbr->execute(array($pseudo, $mail, $passwd));
                $erreur = "Votre compte a bien été crée !";
              }
              else
              {
                $erreur = "Vos mots de passes ne correspondent pas !";
              }
            }
            else
            {
              $erreur = "Adresse mail dèja utilisée !";
            }
          }
          else
          {
              $erreur = "Votre adresse mail n'est pas valide !";
          }
          }
            else
            {
              $erreur = "Vos adresses mail ne correspondent pas ! ";
            }
          }
          else
          {
            $erreur = "Votre pseudo ne doit pas dépasser 255 caractères !";
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
    <title>Formulaire d'inscription</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="urf-8">
  </head>
  <body>
  <?php include("menu.php")
  ?>
    <div align="center">
      <h2>Inscription</h2>
      <br /><br />
      <form method="POST" action="">
        <table>
          <tr>
            <td align="right">
                <label for="pseudo">Pseudo :</label>
            </td>
            <td align="right">
                <input type="text" placeholder="Votre pseudo" id="pseudo" name="pseudo" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
            </td>
          </tr>
          <tr>
            <td align="right">
                <label for="mail">Mail :</label>
            </td>
            <td align="right">
                <input type="email" placeholder="Votre mail" id="mail" name="mail" value="<?php if(isset($mail)) { echo $mail; } ?>">
            </td>
          </tr>
          <tr>
            <td align="right">
                <label for="mail2">Confirmation du mail :</label>
            </td>
            <td align="right">
                <input type="email" placeholder="Confirmez votre mail" id="mail2" name="mail2" value="<?php if(isset($mail2)) { echo $mail2; } ?>">
            </td>
          </tr>
          <tr>
            <td align="right">
                <label for="passwd">Mot de passe :</label>
            </td>
            <td align="right">
                <input type="password" placeholder="Votre mot de passe " id="passwd" name="passwd">
            </td>
          </tr>
          <td align="right">
            <label for="passwd2">Confirmation du mot de passe :</label>
        </td>
        <td align="right">
            <input type="password" placeholder="Confirmez votre mdp " id="passwd2" name="passwd2">
        </td>
      </tr>
      <tr>
        <td></td>
        <td align="center">
          <br />
          <input class="button" type="submit" name="forminscription" value="Je m'inscris">
        </td>
      </tr>
        </table>
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