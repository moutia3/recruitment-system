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

form {
    
    width: 700px;
    padding: 20px;
    background-color: #191C24;
    color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px 1px rgba(0,0,0,0.5);
    margin: 50px auto;
}

input[type="text"], select{
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #fff;
    color: black;
    margin-bottom: 10px;
}
input[type="date"], input[type="number"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: rgb(176, 168, 168);
    color: #fff;
    margin-bottom: 10px;}

input[type="button"], input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #555;
    color: #fff;
    cursor: pointer;
    margin-top: 10px;
}
body {
    margin-top: 80px;
        margin-left: 200px;
        padding: 0;
        font-family: Arial, sans-serif;
    }

input[type="button"] {
    margin-top: 20px;
}
</style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
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
        
        <h2 class="mt-0 mb-10"></h2>
        <p class="mt-0 mb-20 c-grey fs-15"></p>
    <form action="" method="post">
        libelle du poste: <br><br>
        <input type="text" name="libelle"> <br><br><br>
        description:<br><br>
        <input type="text" name="description"> <br><br><br>
        Cree par: <br><br>
        <select name="recruteur">
            <?php
                
                $res = $cnx->query("SELECT * FROM recruteur WHERE active=true");
                while ($donnee = $res->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=" . $donnee['CINrecruteur'] . ">" . $donnee['nom'] . "</option>";
                }
            ?>
        </select>
        <br><br><br>
        <input type="submit" name="ajout">
    </form>
    
    <?php
        
        if (isset($_POST["ajout"])) {
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $recruteur = $_POST['recruteur'];
            
            try {
                $existe = $cnx->query("SELECT * FROM poste WHERE libellePoste='$libelle'");
                if ($existe->rowCount() > 0) {
                    echo "<script>alert('le poste existe déjà');</script>";
                } else {
                    $res = $cnx->exec("INSERT INTO poste VALUES ('$libelle','$description','$recruteur', true)");
                   
                }
            } catch (PDOException $e) {
                echo "<script>alert('Erreur lors de l'ajout');</script>";
            }
        }
    ?>
     </div>
      </div>

</body>
</html>
