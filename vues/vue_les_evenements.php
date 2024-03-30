<h2>Liste des Evenements</h2>
<form method="post">
	Filtrer par : <input type="text" name="mot">
	<input type="submit" name="Filtrer"
	value="Filtrer">
</form>
<br/>
<table border ='1'>
	<tr> 
		<td> Id Evenement </td> 
		<td> Nom Evenement  </td>
		<td> Type Evenement </td> 
		<td> Date Evenement   </td> 
		<td> Lieu  </td> 
		<td> Description Evenement  </td> 
		
	<tr> 
	<?php
	foreach ($lesEvenements as $unEvenement) {
		echo "<tr>"; 
		echo "<td>".$unEvenement['idevenement']."</td>"; 
		echo "<td>".$unEvenement['nomevenement']."</td>"; 
		echo "<td>".$unEvenement['typeevenement']."</td>"; 
		echo "<td>".$unEvenement['dateevenement']."</td>"; 
		echo "<td>".$unEvenement['lieu']."</td>";
		echo "<td>".$unEvenement['descriptionevenement']."</td>";
		
		echo "<tr/>";
	}
	?>
</table>
