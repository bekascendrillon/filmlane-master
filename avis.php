<h2> Gestion des avis</h2>
<?php
	$lesFilms = $unControleur->selectAllFilms(); 
	$lesUtilisateurs = $unControleur->selectAllUtilisateurs(); 
	require_once ("vue/vue_insert_avis.php"); 
	if(isset($_POST['Valider'])){
		$unControleur->insertAvis($_POST); 
	}

	$lesAvis = $unControleur->selectAllAvis(); 
	
	require_once ("vue/vue_les_avis.php"); 
?>
