<?php
    include ("db_config.php");
    $competence = $_POST['competence'];
    $desc = $_POST['desc'];
    $counter = $_POST['counter'];
    try{
        $exists=$cnx->query("SELECT * from competence where libelleCompetence='$competence'");
        if ($exists->rowCount() == 0){
            $sql = "INSERT INTO competence (libelleCompetence, description,active) VALUES ('$competence', '$desc',true)";
            $cnx->query($sql);

            $niveau = $_POST['niveau'];
            $desc = $_POST['description'];
            $note = $_POST['note'];
            $sql = "INSERT INTO niveau (niveau, description, libelleCompetence, note, active) VALUES ('$niveau', '$desc','$competence','$note',true)";
            $cnx->query($sql);

            $counter = $_POST['counter'];
if($counter > 1) {
    for($i = 1; $i <= $counter; $i++) {
        $niveau = 'niveau' . $i;
        $desc = 'description' . $i;
        $note = 'note' . $i;

        if(isset($_POST[$niveau]) && isset($_POST[$desc]) && isset($_POST[$note])) {
            $niveau = $_POST[$niveau];
            $desc = $_POST[$desc];
            $note = $_POST[$note];
            $sql = "INSERT INTO niveau (niveau, description, libelleCompetence, note, active) VALUES ('$niveau', '$desc','$competence','$note',true)";
            $cnx->query($sql);
        }
    }
}
            header("location:afficherCompetence.php");
        }else{
            echo "<script>alert('competences exite deja');</script>";

        }
    }catch (PDOException $e) {
        echo "";
    }
?>