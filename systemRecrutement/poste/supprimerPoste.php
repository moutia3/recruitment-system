<?php
    include("db_config.php");
    $libelle=$_GET['libellePoste'];
    $res = $cnx->exec("UPDATE poste SET active=false WHERE libellePoste='$libelle'");
    if ($res!=0){
        echo "suppression reussite";
        header("location:afficherPostes.php");
        }
    else{
        echo "suppression echoue";
    }
?>


