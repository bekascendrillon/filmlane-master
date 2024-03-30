<h2>Gestion des evenements</h2>

<?php
	
	require_once ("vue/vue_insert_evenement.php"); 

	if(isset($_POST['Valider'])){
		$unControleur->insertEvenement($_POST); 
	}	
	$lesEvenements = $unControleur->selectAllEvenements(); 
	
	require_once ("vue/vue_les_evenements.php"); 
?>
