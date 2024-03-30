<h2>Gestion des debats</h2>

<?php
	
	require_once ("vue/vue_insert_debat.php"); 

	if(isset($_POST['Valider'])){
		$unControleur->insertDebat($_POST); 
	}	
	$lesDebats = $unControleur->selectAllDebats(); 
	
	require_once ("vue/vue_les_debats.php"); 
?>
