
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
    
    <link href="css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="js/main.js"></script>

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

input[type="text"], input[type="number"], select {
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
    background-color: #fff;
    color: #black;
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
    background-color: black;
        margin-left: 200px;
        padding: 0;
        font-family: Arial, sans-serif;
    }

input[type="button"] {
    margin-top: 20px;
}
</style>

</head>


<body>

        
        <h2 class="mt-0 mb-10"></h2>
        <p class="mt-0 mb-20 c-grey fs-15"></p>
    <form action="save.php" method="POST">
    Evaluer par:
    <br><br>
    <select name="recruteur">
        <option value="">nom du recruteur:</option>
        <?php
        include("db_config.php");
        $res = $cnx->query("SELECT * FROM recruteur where active = true");
        while ($donnee = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=" . $donnee['CINrecruteur'] . ">" . $donnee['nom'] . "</option>";
        }
        ?>
    </select><br>
    <br> nom de candidat:<br><br>
    <select name="candidat" id="candidat">
        <option value="">nom du candidat:</option>
        <?php
        $res = $cnx->query("SELECT * FROM candidat");
        while ($donnee = $res->fetch(PDO::FETCH_ASSOC)) {
            echo "<option value=" . $donnee['CINcandidat'] . ">" . $donnee['nom'] . "</option>";
        }
        ?>
    </select><br>
    <br> choix du poste:<br><br>
    <p name="libelleposte" id="libelleposte"></p><br>
    <br> modeles:<br><br>
    <div id="modeleContainer"></div>
    <div id="competenceContainer"></div>
    <input type="submit" name="ajout">
    </form>
    <script>
        $(document).ready(function () {
            $('#candidat').change(function () {
                var candidatId = $(this).val();
                console.log(candidatId)
                $.ajax({
                    type: 'GET',
                    url: 'get_job_position.php',
                    data: {
                        candidat: candidatId
                    },
                    success: function (data) {
                        $('#libelleposte').html(data);
                        $('#competenceContainer').html("");
                        console.log(data)
                    }
                });
            });

            $('#candidat').change(function () {
                var candidatId = $(this).val();
                console.log("candidatId:", candidatId);
                $.ajax({
                    type: 'GET',
                    url: 'get_modeles.php',
                    data: {
                        candidat: candidatId
                    },
                    success: function (data) {
                        $('#modeleContainer').html(data);
                        console.log(data);
                    }
                });
            });

            $(document).on('change', '#modele', function () {
                var modele = $(this).val();
                console.log("Selected Modele:", modele);
                $.ajax({
                    type: 'GET',
                    url: 'get_competences.php',
                    data: {
                        candidat: $('#candidat').val(),
                        modele: modele
                    },
                    success: function (data) {
                        $('#competenceContainer').html(data);
                        console.log(data);
                    }
                });
            });
        });
    </script>
</body>

</html>
<?php
}
?>
