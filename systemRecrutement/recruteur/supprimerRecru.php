<?php
        include("db_config.php");
    
    $sql = $cnx->query("SELECT * FROM recruteur WHERE active=true ");
    if ($sql->rowCount() > 1) {
        $CINrecruteur=$_GET['CINrecruteur'];
        $res = $cnx->exec("UPDATE recruteur SET active=false WHERE CINrecruteur='$CINrecruteur'");
        if ($res!=0){
            echo "suppression reussite";
            header("location:affichrecruteur.php");
            }
        else{
            echo "suppression echoue";
        }
    }
?>