<?php
include("db_config.php");

$libellePoste = $_GET['libellePoste'];
$req = $cnx->query("SELECT * FROM poste WHERE libellePoste='$libellePoste'");
$donnee = $req->fetch(PDO::FETCH_ASSOC);

echo "<form method='POST'>"; 
echo "<label>libelle poste:</label>
    <input type='text' name='libellePoste' value='" . $donnee['libellePoste'] . "'> <br>";
echo "<label>description:</label>
    <input type='text' name='description' value='" . $donnee['description'] . "'> <br>";
echo "<input type='submit' name='modif'>
    </form>";

if (isset($_POST['modif'])) {
    $libellePoste = $_POST['libellePoste'];
    $description = $_POST['description'];

    $res = $cnx->exec("UPDATE poste SET libellePoste='$libellePoste', description='$description' WHERE libellePoste='$libellePoste'");

    if ($res !== false) {
        echo "<script>alert('modification valide');</script>";  
        header("location:afficherPostes.php");
    } else {
        echo "<script>alert('modification non valide);</script>";
    }
}
?>
<?php

echo "<!DOCTYPE html>
<html>
<head>
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
}
</style>

</head>
<body>";
?>
