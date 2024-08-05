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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                        
                            <a href="../poste/ajoutPoste.php" class="dropdown-item">Ajout</a>
                            <a href="../poste/afficherPostes.php" class="dropdown-item">Affichage</a> </div>
                            <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Modele évaluation</a>
                        <div class="dropdown-menu bg-transparent border-0">
                        
                            <a href="ajout.php" class="dropdown-item">Ajout</a>
                            <a href="affichage.php" class="dropdown-item">Affichage</a>
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
    <form method="GET">
        <h3>modele pour poste:</h3>
        <br><br>
        <select name="poste" id="post">
            <?php
            include("db_config.php");
            $res = $cnx->query("SELECT * FROM poste WHERE active=true");
            while ($donnee = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $donnee['libellePoste'] . ">" . $donnee['libellePoste'] . "</option>";
            }
            ?>
        </select><br>
        <div id="modeleContainer"></div>
        <div id="competenceContainer"></div>
        <button id="deleteModelButton" style="display:none;">supprimer ce modelle</button>
    </form>

    <script>
        $(document).ready(function () {
            $('#post').change(function () {
                var libellePost = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: 'get_modeles.php',
                    data: {
                        post: libellePost
                    },
                    success: function (data) {
                        $('#modeleContainer').html(data);
                        $('#competenceContainer').html("");
                        $('#deleteModelButton').hide();
                    }
                });
            });

            $(document).on('change', '#modele', function () {
                var modele = $(this).val();
                $('#deleteModelButton').show();
                $.ajax({
                    type: 'GET',
                    url: 'get_competences.php',
                    data: {
                        modele: modele
                    },
                    success: function (data) {
                        $('#competenceContainer').html(data);
                    }
                });
            });

            $(document).on('click', '#deleteModelButton', function () {
                var modele = $('#modele').val();
                $.ajax({
                    type: 'POST',
                    url: 'supprimer.php',
                    data: {
                        modele: modele
                    },
                    success: function (response) {
                        console.log(response);
                        console.log("done");
                    },
                    error: function (error) {
                        console.log("Error:", error);
                    }
                });
            });
        });
        
    </script>

<?php
}
?>
<style>
          .aa{ margin-left:500px;}
            .remove-btn {
                background-color: red;
                color: white;
                border: none;
                padding: 5px 10px;
                border-radius: 5px;
                cursor: pointer;
                margin-left: 10px;
            }
            body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    select {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #fff;
    color: black;
    margin-bottom: 10px;
}

    form {
        width: 700px;
        
        padding: 20px;
        background-color: #191C24;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 1px rgba(0,0,0,0.5);
        margin: 50px auto;
    }

    input[type="text"], input[type="number"] {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #fff;
        color: black;
        margin-bottom: 10px;
    }

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

    input[type="button"] {
        margin-top: 20px;
    }

    .niveau-description {
       
        margin-bottom: 20px;
    }

    .niveau-description input {
        flex-basis: calc(33% - 10px);
        margin-right: 10px;
    }

    .niveau-description input:nth-child(3) {
        flex-basis: calc(33% - 10px);
        margin-right: 0;
    }
</style>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script> 
</body>
</html>