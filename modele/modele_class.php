<?php
class Database {
    private $connexion;

    // Constructeur
    public function __construct($servername, $username, $password, $database) {
        $this->connexion = new mysqli($servername, $username, $password, $database);
        if ($this->connexion->connect_error) {
            die("La connexion à la base de données a échoué : " . $this->connexion->connect_error);
        }
    }

    // Méthode pour obtenir l'instance MySQLi
    public function getConnexion() {
        return $this->connexion;
    }
}

class Utilisateur {
    private $nom_utilisateur;
    private $email;
    private $mot_de_passe;
    private $database;

    // Constructeur
    public function __construct($nom_utilisateur, $email, $mot_de_passe, $database) {
        $this->nom_user = $nom_utilisateur;
        $this->email = $email;
        $this->mot_de_passe = $mot_de_passe;
        $this->database = $database;
    }

    // Méthode pour vérifier si l'utilisateur existe déjà dans la base de données
    public function utilisateurExiste() {
        $requete = $this->database->getConnexion()->prepare("SELECT COUNT(*) AS total FROM utilisateur WHERE email = ?");
        $requete->bind_param("s", $this->email);
        $requete->execute();
        $resultat = $requete->get_result();
        $row = $resultat->fetch_assoc();
        $utilisateur_existe = ($row['total'] > 0);
        $requete->close();
        return $utilisateur_existe;
    }

    // Méthode pour enregistrer un nouvel utilisateur dans la base de données
    public function enregistrerUtilisateur() {
        // Vérifier d'abord si l'utilisateur existe déjà
        if ($this->utilisateurExiste()) {
            return false; // L'utilisateur existe déjà, donc on retourne false
        }

        // L'utilisateur n'existe pas encore, on peut l'ajouter
        $requete = $this->database->getConnexion()->prepare("INSERT INTO utilisateur (nom_user, email, mot_de_passe) VALUES (?, ?, ?)");
        $requete->bind_param("sss", $this->nom_user, $this->email, $this->mot_de_passe);
        if ($requete->execute()) {
            return true; // Succès de l'insertion de l'utilisateur
        } else {
            return false; // Échec de l'insertion de l'utilisateur
        }
        $requete->close();
    }
}

// Classe Film
class Film {

    // Méthode pour ajouter un film à la base de données
    public function ajouterFilm($connexion) {
        // Requête d'insertion SQL
        $sql = "INSERT INTO film (titre, duree, date_sortie, version, genre, critique, id_rea) VALUES (?, ?, ?, ?, ?, ?, ?)";   
        // Préparation de la requête
        $stmt = $connexion->prepare($sql);
        if (!$stmt) {
            // Gérer l'erreur de préparation de la requête
            return false;
        }
        // Liaison des valeurs aux paramètres de la requête
        $stmt->bind_param("sssssss", $this->titre, $this->duree, $this->date_sortie, $this->version, $this->genre, $this->critique, $this->id_rea);
        // Exécution de la requête
        $result = $stmt->execute();
        if (!$result) {
            // Gérer l'erreur d'exécution de la requête
            return false;
        }
        // Fermer la déclaration
        $stmt->close();
        // Retourner true si l'ajout s'est bien déroulé
        return true;
    }
}

class Acteur {

    public function ajouterActeur($connexion) {
        $sql = "INSERT INTO acteur (nom_acteur, prenom_acteur, date_naiss_acteur, nationalite_acteur, biographie_acteur) VALUES (?, ?, ?, ?, ?)";   
        $stmt = $connexion->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("sssss", $this->nom_acteur, $this->prenom_acteur, $this->date_naiss_acteur, $this->nationalite_acteur, $this->biographie_acteur);
        $result = $stmt->execute();
        if (!$result) {
            return false;
        }
        $stmt->close();
        return true;
    }

}

class Realisateur {

    public function ajouterRealisateur($connexion) {
        $sql = "INSERT INTO realisateur (nom_rea, prenom_rea, date_naiss_rea, nationalite_rea, biographie_rea) VALUES (?, ?, ?, ?, ?)";   
        $stmt = $connexion->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("sssss", $this->nom_rea, $this->prenom_rea, $this->date_naiss_rea, $this->nationalite_rea, $this->biographie_rea);
        $result = $stmt->execute();
        if (!$result) {
            return false;
        }
        $stmt->close();
        return true;
    }

}

class Evenement {

    public function ajouterEvenement($connexion) {
        $sql = "INSERT INTO evenement (nom_even, type_even, date_even, lieu, description_even) VALUES (?, ?, ?, ?, ?)";   
        $stmt = $connexion->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("sssss", $this->nom_even, $this->type_even, $this->date_even, $this->lieu, $this->description_even);
        $result = $stmt->execute();
        if (!$result) {
            return false;
        }
        $stmt->close();
        return true;
    }
}

class Avis {

    public function ajouterAvis($connexion) {
        $sql = "INSERT INTO avis (contenu, id_film, id_user) VALUES (?, ?, ?)";   
        $stmt = $connexion->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("sss", $this->contenu, $this->id_film, $this->id_user);
        $result = $stmt->execute();
        if (!$result) {
            return false;
        }
        $stmt->close();
        return true;
    }
}

class Debat {

    public function ajouterDebat($connexion) {
        $sql = "INSERT INTO debat (sujet, description_debat, date_debut, date_fin) VALUES (?, ?, ?, ?)";   
        $stmt = $connexion->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("ssss", $this->sujet, $this->description_debat, $this->date_debut, $this->date_fin);
        $result = $stmt->execute();
        if (!$result) {
            return false;
        }
        $stmt->close();
        return true;
    }

    public function ajouterParticpationDebat($connexion) {
        $sql = "INSERT INTO participationdebat (id_user, id_debat, point_de_vue) VALUES (?, ?, ?)";   
        $stmt = $connexion->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("sss", $this->id_user, $this->id_debat, $this->point_de_vue);
        $result = $stmt->execute();
        if (!$result) {
            return false;
        }
        $stmt->close();
        return true;
    }
}

class Role {

    public function ajouterRole($connexion) {
        $sql = "INSERT INTO evenement (id_film, id_acteur, nom_role, prix_obtenu) VALUES (?, ?, ?, ?)";   
        $stmt = $connexion->prepare($sql);
        if (!$stmt) {
            return false;
        }
        $stmt->bind_param("ssss", $this->id_film, $this->id_acteur, $this->nom_role, $this->prix_obtenu);
        $result = $stmt->execute();
        if (!$result) {
            return false;
        }
        $stmt->close();
        return true;
    }
}

?>
