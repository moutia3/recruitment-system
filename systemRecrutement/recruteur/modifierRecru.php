<?php
session_start();


if (!isset($_SESSION["user"])) {
    echo '<script>alert("Session expirée"); location.href="login.php";</script>';
    exit;
}

include('db_config.php');


if (isset($_GET['CINrecruteur'])) {
    $CINrecruteur = $_GET['CINrecruteur'];

   
    $req = $cnx->prepare("SELECT * FROM recruteur WHERE CINrecruteur = :CINrecruteur");
    $req->execute(['CINrecruteur' => $CINrecruteur]);
    $req->execute();
    $donnee = $req->fetch(PDO::FETCH_ASSOC);

   
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modif'])) {
        
        $nom =$_POST['nom'];
        $prenom =$_POST['prenom'];
        $dateNaissance =$_POST['dateNaissance'];
        $numTel = $_POST['numTel'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $role = $_POST['role'];
        $mdp = $_POST['mdp'];

      


        $updateStmt = $cnx->prepare("UPDATE recruteur SET nom=:nom, prenom=:prenom, dateNaissance=:dateNaissance, numTel=:numTel, email=:email, login=:login, role=:role, mdp=:mdp WHERE CINrecruteur=:CINrecruteur");
        $updateResult = $updateStmt->execute([
            'nom' => $nom,
            'prenom' => $prenom,
            'dateNaissance' => $dateNaissance,
            'numTel' => $numTel,
            'email' => $email,
            'login' => $login,
            'role' => $role,
            'mdp' => $mdp,
            'CINrecruteur' => $CINrecruteur
        ]);

       
        if ($updateResult) {
            echo '<script>alert("Modification validée."); location.href="affichrecruteur.php";</script>';
            exit;
        } else {
            echo '<script>alert("Modification invalide.");</script>';
        }
    }
} else {
    echo '<script>alert("Aucun CIN spécifié."); location.href="affichrecruteur.php";</script>';
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


input[type='text'], input[type='number'] ,input[type='password'],input[type='Tel'],select,input[type='date']{
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #fff;
    color: black;
    margin-bottom: 10px;
}

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
}
</style>
</head> <body> <form action="" method="post"> <input type="hidden" name="CINrecruteur" value="<?php echo htmlspecialchars($donnee['CINrecruteur']); ?>"> <label for="nom">Nom:</label> <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($donnee['nom']); ?>" required><br>
<label for="prenom">Prénom:</label> <input type="text" id="prenom" name="prenom" value="<?php echo htmlspecialchars($donnee['prenom']); ?>" required><br>
<br>
<label for="dateNaissance">Date de naissance:</label> <input type="date" id="dateNaissance" name="dateNaissance" value="<?php echo htmlspecialchars($donnee['dateNaissance']); ?>" required><br>
<br>
<label for="numTel">Numéro de téléphone:</label> <input type="tel" id="numTel" name="numTel" value="<?php echo htmlspecialchars($donnee['numTel']); ?>" required><br>
<br>
<label for="email">Email:</label> <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($donnee['email']); ?>" required><br>
<br>
<label for="login">Login:</label> <input type="text" id="login" name="login" value="<?php echo htmlspecialchars($donnee['login']); ?>" required><br>
<br>

<label for="role">role:</label><br>
            <select id="role" name="role">
                <option value="admin" <?php echo ($donnee['role'] == "en attente" ? 'selected' : ''); ?>>admin</option>
                <option value="recruteur" <?php echo ($donnee['role'] == "accepte" ? 'selected' : ''); ?>>recruteur</option>
               
            </select><br>
            <br>
<label for="mdp">Mot de passe:</label> <input type="password" id="mdp" name="mdp" value="<?php echo htmlspecialchars($donnee['mdp']); ?>" required><br>
<br><br>
<input type="submit" name="modif" value="Modifier"> </form> 
</body>
 </html>