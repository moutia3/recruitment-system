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

    form {
        width: 700px;
        
        padding: 20px;
        background-color: #191C24;
        color: #fff;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 1px rgba(0,0,0,0.5);
        margin: 50px auto;
    }

    input[type="text"], input[type="number"], select {
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
                            <a href="../poste/afficherPostes.php" class="dropdown-item">Affichage</a></div>
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
   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <div class="aa">
   
<html>
<body>
<div class="container">
		<br />
		<form action="savemodele.php" method="post"><br>
		libelle modele:<br><br>
        <input type="text" name="modeleName" required> <br><br>
        description du modele<br><br>
        <input type="text" name="description" required> <br><br>
        modele pour poste:<br><br>
        <select name="poste">
            <?php
            include("db_config.php");
            $res = $cnx->query("SELECT * FROM poste WHERE active=true");
            while ($donnee = $res->fetch(PDO::FETCH_ASSOC)) {
                echo "<option value=" . $donnee['libellePoste'] . ">" . $donnee['libellePoste'] . "</option>";
            }
            ?><br>
        </select>
			<div ><br><br>
				<label for="competence">competence</label><br><br>
				<select class="form-control competence" name="competence"><br>
					<option value="">Select competence</option><br><br>
					<?php
					$query = "SELECT * FROM competence WHERE active = true";
					$result = $cnx->query($query);
					if ($result->rowCount() > 0) {
						while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
							echo '<option value="' . $row['libelleCompetence'] . '">' . $row['libelleCompetence'] . '</option>';
						}
					} else {
						echo '<option value="">competence not available</option>';
					}
					?>
				</select><br>
				<br />
				<label for="niveau">niveau</label><br><br>
				<select class="form-control niveau" name="niveau"><br>
					<option value="">Select niveau</option>
				</select><br>
                Ponderation<br><br>
				
				<input type="number" name="ponderation" placeholder="Entrer votre ponderation">
				<button type="button" class="btn btn-danger btn-sm remove-btn">-</button>
			</div>
			<button type="button" class="btn btn-success" id="addCompetence">+</button>
			<input type="hidden" name="counter" id="counter" value="1">

			<input type="submit" name="ajout" class="btn btn-success">
		</form>
	</div>

	<script>
    var counterInput = document.getElementById('counter');
    var counter = parseInt(counterInput.value);

    $(document).on("change", ".competence", function () {
        var libelleCompetence = $(this).val();
        var competenceDiv = $(this).closest('div');
        var niveauDropdown = competenceDiv.find('.niveau');
        var ponderationInput = competenceDiv.find('input[name^="ponderation"]');
        $.ajax({
            url: "action.php",
            type: "POST",
            cache: false,
            data: {
                libelleCompetence: libelleCompetence
            },
            success: function (data) {
                niveauDropdown.html(data);
            }
        });
    });

    $("#addCompetence").click(function () {
        var newDropdown =
            `<div><label for="competence">competence</label>
        <select class="form-control competence" name="competence_${counter}">
            <option value="">Select competence</option>
            <?php $query = "SELECT * FROM competence WHERE active = true";
            $result = $cnx->query($query);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo '<option value="' . $row['libelleCompetence'] . '">' . $row['libelleCompetence'] . '</option>';
                }
            } else {
                echo '<option value="">competence not available</option>';
            }
            ?>
        </select>
        <br/><label for="niveau">niveau</label>
        <select class="form-control niveau" name="niveau_${counter}">
            <option value="">Select niveau</option>
        </select>
        <br/>Ponderation
        <input type="number" name="ponderation_${counter}" placeholder="Entrer votre ponderation">
        <button type="button" class="btn btn-danger btn-sm remove-btn">-</button></div>`;
        $(this).before(newDropdown);
        counter++;
        counterInput.value = counter;
    });

    $(document).on("click", ".remove-btn", function () {
        $(this).closest('div').remove();
    });

    $("form").submit(function (e) {
        var totalPonderation = 0;

        $('input[name^="ponderation"]').each(function () {
            totalPonderation += parseInt($(this).val());
        });

        if (totalPonderation > 100) {
            alert("Le Total de la ponderation ne dois pas passer 100");
            e.preventDefault(); 
        }
    });
</script>
</body>
</html>