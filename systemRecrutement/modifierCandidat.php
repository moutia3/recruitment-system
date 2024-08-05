<?php
session_start();
if (!isset($_SESSION["user"])) {
    echo '<script>alert("Session expirée"); location="login.php";</script>';
    exit;
}
include('db_config.php');

if (isset($_GET['CINcandidat'])) {
    $CINcandidat = $_GET['CINcandidat'];


    $req = $cnx->prepare("SELECT * FROM candidat WHERE CINcandidat = :CINcandidat");
    $req->execute(['CINcandidat' => $CINcandidat]);
    $donnee = $req->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modif'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $dateNaissance = $_POST['dateNaissance'];
        $numTel = $_POST['numTel'];
        $email = $_POST['email'];
        $etat = $_POST['etat'];

        $updateStmt = $cnx->prepare("UPDATE candidat SET nom = :nom, prenom = :prenom, dateNaissance = :dateNaissance, numTel = :numTel, email = :email, etat = :etat WHERE CINcandidat = :CINcandidat");
        $updateResult = $updateStmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'dateNaissance' => $dateNaissance,
            'numTel' => $numTel,
            'email' => $email,
            'etat' => $etat,
            'CINcandidat' => $CINcandidat
        ]);

        if ($updateResult) {
            echo '<script>alert("Modification effectuée avec succès."); location="page.php";</script>';
            exit;
        } else {
            echo '<script>alert("Modification invalide.");</script>';
        }
    }
} else {
    echo '<script>alert("Aucun CIN spécifié."); location="page.php";</script>';
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Candidat</title>
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


input[type='text'], input[type='number'] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #fff;
    color: black;
    margin-bottom: 10px;
}
input[type='date'], input[type='number'] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #fff;
    color: #black;
    margin-bottom: 10px;}

input[type='button'], input[type='submit'] {
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

input[type='button'] {
    margin-top: 20px;
}</style>
</head>
<body>
   
        <form action="" method="post">
            CINcandidat: <br><input type="text" name="CINcandidat" value="<?php echo htmlspecialchars($donnee['CINcandidat']); ?>" readonly><br>
            <br>
            <label for="nom">Nom:</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($donnee['nom']); ?>"><br>
            <br>
            <label for="prenom">Prenom:</label><br>
            <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($donnee['prenom']); ?>"><br>
            <br>
            <label for="dateNaissance">Date de naissance:</label><br>
            <input type="date" id="dateNaissance" name="dateNaissance" value="<?php echo htmlspecialchars($donnee['dateNaissance']); ?>"><br>
            <br>
            <label for="numTel">NumTel:</label><br>
            <input type="text" id="numTel" name="numTel" value="<?php echo htmlspecialchars($donnee['numTel']); ?>"><br>
            <br>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($donnee['email']); ?>"><br>
            <br>
            <label for="etat">Etat:</label><br>
            <select id="etat" name="etat">
                <option value="en attente" <?php echo ($donnee['etat'] == "en attente" ? 'selected' : ''); ?>>en attente</option>
                <option value="accepte" <?php echo ($donnee['etat'] == "accepte" ? 'selected' : ''); ?>>accepté</option>
                <option value="refuse" <?php echo ($donnee['etat'] == "refuse" ? 'selected' : ''); ?>>refusé</option>
            </select><br>

            <input type="submit" name="modif" value="Modifier">
        </form>
  
</body>
</html>