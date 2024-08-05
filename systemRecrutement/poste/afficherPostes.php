<?php
        include('db_config.php');
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
    
   border-collapse: collapse;
  width: 30%;
}

th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: left;
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
                        
                            <a href="../comp/competence.html" class="dropdown-item">Ajout</a>
                            <a href="../comp/afficherCompetence.php" class="dropdown-item">Affichage</a>
                        </div>
                    </div>  
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Poste</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        
                            <a href="ajoutPoste.php" class="dropdown-item">Ajout</a>
                            <a href="afficherPostes.php" class="dropdown-item">Affichage</a></div>
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
                        
    <?php
        
        $poste = $cnx->query("SELECT p.*, r.nom AS recruter FROM poste p INNER JOIN recruteur r ON p.CINrecruteur = r.CINrecruteur WHERE p.active = true");
        $posteDesactive = $cnx->query("SELECT p.*, r.nom AS recruter FROM poste p INNER JOIN recruteur r ON p.CINrecruteur = r.CINrecruteur WHERE p.active = false");

        echo "<h3><pre>poste existants</pre><br><br><br><br><br><br><br><br><br><br><br><br><br><br></h3>
        <table> <tr> 
        <th>Poste</th>
        <th>Description</th>
        <th>Cree par</th>
        <th colspan='2'>Action</th>
        </tr>";
        while ($donnee = $poste->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $donnee['libellePoste'] . "</td>";
            echo "<td>" . $donnee['description'] . "</td>";
            echo "<td>" . $donnee['recruter'] . "</td>";
            echo "<td><a href=supprimerPoste.php?libellePoste=" . $donnee['libellePoste'] . ">supprimer</a></td>";
            echo "<td><a href=modifierPoste.php?libellePoste=" . $donnee['libellePoste'] . ">modifier</a></td>";
            echo "</tr>";
        }
        echo "</table>";

        echo "<h3><pre>poste supprimé</pre><br><br><br><br><br><br><br><br><br><br><br><br><br><br></h3>
        <table> <tr> 
        <th>Poste</th>
        <th>Description</th>
        <th>Cree par</th>
        </tr>";
        while ($donnee = $posteDesactive->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $donnee['libellePoste'] . "</td>";
            echo "<td>" . $donnee['description'] . "</td>";
            echo "<td>" . $donnee['recruter'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
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