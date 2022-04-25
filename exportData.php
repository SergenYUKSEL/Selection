<?php 
include_once './config/connectBDD.php'; 
$row['head'] = 'Numéro du candidat, Nom, Prénom, Série, Travail sérieux, Absence, Attitude / Comportement, Etude supérieur, Avis PP, Avis Proviseur, Lettre de motivation, Note';
header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"Liste_Candidats.csv\"");
echo implode(",", [$row['head']]);
echo "\r\n";
 
// on obtient les informations de le toutes les grilles par odre décroissant
$stmt = $conn->prepare("SELECT * FROM grid ORDER BY note DESC");
$stmt->execute();
while ($row = $stmt->fetch()) {
  echo implode(",", [$row["candidat_number"], $row["lastname"], $row["firstname"], $row["serie"], $row["serious"], $row["absence"], $row["behavior"], $row["higher_education"], $row["avis_pp"], $row["avis_principal"], $row["motivation_letter"], $row["note"]]);
  echo "\r\n";
}
 
?>
