
<?php
session_start();
if(!isset($_SESSION["user"]))
    {
    	echo '<script>alert("Session expirée")</script>';
    }
else
{



include("db_config.php");

$post = $_GET['post'];

$resModeles = $cnx->query("SELECT libelleModele FROM modeleevaluation WHERE libelleposte = '$post'");

if ($resModeles->rowCount() > 0) {
    echo '<select name="modelee" id="modele">';
    echo '<option value="">Select a modele:</option>';
    while ($modele = $resModeles->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . $modele['libelleModele'] . '">' . $modele['libelleModele'] . '</option>';
    }
    echo '</select>';
} else {
    echo '<p>No modeles found for this poste</p>';
}
?>
<?php
}
?>