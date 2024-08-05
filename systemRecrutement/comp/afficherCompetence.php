<?php
session_start();
if(!isset($_SESSION["user"]))
    {
    	echo '<script>alert("Session expirée")</script>';
    }
else
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
table {
    margin-left: 250px; 
  border-collapse: collapse;
  width: 59%;
}

th, td {
  border: 2px solid black;
  padding: 15px;
  text-align: left;
  color: #fff;
}

th:nth-child(1), td:nth-child(1) {
  width: 20%;
}

th:nth-child(2), td:nth-child(2) {
  width: 30%;
}

th:nth-child(3), td:nth-child(3) {
  width: 50%;
}

h3{
    margin-right: 0px;
    color: gray;
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
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="../page.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>1Way Dev</h3>
                </a>
               
                <div class="navbar-nav w-100">
                    <a href="../page.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                    
                    <a href="../fichecandidat.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Fiche candidat</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Compétence</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        
                            <a href="competence.html" class="dropdown-item">Ajout</a>
                            <a href="afficherCompetence.php" class="dropdown-item">Affichage</a>
                        </div>
                    </div>                  
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Poste</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="../poste/ajoutPoste.php" class="dropdown-item">Ajout</a>
                            <a href="../poste/afficherPostes.php" class="dropdown-item">Affichage</a></div>
                            <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Modele évaluation</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        
                            <a href="../model/ajout.php" class="dropdown-item">Ajout</a>
                            <a href="../model/affichage.php" class="dropdown-item">Affichage</a>
                        </div>
                    </div>
                <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Fiche evaluation</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        
                            <a href="../fiche/fiche.php" class="dropdown-item">Ajout</a>
                            </div>
                    </div> </div>
            </nav>
        </div>
        <div class="content">
           
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="../page.php" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                
                </a>
                <form class="d-none d-md-flex ms-4">
                    
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            
                           
                        </a>                                             
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">                       
                            </a>
                            <hr class="dropdown-divider">       
                        </div>
                    </div>
                    
                </div>
            </nav>
           
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"></h6>
                        
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                            <?php
        include("db_config.php");
        $competences = $cnx->query("SELECT * FROM competence where active=true");
        while ($competence = $competences->fetch(PDO::FETCH_ASSOC)){
            echo "<table><tr><br><h3 name='competence'> Competence: " . $competence['libelleCompetence'] . "</h3></th></tr>
            <br><th>Niveau</th>
            <th>note</th>
            <th>Description</th>
            </tr>";

            $libelleCompetence = $competence['libelleCompetence'];
            echo "<a href='supprimerCompetence.php?libelleCompetence=" . $libelleCompetence . "'>Delete</a>";
            $niveaux = $cnx->query("SELECT * FROM niveau WHERE libelleCompetence = '$libelleCompetence'");
            while ($niveau = $niveaux->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td>" . $niveau['niveau'] . "</td>";
                echo "<td>" . $niveau['note'] . "</td>";
                echo "<td>" . $niveau['description'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            
        }

        $competences = $cnx->query("SELECT * FROM competence where active=false");
        echo "<br><br><h3>competences archivés </h3><br><br>";
        while ($competence = $competences->fetch(PDO::FETCH_ASSOC)){
            echo "<table><tr><h3 name='competence'> Competence: " . $competence['libelleCompetence'] . "</h3></th></tr>
            <th>Niveau</th>
            <th>note</th>
            <th>Description</th>
            </tr>";

            $libelleCompetence = $competence['libelleCompetence'];
            echo "<a href='repriseComp.php?libelleCompetence=" . $libelleCompetence . "'>reprise</a>";
            $niveaux = $cnx->query("SELECT * FROM niveau WHERE libelleCompetence = '$libelleCompetence'");
            while ($niveau = $niveaux->fetch(PDO::FETCH_ASSOC)){
                echo "<tr>";
                echo "<td>" . $niveau['niveau'] . "</td>";
                echo "<td>" . $niveau['note'] . "</td>";
                echo "<td>" . $niveau['description'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";

            
        }
    ?>
    <?php
}
?>
                    </div>
                </div>
            </div>

        </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
