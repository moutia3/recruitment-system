<?php 
    include ('db_config.php');
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
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            
                                <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>1Way Dev</h3>
                            </a>
                            <form method="post" action="">
                            <h3>Sign In</h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="login" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Login</label>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="pwd" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Mot de passe</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                           
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="ok">Sign In</button>
                       
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <?php 
   include ('db_config.php');
    if (isset($_POST['ok'])){
        $login=$_POST['login'];
        $pwd=$_POST['pwd'];
        $req="SELECT * FROM recruteur WHERE login = '$login' AND mdp = '$pwd' AND active = '1'";
        $res=$cnx->query($req);
        if($res && $res->rowCount()==1){  
            Session_start();
            $_SESSION['ok']="ok";
            $enreg=$res->fetch(PDO::FETCH_ASSOC);
            $_SESSION["user"]=$enreg["login"];
            $_SESSION["password"]=$enreg["mdp"];
            if($enreg['role'] == 'admin'){
                echo"<script> document.location.href=\"page.php\" </script>";
            }
            else{
                echo"<script> document.location.href=\"dashboardRecru.php\" </script>";
            }
        }
        else{

            echo"<script> alert('mot de passe ou login incorrecte'); </script>";
            echo"<script> document.location.href=\"index.php\" </script>";	
        } 
    }
?>
</body>

</html>