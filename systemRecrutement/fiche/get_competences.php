
<?php
session_start();
if(!isset($_SESSION["user"]))
    {
    	echo '<script>alert("Session expirée")</script>';
    }
else
{
?>

<?php
include("db_config.php");

$CIN = $_GET['candidat'];
$modele = $_GET['modele'];

$resCompetences = $cnx->query("SELECT mc.libellecompetence, mc.niveauMin
                               FROM modelecompetence mc
                               JOIN competence c ON mc.libellecompetence = c.libelleCompetence
                               WHERE mc.libelleModele = '$modele'");

if ($resCompetences->rowCount() > 0) {
    echo '<p>Competences selecte pour ce modele:</p>';
    $i=1;
    while ($competence = $resCompetences->fetch(PDO::FETCH_ASSOC)) {
        echo '<label >' . $competence['libellecompetence'] . '</label>';
        echo '<select name="competence_' . $competence['libellecompetence'] . '">';
        

        $resNiveaux = $cnx->query("SELECT id,niveau FROM niveau WHERE libellecompetence = '{$competence['libellecompetence']}'");
        while ($niveau = $resNiveaux->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="'. $niveau['niveau'].'">' . $niveau['niveau'] . '</option>';
        }

        
        echo '</select>';
        echo '<p id="' . $competence['libellecompetence'] . '_description">'  . '</p>';
        $i++;
    }
} else {
    echo '<p>n a pas de competence</p>';
}
?>
<?php
}
?>