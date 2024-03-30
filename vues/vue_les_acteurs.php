<h2>Liste des Acteurs</h2>
<table border ='1'>
	<tr> 
		<td> Id Acteur </td> 
		<td> Nom  </td>
		<td> Prénom </td> 
        <td> Date de Naissance  </td> 
        <td> Nationalité  </td> 
        <td> Date de Décès  </td> 
        <td> Date de début d'Activité  </td>
        <td> Date de Fin  </td>  
        <td> Activité  </td> 
		<td> Adresse  </td> 
		<td> Email  </td> 
		<td> Id Films  </td> 
	<tr> 
	<?php
	foreach ($lesActeurs as $unActeur) {
		echo "<tr>"; 
		echo "<td>".$unActeur['idetudiant']."</td>"; 
		echo "<td>".$unActeur['nom']."</td>"; 
		echo "<td>".$unActeur['prenom']."</td>"; 
        echo "<td>".$unActeur['Date de Naissance']."</td>"; 
        echo "<td>".$unActeur['Nationalité']."</td>"; 
        echo "<td>".$unActeur['Date de Décès']."</td>"; 
        echo "<td>".$unActeur['Date de début Activité']."</td>"; 
        echo "<td>".$unActeur['Date de Fin']."</td>"; 
        echo "<td>".$unActeur['Activité']."</td>"; 
		echo "<td>".$unActeur['adresse']."</td>"; 
		echo "<td>".$unActeur['email']."</td>";
        echo "<td>".$unActeur['id Films']."</td>";
		
		echo "<tr/>";
	}
	?>
</table>