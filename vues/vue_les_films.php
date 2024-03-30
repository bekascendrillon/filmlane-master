<h2>Liste des Films</h2>
<form method="post">
	Filtrer par : <input type="text" name="mot">
	<input type="submit" name="Filtrer"
	value="Filtrer">
</form>
<br/>
<table border ='1'>
	<tr> 
		<td> Id Films </td> 
		<td> Titre  </td>
		<td> Durée </td> 
		<td> Date Sortie   </td> 
		<td> Version  </td> 
		<td> Genre  </td> 
		<td> Synopsis  </td>
        <td> Critique  </td> 
	<tr> 
	<?php
	foreach ($lesFilms as $unFilm) {
		echo "<tr>"; 
		echo "<td>".$unFilm['idfilm']."</td>"; 
		echo "<td>".$unFilm['titre']."</td>"; 
		echo "<td>".$unFilm['duree']."</td>"; 
		echo "<td>".$unFilm['datesortie']."</td>"; 
		echo "<td>".$unFilm['version']."</td>";
		echo "<td>".$unFilm['genre']."</td>";
		echo "<td>".$unFilm['synopsis']."</td>"; 
        echo "<td>".$unFilm['critique']."</td>";
		echo "<tr/>";
	}
	?>
</table>
