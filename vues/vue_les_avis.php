<h2>Liste des Avis</h2>
<table border ='1'>
	<tr> 
		<td> Id Avis </td> 
		<td> Contenu  </td>
		<td> Id Film  </td> 
		<td> Id Utilisateur  </td> 
	<tr> 
	<?php
	foreach ($lesEtudiants as $unEtudiant) {
		echo "<tr>"; 
		echo "<td>".$unAvis['idavis']."</td>"; 
		echo "<td>".$unAvis['contenu']."</td>"; 
		echo "<td>".$unAvis['idfilm']."</td>"; 
		echo "<td>".$unAvis['idutilisateur']."</td>"; 
		echo "<tr/>";
	}
	?>
</table>

