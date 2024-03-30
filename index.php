<?php
// Inclure le fichier de configuration de la base de données
include "config.php";

// Sélectionner tous les utilisateurs
$sql = "SELECT * FROM Utilisateur";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Afficher les données de chaque utilisateur
    echo "<h2>Liste des utilisateurs :</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nom</th><th>Email</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["Id_user"] . "</td>";
        echo "<td>" . $row["nom_user"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun utilisateur trouvé.";
}
?>