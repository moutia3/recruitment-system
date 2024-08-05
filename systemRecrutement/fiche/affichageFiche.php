<?php

session_start();
if (!isset($_SESSION["user"])) {
    echo '<script>alert("Session expirée")</script>';
} else {
include("db_config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <style>
table {
    margin-top:200px;
    margin-right:250px;
   
   border-collapse: collapse;
  width: 100%;
}

th, td {
    color:#fff;
  border: 2px solid black;
  padding: 8px;
  text-align: left;
}
h3{margin-top:-60px;}
th:nth-child(1), td:nth-child(1) {
  width: 20%;
}

th:nth-child(2), td:nth-child(2) {
  width: 30%;
}

th:nth-child(3), td:nth-child(3) {
  width: 80%;
}

</style>
</head>

<body>
    
    <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
            </div>
        </div>
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
       <?php
    include("db_config.php");
    $CINcandidat = $_GET['CINcandidat'];
    $fiche = $cnx->query("SELECT * from ficheevaluation WHERE CINcandidat='$CINcandidat'");
    if ($fiche->rowCount() > 0) {
        echo "<h3><pre>fiche du modele:</pre></h3>
        <table>
            <tr>
                <th>modelle</th>
                <th>nom du recruteur</th>
                <th>son evaluation</th>
                <th>note</th>
            </tr>";

        while ($donnee = $fiche->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $donnee['libelleModele'] . "</td>";
            $recru = $cnx->query("SELECT nom FROM recruteur WHERE CINrecruteur='" . $donnee['CINrecruteur'] . "'");
            $nomRecruteur = $recru->fetch(PDO::FETCH_ASSOC)['nom'];
            echo "<td>" . $nomRecruteur . "</td>";

            $competenceList = json_decode($donnee['competenceList'], true);
            $totalScore = 0;

            echo "<td>";
            foreach ($competenceList as $competence => $level) {
                echo "$competence: $level<br>";
                $res = $cnx->query("SELECT ponderation FROM modelecompetence WHERE libellecompetence='$competence' AND libelleModele='" . $donnee['libelleModele'] . "'");
                $ponderation = $res->fetch(PDO::FETCH_ASSOC)['ponderation'];

                $lvl = $cnx->query("SELECT note FROM niveau WHERE libelleCompetence='$competence' AND niveau='$level'");
                $levelNote = $lvl->fetch(PDO::FETCH_ASSOC)['note'];

                $score = $levelNote * $ponderation;
                $totalScore += $score;
            }
            echo "</td>";
            echo "<td>$totalScore</td>";
            echo "</tr>";
        }
    } else {
        echo "ce candidat n'a pas de fiche d'evaluation";
    }
}

?>
</div>
                </div>
            </div>
  
        </div>
   
 
</body>

</html>
