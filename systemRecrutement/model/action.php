<?php
	include('db_config.php');
	$query = "SELECT * FROM niveau WHERE libelleCompetence = '".$_POST['libelleCompetence']."'";
	$result = $cnx->query($query);
	echo '<option value="">Select niveau</option>'; 
	while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
		echo '<option value="'.$row['id'].'">'.$row['niveau'].'</option>'; 
	}
?>