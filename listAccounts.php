<?php
session_start();

if(!isset($_SESSION['logged'])) {
    header("Location: index.php");
    die();
}

else if($_SESSION['verify'] == false) {
    echo"<script language=\"javascript\">"
    . "alert('Il faut être authentifier pour pouvoir accéder à cette page)" .  "</script>"
      . "<script language=\"javascript\">" .  "window.location.replace('qrcode_verif.php');" .  "</script>";
}

else if($_SESSION['role'] == 'teacher') {
    header("Location: teacher.php");
    die();
} else if($_SESSION['role'] == 'secretary') {
    header("Location: secretary.php");
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
        <h1 style="margin-left: 250px;">Liste des comptes</h1> <br>
        <div class="table-responsive table table-hover table-bordered results">
            <table class="table table-hover table-bordered">
                <thead class="bill-header cs">
                    <tr>
                        <th id="trs-hd-1" class="col-lg-1">Numéro du compte</th>
                        <th id="trs-hd-2" class="col-lg-2">Nom</th>
                        <th id="trs-hd-3" class="col-lg-2">Prénom</th>
                        <th id="trs-hd-4" class="col-lg-3">Email</th>
                        <th id="trs-hd-5" class="col-lg-2">Profession</th>
                        <th id="trs-hd-6" class="col-lg-1">Action</th>
                    </tr>
                </thead>
                <tbody align="center">
                    <tr class="warning no-result">
                        <td colspan="12"><i class="fa fa-warning"></i>&nbsp; No Result !!!</td>
                    </tr>
                        <?php
                        
                        require('config/connectBDD.php');
                        
                        $req = "SELECT * FROM account";
 
                        //--- Résultat ---//
                        $res= $conn->query($req);
                        //met les données dans un tableau
                        while($data = $res->fetch(PDO::FETCH_ASSOC))
                        {
                        $tablo[]=$data;
                        }
                        //détermine le nombre de colonnes
                        $nbcol=5;
                        $nb=count($tablo);
                        ?>
                        <?php
                        for($i=0;$i<$nb;$i++){
                         
                        //les valeurs à afficher
                        $valeur1=$tablo[$i]['id'];
                        $valeur2=$tablo[$i]['lastname'];
                        $valeur3=$tablo[$i]['firstname'];
                        $valeur4=$tablo[$i]['email'];
                        $valeur5=$tablo[$i]['role'];
                        if($row = $res->fetch(PDO::FETCH_ASSOC)) {
                           
                        }
                        if($i%$nbcol==0)
                        echo ' <tr>';
                        echo '<td>' , $valeur1, '</td>';
                        echo '<td>' , $valeur2, '</td>';
                        echo '<td>' , $valeur3, '</td>';
                        echo '<td>' , $valeur4, '</td>';
                        echo '<td>' , $valeur5, '</td>';
                        echo '<td><a class="btn btn-success" style="margin-left: 5px;" href="editAccount.php?id=', $valeur1 , '"type="button"><i class="fa fa-wrench" style="font-size: 15px;"></i></a><a class="btn btn-danger" style="margin-left: 5px;" href="deleteAccount.php?id=', $valeur1 , '"type="button"><i class="fa fa-trash" style="font-size: 15px;"></i></a></td>';
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