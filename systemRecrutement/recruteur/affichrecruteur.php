<?php
        include("db_config.php");
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title></title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style>
table {
  
  border-collapse: collapse;
  width: 100%;

}

main{

    margin-top:-170px;
 
}
th, td {
  border: 1px solid black;
  padding: 8px;
  text-align: left;
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
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Recruteur</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        
                            <a href="ficherecruteur.php" class="dropdown-item">Ajout</a>
                            <a href="affichrecruteur.php" class="dropdown-item">Affichage</a>
                        </div>
                    </div><div class="nav-item dropdown">
                    
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
                <a href="../systemRecrutement/page.php" class="navbar-brand d-flex d-lg-none me-4">
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
                        <h6 class="mb-0">Liste recruteurs</h6> 
                    </div>
                    <div class="table-responsive">
                        <?php
        
        $recruteurs=$cnx->query("SELECT * FROM recruteur WHERE active = true");
        $exRecruteurs=$cnx->query("SELECT * FROM recruteur WHERE active = false");
        echo "<h2>Les recruteurs</h2><br><br><br><main><table> <tr> 
        <th>CIN</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>dateNaissance</th>
        <th>numTel</th>
        <th>email</th>
        <th>role</th>
        <th colspan='2'>Action</th>

        </tr>";
        while ($donnee=$recruteurs->fetch(PDO::FETCH_ASSOC)){
            echo"<tr>";
            echo"<td>".$donnee['CINrecruteur']."</td>";
            echo"<td>".$donnee['nom']."</td>";
            echo"<td>".$donnee['prenom']."</td>";
            echo"<td>".$donnee['dateNaissance']."</td>";
            echo"<td>".$donnee['numTel']."</td>";
            echo"<td>".$donnee['email']."</td>";
            echo"<td>".$donnee['role']."</td><br>";
            echo "<td><a href=supprimerRecru.php?CINrecruteur=" . $donnee['CINrecruteur'] . ">supprimer</a></td>";
            echo "<td><a href=modifierRecru.php?CINrecruteur=" . $donnee['CINrecruteur'] . ">modifier</a></td>";
            echo"</tr>";
        }
        echo "</table></main>";


        echo "<br><br><table> <h3>Les anciens recruteurs<br><br></h3><tr> 
        <th>CIN</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>dateNaissance</th>
        <th>numTel</th>
        <th>email</th>
        <th>role</th>
        </tr>";
        while ($donnee=$exRecruteurs->fetch(PDO::FETCH_ASSOC)){
            echo"<tr>";
            echo"<td>".$donnee['CINrecruteur']."</td>";
            echo"<td>".$donnee['nom']."</td>";
            echo"<td>".$donnee['prenom']."</td>";
            echo"<td>".$donnee['dateNaissance']."</td>";
            echo"<td>".$donnee['numTel']."</td>";
            echo"<td>".$donnee['email']."</td>";
            echo"<td>".$donnee['role']."</td>";
            echo"</tr>";
        }
        echo "</table>"

    ?>
                    </div>
                </div>
            </div>
           
         
        </div>
       
   
</body>

</html>