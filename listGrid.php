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
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Selection</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Hover-cards.css">
    <link rel="stylesheet" href="assets/css/Modal-Login-form.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/reveal-nav-on-scroll.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search-1.css">
    <link rel="stylesheet" href="assets/css/Table-With-Search.css">
</head>

<body>
    <?php require('header.php'); ?>
    <div class="col-md-12 search-table-col" style="margin-top: 183px;margin-right: 0px;">
        <h1 style="margin-left: 250px;">Liste des candidats</h1> <br>
        <div class="col-md-12 head">
            <div class="float-right">
                <a href="exportData.php" class="btn btn-success"><i class="dwn"></i> Export</a>
            </div>
</div>
        <div class="table-responsive table table-hover table-bordered results">
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-3">Numéro du candidat</th>
                        <th id="trs-hd-2" class="col-lg-2">Nom</th>
                        <th id="trs-hd-3" class="col-lg-2">Prénom</th>
                        <th id="trs-hd-4" class="col-lg-1">Serie</th>
                        <th id="trs-hd-5" class="col-lg-1">Note /20 <a  style="margin-left: 10px;" href="listGrid.php?req=2" type="button"><i class="fa fa-arrows-v" style="font-size: 15px;color:white;"></i></a><a href="listGrid.php?req=1" style="margin-left: 10px;" type="button"><i style="font-size: 15px;color:white;" class="fa fa-refresh" ></i></a></th>
                        <th id="trs-hd-6" class="col-lg-1">Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                        <?php
                        if($_GET['req'] === "1") {
                            require('config/connectBDD.php');
                            
                            $req = "SELECT * FROM grid";
                        } else if($_GET['req'] === "2") {
                            require('config/connectBDD.php');
                            
                            $req = "SELECT * FROM grid ORDER BY note DESC";
                        }
                            //--- Résultat ---//
                            $res= $conn->query($req);
                            //met les données dans un tableau
                            while($data = $res->fetch(PDO::FETCH_ASSOC))
                            {
                            $tablo[]=$data;
                            }
                            //détermine le nombre de colonnes
                            $nbcol=6;
                            $nb=count($tablo);
                            ?>
                            <?php
                            for($i=0;$i<$nb;$i++){
                             
                            //les valeurs à afficher
                            $valeur1=$tablo[$i]['id'];
                            $valeur2=$tablo[$i]['candidat_number'];
                            $valeur3=$tablo[$i]['lastname'];
                            $valeur4=$tablo[$i]['firstname'];
                            $valeur5=$tablo[$i]['serie'];
                            $valeur6=$tablo[$i]['note'];
                            if($row = $res->fetch(PDO::FETCH_ASSOC)) {
                                
                            }
                            if($i%$nbcol==0)
                            echo ' <tr">';
                            echo '<td >' , $valeur2, '</td>';
                            echo '<td>' , $valeur3, '</td>';
                            echo '<td>' , $valeur4, '</td>';
                            echo '<td>' , $valeur5, '</td>';
                            echo '<td>' , $valeur6, '/20</td>';
                            echo '<td><a class="btn btn-info" href="showGrid.php?id=' ,$valeur1 ,'" style="margin-left: 5px;" type="button"><i class="fa fa-user" style="font-size: 15px;color:white;"></i></a><a class="btn btn-success" style="margin-left: 5px;" href="editGrid.php?id=', $valeur1 , '"type="button"><i class="fa fa-wrench" style="font-size: 15px;"></i></a><a class="btn btn-danger" style="margin-left: 5px;" href="deleteGrid.php?id=', $valeur1 , '"type="button"><i class="fa fa-trash" style="font-size: 15px;"></i></a></td>';
                            echo '</tr>';
                            }
                        
                        ?>
                    
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Table-With-Search.js"></script>
</body>

</html>