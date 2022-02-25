<?php 
include_once './config/connectBDD.php'; 
$row['head'] = 'Numéro du candidat, Nom, Prénom, Série, Note';
header("Content-Type: application/octet-stream");
header("Content-Transfer-Encoding: Binary");
header("Content-disposition: attachment; filename=\"Liste_Candidats.csv\"");
echo implode(",", [$row['head']]);
echo "\r\n";
 
// (C) GET USERS FROM DATABASE + DIRECT OUTPUT
$stmt = $conn->prepare("SELECT * FROM grid ORDER BY note DESC");
$stmt->execute();
while ($row = $stmt->fetch()) {
  echo implode(",", [$row["candidat_number"], $row["lastname"], $row["firstname"], $row["serie"], $row['note']]);
  echo "\r\n";
}
 
?>
