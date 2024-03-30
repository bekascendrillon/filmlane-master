<h2>Liste des Debats</h2>
<form method="post">
	Filtrer par : <input type="text" name="mot">
	<input type="submit" name="Filtrer"
	value="Filtrer">
</form>
<br/>
<table border ='1'>
	<tr> 
		<td> Id Debat </td> 
		<td> Sujet  </td>
		<td> Description Debat </td> 
		<td> Date Debut   </td> 
		<td> Date Fin  </td> 
		
	<tr> 
	<?php
	foreach ($lesDebats as $unDebat) {
		echo "<tr>"; 
		echo "<td>".$unDebat['iddebat']."</td>"; 
		echo "<td>".$unDebat['sujet']."</td>"; 
		echo "<td>".$unDebat['descriptiondebat']."</td>"; 
		echo "<td>".$unDebat['datedebut']."</td>"; 
		echo "<td>".$unDebat['datefin']."</td>";
		
		echo "<tr/>";
	}
	?>
</table>
