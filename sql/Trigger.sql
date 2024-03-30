DELIMITER //

CREATE TRIGGER before_update_acteur
BEFORE UPDATE ON Acteur
FOR EACH ROW
BEGIN
    IF NEW.date_naiss_acteur > CURDATE() THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La date de naissance ne peut pas être supérieure à la date actuelle.';
    END IF;
END;
//

DELIMITER ;

DELIMITER //

CREATE TRIGGER before_insert_acteur
BEFORE INSERT ON Acteur
FOR EACH ROW
BEGIN
    IF NEW.date_naiss_acteur > CURDATE() THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'La date de naissance ne peut pas être supérieure à la date actuelle.';
    END IF;
END;
//


DELIMITER //

CREATE TRIGGER before_insert_update_acteur
BEFORE INSERT ON Acteur
FOR EACH ROW
BEGIN
    CALL verifie_date_naissance_acteur(NEW.date_naiss_acteur);
END;
//

DELIMITER ;


DELIMITER //

CREATE TRIGGER before_update_acteur
BEFORE UPDATE ON Acteur
FOR EACH ROW
BEGIN
    CALL verifie_date_naissance_acteur(NEW.date_naiss_acteur);
END;
//



DELIMITER //


DELIMITER //

CREATE TRIGGER before_insert_update_realisateur
BEFORE INSERT ON Realisateur
FOR EACH ROW
BEGIN
    CALL verifie_date_naissance_acteur(NEW.date_naiss_rea);
END;
//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE InsererUtilisateur(
    IN p_Id_user INT,
    IN p_nom_user VARCHAR(255),
    IN p_mot_de_passe VARCHAR(255),
    IN p_email VARCHAR(255)
)
BEGIN
    INSERT INTO Utilisateur (Id_user, nom_user, mot_de_passe, email)
    VALUES (p_Id_user, p_nom_user, p_mot_de_passe, p_email);
END;
//

DELIMITER ;

CALL InsererUtilisateur(1, 'John', 'motdepasse', 'john@example.com');

DELIMITER //

DROP PROCEDURE IF EXISTS InsererParticipationDebat;
CREATE PROCEDURE InsererParticipationDebat(
    IN p_Id_user INT,
    IN p_Id_debat INT
)
BEGIN
    INSERT INTO ParticipationDebat (Id_user, Id_debat)
    VALUES (p_Id_user, p_Id_debat);
END;
//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE InsererParticipationDebat(
    p_Id_user INT,
    p_Id_debat INT
)
BEGIN
    INSERT INTO ParticipationDebat (Id_user, Id_debat)
    VALUES (p_Id_user, p_Id_debat);
END //

DELIMITER ;
