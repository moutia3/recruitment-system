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

input[type="text"], input[type="number"] {
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
    color: black;
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
select{
  width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color:  #fff;
    color:black;
    cursor: pointer;
    margin-top: 10px;
}
body {
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
        
        <h2 class="mt-0 mb-10"></h2>
        <p class="mt-0 mb-20 c-grey fs-15"></p>
        <form name ="monFormulaire"action="" method="post">
        <div class="mb-15">
          <label class="fs-14 c-grey d-block mb-10" for="first" >CIN recruteur</label><br>
          <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            type="text"
            name="CIN"
            placeholder=""
          /><br>
        </div>
        <div class="mb-15">
          <label  for="last">Nom</label><br><br>
          <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            name="nom"
            type="text"
            placeholder=""
          /><br>
          <label class="fs-14 c-grey d-block mb-10" for="first">Prenom</label><br>
          <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            type="text"
            name="prenom"
            placeholder=""
          /><br>
          <label class="fs-14 c-grey d-block mb-10" for="first">Date de naissance</label><br>
          <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            type="date"
            name="dateNaissance"
            placeholder=""
          /><br>
          <label class="fs-14 c-grey d-block mb-10" for="first">Num tel</label><br>
          <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            type="text"
            name="numTel"
            placeholder=""
          /><br>
        </div>
        <div>
          <label class="fs-14 c-grey d-block mb-10" for="first">Email</label><br>
          <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            type="text"
            name="email"
            placeholder=""
          /><br>
          <label class="fs-14 c-grey d-block mb-10" for="first">Login</label><br>
          <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            type="text"
            name="login"
            placeholder=""
          /><br>
          <br>
          
          <label class="fs-14 c-grey d-block mb-10" for="first">Mot de passe</label><br>
          <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            type="text"
            name="mdp"
            placeholder=""
          /><br>
          
          Role <br>
            <select name="role">
                <option>admin</option>
                <option>recruteur</option>
            </select> <br><br>
          <br>
          <button onclick="showAlert()" name="ajout" style="background-color: red; color: white;">Envoyer</button>

            
        </div>
      </div>
      <script>
      function showAlert() {
        var cin = document.forms["monFormulaire"]["CIN"].value;
  var nom = document.forms["monFormulaire"]["nom"].value;
  var prenom = document.forms["monFormulaire"]["prenom"].value;
  var dateNaissance = document.forms["monFormulaire"]["dateNaissance"].value;
  var numTel = document.forms["monFormulaire"]["numTel"].value;
  var email = document.forms["monFormulaire"]["email"].value;
  var login = document.forms["monFormulaire"]["login"].value;
  var mdp = document.forms["monFormulaire"]["mdp"].value;
  if (cin == "" || cin.length != 8 || isNaN(cin)) {
    alert("cin est incorrecte");
    return false;
}
  if (nom == "") {
    alert("Nom est vide");
    return false;
  }
  if (prenom == "") {
    alert("Prenom est vide");
    return false;
  }
  if (dateNaissance == "") {
    alert("Date de naissance est vide");
    return false;
  }
  if (cin == "" || cin.length != 8 || isNaN(cin)) {
    alert("Num tel est incorrecte");
    return false;
  }
  if (email == "" || email.indexOf("@") == -1) {
    alert("Email est vide ou invalide");
    return false;
}
  if (login == "") {
    alert("Login est vide");
    return false;
  }
  if (mdp == "") {
    alert("Mot de passe est vide");
    return false;
  }


}</script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
   
    <script src="js/main.js"></script>

    <?php
        include("db_config.php");
        if(isset($_POST['ajout'])){
            $CIN=$_POST['CIN'];
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $dateNaissance=$_POST['dateNaissance'];
            $numTel=$_POST['numTel'];
            $email=$_POST['email'];
            $login=$_POST['login'];
            $mdp=$_POST['mdp'];
            $role=$_POST['role'];

            $existsCIN=$cnx->query("SELECT * FROM recruteur WHERE CINrecruteur = '$CIN'");
            $existsLogin=$cnx->query("SELECT * FROM recruteur WHERE login='$login'");
            if ($existsCIN->rowCount() > 0){
                echo "<script>alert('CIN exite deja');</script>";
            }
            if($existsLogin->rowCount() > 0){
                echo "<script>alert('Le login est deja utilise');</script>";
            }
            else{
                $res=$cnx->exec("INSERT INTO recruteur VALUES ('$CIN','$nom','$prenom','$dateNaissance','$numTel','$email','$login','$mdp',true,'$role')");
                if($res!=0){
                    echo "<br> ajout avec succes";
                    header("location:affichrecruteur.php");
                }
                else{
                    echo "<br> ";
                }
            }
    }
            
    ?>
</body>

</html>