<h3>Ajout d'un nouveau Avis</h3>
<form method="post">
	<table>
		<tr>
			<td>Contenu  </td>
			<td><input type="text" name="nom"></td>
		</tr>
		
		<tr>
			<td> Film  </td>
			<td>
			<select name="idfilm">
				<?php
				foreach ($lesFilms as $unFilm) {
					echo "<option value='"; 
					echo $unFilm['idfilm']; 
					echo "'>"; 
					echo $unFilm['titre']; 
					echo "</option>";
				}
				?>
			</select>
			</td>

            <td> Utilisateur  </td>
			<td>
			<select name="idutilisateur">
				<?php
				foreach ($lesUtilisateurs as $unUtilisateur) {
					echo "<option value='"; 
					echo $unUtilisateur['idutilisateur']; 
					echo "'>"; 
					echo $unUtilisateur['nom']; 
					echo "</option>";
				}
				?>
			</select>
			</td>
		</tr>
		<tr>
			<td><input type="reset" name="Annuler" value="Annuler"> </td>
			<td><input type="submit" name="Valider" value="Valider"></td>
		</tr>
	</table>
</form>