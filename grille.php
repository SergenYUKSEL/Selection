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

if(isset($_POST['formeleve']))
{
  $nom = htmlspecialchars($_POST['nom']);
  $prenom = htmlspecialchars($_POST['prenom']);
  $numero = intval($_POST['numero']);
  $serie = intval($_POST['serie']);
  $serieux = intval($_POST['travail_serieux']);
  $absence = intval($_POST['absence']);
  $comportement = intval($_POST['comportement']);
  $etude_superieur = intval($_POST['etude_sup']);
  $avis_pp = intval($_POST['avis_pp']);
  $avis_proviseur = intval($_POST['avis_proviseur']);
  $lettre_motivation = intval($_POST['lettre_motivation']);
  $remarque = htmlspecialchars($_POST["remarque"]);
  $note = intval($_POST["note"]);
  $isEmpty = false;
  foreach ($_POST as $elem) 
  {
	 if (empty($elem))
	 {
		$erreur = "Impossible";
		$isEmpty = true;
	 }
  }
  if($isEmpty == false) {
	$insertcandidat = $bdd->prepare("INSERT INTO eleves(nom, prenom, numero, serie, serieux, absence, comportement, etude_superieur, avis_pp, avis_proviseur, lettre_motivation, remarque, note) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$insertcandidat->execute(array($nom, $prenom, $numero, $serie, $serieux, $absence, $comportement, $etude_superieur, $avis_pp, $avis_proviseur, $lettre_motivation, $remarque, $note));
	$erreur = "Envoyer" ;
  } 
}	  
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
	<?php include("menu.php")
	?>
		<div id="content">
			<h1>Création de grille</h1>
			<!DOCTYPE html>
    <header>
        <h1>SELECTION DES CANDIDATS DE BTS</h1>
	</header>
	<h2>Espace professeur</h2>
    <nav>
		<a href="index.php">Retour acceuil</a>
		<a href="grille.php"><input type="button" value="Remplir une grille"/></a>
		<a href="grille.php"><input type="button" value="Modifier des grilles"/></a>
		<a href="classement.php"><input type="button" value="Voir le classement"/></a>
    </nav>
    <br>
    <main>
		<h3>Remplir une grille</h3>
        <section>
			<form method="POST" action="#">
				<div>
					<span>Numéro de candidat :</span>
					<input type="text" placeholder="Votre numéro de candidat" id="numero" name="numero">	
				</div>
				<br>
				<div>
					<span>Nom :</span>
					<input type="text" placeholder="Votre nom" id="nom" name="nom" >
				</div>
				<br>
				<div>
					<span>Prénom :</span>
					<input type="text" placeholder="Votre prenom" id="prenom" name="prenom">
				</div>
				<br>
				<div>
					<label for="serie">Série :</label>
					<select name="serie" id="serie">
						<option value=""></option>
						<option value="1">ES/S (12)</option>
						<option value="2">STMG (10)</option>
						<option value="3">PRO (8)</option>
						<option value="4">L (9)</option>
						<option value="5">Autres (5)</option>   
				</select>
				</div>
				<br>
				<div>
					<span>Travail sérieux :</span>
					<input type="radio" name="travail_serieux" value="1"  /><span>Oui (+1)</span>
					<input type="radio" name="travail_serieux" value="2" /><span>Non (-1)</span>
				</div>	
				<br>
				<div>
					<span>Absence :</span>
					<input type="radio" name="absence" value="1"  /><span>Oui (-2 ou dossier refusé)</span>
					<input type="radio" name="absence" value="2"  /><span>Non (+0)</span>
				</div>
				<br>
				<div>		
					<span>Attitude / Comportement :</span>
					<input type="radio" name="comportement" value="1"  /><span>Oui (dossier refusé)</span>
					<input type="radio" name="comportement" value="2" /><span>Non (+1)</span>
				</div>
				<br>
				<div>
					<span>Étude supérieur :</span>	
					<input type="radio" name="etude_sup" value="1"  /><span>Oui (+1)</span>	
					<input type="radio" name="etude_sup" value="2"  /><span>Non (+0)</span>
				</div>
				<br>
				<div>
					<span>Avis PP :</span>
					<input type="radio" name="avis_pp" value="1"  /><span>B (+2)</span>
					<input type="radio" name="avis_pp" value="2" /><span>AB (+1)</span>
					<input type="radio" name="avis_pp" value="3" /><span>Insuf. (+0)</span>
					<input type="radio" name="avis_pp" value="4" /><span>Négatif (-2)</span>
				</div>
				<br>
				<div>
					<span>Avis Proviseur :</span>
					<input type="radio" name="avis_proviseur" value="1" /><span>B (+2)</span>
					<input type="radio" name="avis_proviseur" value="2" /><span>AB (+1)</span>
					<input type="radio" name="avis_proviseur" value="3" /><span>Insuf. (+0)</span>
					<input type="radio" name="avis_proviseur" value="4" /><span>Négatif (-2)</span>
				</div>
				<br>
				<div>
					<span>Lettre de motivation :</span>
					<input type="radio" name="lettre_motivation" value="1" /><span>B (+2)</span>
					<input type="radio" name="lettre_motivation" value="2" /><span>AB (+1)</span>
					<input type="radio" name="lettre_motivation" value="3" /><span>Insuf. (+0)</span>
					<input type="radio" name="lettre_motivation" value="4" /><span>Négatif (-2)</span>
				</div>
				<br>
				<div>
					<span>Remarques :</span>
					<br>
					<textarea rows = 10 cols="65" name="remarque"></textarea>	
				</div>
				<br>
				<span> Note </span>
				<input type="number" name="note" placeholder="/20">
				<br>
				<input type="submit" name="formeleve" value="valider">					

			</form>
        </section>
	</main>
	<?php
      if(isset($erreur))
      {
        echo '<font color="red">' .$erreur. "</font>";
      }
      ?>
</body>
</html>