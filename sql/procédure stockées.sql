
DELIMITER //
CREATE OR REPLACE PROCEDURE InsererUtilisateur(
    p_nom_user VARCHAR(50),
    p_mot_de_passe VARCHAR(255),
    p_email VARCHAR(100)
)
AS
BEGIN
    INSERT INTO Utilisateur (nom_user, mot_de_passe, email)
    VALUES (p_nom_user, p_mot_de_passe, p_email);
    
    COMMIT; 
END //



CREATE OR REPLACE PROCEDURE InsererParticipationDebat(
    p_Id_user INT,
    p_Id_debat INT
)
AS
BEGIN
    INSERT INTO ParticipationDebat (Id_user, Id_debat)
    VALUES (p_Id_user, p_Id_debat);
    
    COMMIT; -- Confirmer la transaction
END //


CREATE OR REPLACE PROCEDURE InsererParticipationEven(
    p_Id_even INT,
    p_Id_user INT
)
AS
BEGIN
    INSERT INTO ParticipationEven (Id_even, Id_user)
    VALUES (p_Id_even, p_Id_user);
    
    COMMIT; -- Confirmer la transaction
END //