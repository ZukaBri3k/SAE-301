SET SCHEMA 'public';


/******************************
Création des tables
******************************/

--DROP TABLE Personne;
create table Personnes (
    id_personne SERIAL PRIMARY KEY,
    civilite_pers VARCHAR(10),
    nom_pers VARCHAR(30),
    prenom_pers VARCHAR(30),
    telephone_pers VARCHAR(12),
    mail_pers VARCHAR(30),
    ville_pers VARCHAR(30),
    code_postal_pers integer,
    adresse_pers VARCHAR(50),
    pays_pers VARCHAR(30),
    mdp_pers VARCHAR(60),
    pseudo_pers VARCHAR(30),
    photo_pers VARCHAR(30),
    age_pers INTEGER,
    est_banni BOOLEAN,
    IBAN VARCHAR(255),
    role VARCHAR(10)
);



--DROP TABLE Client;
create table Client (
    id_client INTEGER PRIMARY KEY REFERENCES Personne(id_personne),
    demande_devis_auto VARCHAR(510),
    msg_confirm_devis VARCHAR(510),
    msg_refus_devis VARCHAR(510)
);


--DROP TABLE Messagerie;
CREATE TABLE Messagerie (
    id_expediteur INTEGER REFERENCES Personne(id_personne),
    id_destinataire INTEGER REFERENCES Personne(id_personne),
    message VARCHAR(400) NOT NULL,
    date_envoi DATE NOT NULL,
    heure_envoi TIME NOT NULL, 
    PRIMARY KEY (id_expediteur, id_destinataire)
);


--DROP TABLE Devis;
create table Devis (
    ref_devis SERIAL PRIMARY KEY,
    nb_pers integer,
    date_deb date,
    date_fin date,
    date_em date,
    date_val date,
    annul VARCHAR(255),
    charges_HT FLOAT,
    sous_tot_HT FLOAT,
    sous_tot_TTC FLOAT,
    frais_serv_HT FLOAT,
    frais_serv_TTC FLOAT,
    taxe_de_sejour FLOAT,
    prix_tot FLOAT,
    delai integer,
    etat_devis BOOLEAN,
    heure_arriv TIME,
    heure_depart TIME,
    id_client_devis integer REFERENCES Client(id_client)
);


--DROP TABLE Proprietaire;
create table Proprietaire (
    id_proprio INTEGER PRIMARY KEY REFERENCES Personne(id_personne),
    ref_devis_proprio INTEGER REFERENCES Devis(ref_devis),
    piece_id_proprio BOOLEAN,
    langue_proprio VARCHAR(30),
    proposition_auto_devis VARCHAR(255),
    piece_id_proprio_recto VARCHAR(50),
    piece_id_proprio_verso VARCHAR(50)
);


--DROP TABLE Logement;
CREATE TABLE Logement (
    id_logement SERIAL PRIMARY KEY,
    libelle_logement VARCHAR(50),
    accroche_logement VARCHAR(130),
    descritpif_logement VARCHAR(1200),
    nb_personne_max INTEGER,
    longitude_logement DECIMAL,
    latitude_logement DECIMAL,
    adresse_logement VARCHAR(255),
    code_postal_logement integer,
    ville_logement VARCHAR(255),
    nature_logement VARCHAR(30),
    type_logement VARCHAR(30),
    surface_habitable_logement DECIMAL,
    nb_chambre_logement INTEGER,
    nb_lit_total integer,
    nb_salle_de_bain_logement integer,
    amenagement_propose_logement VARCHAR(30),
    installation_offerte_logement VARCHAR(30),
    equipement_propose_logement VARCHAR(30),
    service_complementaire_logement VARCHAR(30),
    charge_additionnel_prix DECIMAL[],
    charge_additionnel_libelle VARCHAR(30)[],
    photo_couverture_logement VARCHAR(30),
    photo_complementaire_logement VARCHAR(30),
    moyenne_avis_logement DECIMAL,
    prix_logement DECIMAl,
    en_ligne BOOLEAN,
    id_proprio_logement INTEGER REFERENCES Proprietaire(id_proprio)
);

--DROP TABLE Chambre;
create table Chambre (
    id_chambre SERIAL PRIMARY KEY,
    nb_lit_simple integer,
    nb_lit_double integer,
    details_lit VARCHAR(255),
    id_logement integer REFERENCES Logement(id_logement)
);


--DROP TABLE Reservation;
Create table Reservation (
    id_reserv SERIAL PRIMARY KEY,
    id_logement_reserv integer REFERENCES Logement(id_logement),
    confirm_reserv BOOLEAN,
    CGV_reserv BOOLEAN,
    mail_reserv VARCHAR(255),
    facture_reserv integer REFERENCES Devis(ref_devis),
    num_carte integer,
    date_carte date,
    crypt_carte integer,
    annul_strict_reserv boolean,
    annul_flex_reserv boolean,
    annul_NRembours_reserv boolean,
    facture_davoir_reserv integer
);

--DROP TABLE Avis;
create table Avis (
    note_avis integer,
    com_avis VARCHAR(400),
    id_reserv_avis integer REFERENCES Reservation(id_reserv),
    id_avis SERIAL PRIMARY KEY
);


--DROP TABLE Calendrier;
create table Calendrier (
    statut_propriete BOOLEAN,
    plage_disponibilite DATE,
    plage_indisponibilite DATE,
    tarif_journalier_location FLOAT,
    duree_min_location integer,
    delai_res_arrivee integer,
    contrainte_arrivee VARCHAR(255),
    contrainte_depart VARCHAR(255),
    id_reserv int REFERENCES Reservation(id_reserv),
    id_logement int REFERENCES Logement(id_logement)
);



/***************************
Fonction trigger
***************************/


CREATE OR REPLACE FUNCTION nom_maj_funct() RETURNS TRIGGER AS $BODY$
BEGIN
  new.nom_pers = UPPER(new.nom_pers);
  RETURN NEW;
END;
$BODY$
LANGUAGE 'plpgsql';

--DROP TRIGGER nom_maj ON Client;
CREATE TRIGGER nom_maj
BEFORE INSERT OR UPDATE OF nom_pers
ON Personne
FOR EACH ROW
EXECUTE PROCEDURE nom_maj_funct();



CREATE OR REPLACE FUNCTION format_tel_client() RETURNS TRIGGER AS $BODY$
BEGIN
  new.telephone_pers = concat('+33', substring(new.telephone_pers, 2, 9));
  RETURN NEW;
END;
$BODY$
LANGUAGE 'plpgsql';

CREATE TRIGGER telephone_pers
BEFORE INSERT OR UPDATE OF telephone_pers
ON Personne
FOR EACH ROW
EXECUTE PROCEDURE format_tel_client();


/***************************
Insertion
***************************/


--DROP FUNCTION insert_nouvelle_personne;
CREATE OR REPLACE FUNCTION insert_nouvelle_personne(civilite_pers VARCHAR(10), nom_pers VARCHAR(30), prenom_pers VARCHAR(30), telephone_pers VARCHAR(12), mail_pers VARCHAR(30), ville_pers VARCHAR(30), code_postal_pers integer, adresse_pers VARCHAR(50), pays_pers VARCHAR(30), mdp_pers VARCHAR(30), pseudo_pers VARCHAR(30), photo_pers VARCHAR(30), age_pers INTEGER, role VARCHAR(10), IBAN VARCHAR(255), est_banni BOOLEAN) RETURNS INTEGER AS $$
DECLARE
    new_id INTEGER;
BEGIN
    INSERT INTO Personne (
        civilite_pers, nom_pers, prenom_pers, telephone_pers, mail_pers, ville_pers,
        code_postal_pers, adresse_pers, pays_pers, mdp_pers, pseudo_pers, photo_pers, age_pers, IBAN, role, est_banni
    )
    VALUES (
        civilite_pers, nom_pers, prenom_pers, telephone_pers, mail_pers, ville_pers,
        code_postal_pers, adresse_pers, pays_pers, mdp_pers, pseudo_pers, photo_pers, age_pers, IBAN, role, est_banni
    )
    RETURNING id_personne INTO new_id;
    
    -- Ajoute le nom du client à la demande de devis automatique
    IF role = '0' THEN
        INSERT INTO Client (id_client, demande_devis_auto, msg_confirm_devis, msg_refus_devis)
        VALUES (new_id, 
            'Bonjour Monsieur/Madame [Nom proprietaire]. Je souhaiterais réserver le logement [nom logement]. J''aimerais savoir si c''est possible d''avoir un devis.'
|| ' Cordialement, ' || nom_pers || '. Bonne journée.', 
 'Bonjour Monsieur/Madame [nom propriétaire]. J''accepte le devis et confirme par la même occasion la réservation pour le logement [nom logement].
Merci de me confirmer les détails.' || ' Cordialement, ' || nom_pers || '. Bonne journée.',
'Bonjour Monsieur/Madame Propriétaire, Je suis désolé mais après analyse du devis je suis dans la
l''obligation de refusé le devis pour le logement [nom logement].'
|| ' Cordialement, ' || nom_pers || '. Bonne journée.');
    ELSIF role = '1' THEN
        INSERT INTO Proprietaire (id_proprio, ref_devis_proprio, piece_id_proprio, langue_proprio, proposition_auto_devis, piece_id_proprio_recto, piece_id_proprio_verso)
        VALUES (new_id, NULL, false, '', 'Bonjour Monsieur/Madame [nom client]. 
Voici le devis que je vous proprose pour la réservation du logement [nom logement].'
|| ' Cordialement, ' || nom_pers || '. Bonne journée.',
                                           '', '');
    END IF;

    RETURN new_id;
END;
$$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION insere_devis(p_id_client integer, p_id_logement integer, p_nb_pers integer, p_date_deb date, p_date_fin date, p_date_em date, p_date_val date, p_annul VARCHAR(255), p_charges_HT FLOAT, p_frais_serv_HT FLOAT, p_taxe_de_sejour FLOAT, p_delai integer, p_etat_devis BOOLEAN, p_heure_arriv TIME, p_heure_depart TIME) RETURNS INTEGER AS $$
DECLARE
    new_devis_id INTEGER;
    prix_logement_nuit DECIMAL;
    frais_serv_HT DECIMAL;
    sous_tot_TTC DECIMAL;
    sous_tot_HT DECIMAL;
    frais_serv_TTC DECIMAL;
    prix_tot DECIMAL;
BEGIN
    SELECT prix_logement INTO prix_logement_nuit
    FROM Logement
    WHERE id_logement = p_id_logement;

    sous_tot_HT := p_nb_pers * (p_date_fin - p_date_deb) * prix_logement_nuit;
    sous_tot_TTC := sous_tot_HT * 1.20;
    frais_serv_HT := p_charges_HT;
    frais_serv_TTC := frais_serv_HT * 1.20;
    prix_tot := sous_tot_TTC + frais_serv_TTC + p_taxe_de_sejour;

    INSERT INTO Devis (
        nb_pers, date_deb, date_fin, date_em, date_val, annul, charges_HT, sous_tot_HT,
        sous_tot_TTC, frais_serv_HT, frais_serv_TTC, taxe_de_sejour, prix_tot,
        delai, etat_devis, heure_arriv, heure_depart, id_client_devis
    )
    VALUES (
        p_nb_pers, p_date_deb, p_date_fin, p_date_em, p_date_val, p_annul, p_charges_HT, sous_tot_HT,
        sous_tot_TTC, frais_serv_HT, frais_serv_TTC, p_taxe_de_sejour, prix_tot,
        p_delai, p_etat_devis, p_heure_arriv, p_heure_depart, p_id_client
    )
    RETURNING ref_devis INTO new_devis_id;
    
    RETURN new_devis_id;
END;
$$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION insere_logement(
    p_libelle_logement VARCHAR(50),
    p_accroche_logement VARCHAR(130),
    p_descritpif_logement VARCHAR(1200),
    p_nb_personne_max INTEGER,
    p_longitude_logement DECIMAL,
    p_latitude_logement DECIMAL,
    p_adresse_logement VARCHAR(255),
    p_code_postal_logement INTEGER,
    p_ville_logement VARCHAR(255),
    p_nature_logement VARCHAR(30),
    p_type_logement VARCHAR(30),
    p_surface_habitable_logement DECIMAL,
    p_nb_chambre_logement INTEGER,
    p_nb_lit_total INTEGER,
    p_nb_salle_de_bain_logement INTEGER,
    p_amenagement_propose_logement VARCHAR(30),
    p_installation_offerte_logement VARCHAR(30),
    p_equipement_propose_logement VARCHAR(30),
    p_service_complementaire_logement VARCHAR(30),
    p_charge_additionnel_prix DECIMAL[],
    p_charge_additionnel_libelle VARCHAR(30)[],
    p_photo_couverture_logement VARCHAR(30),
    p_photo_complementaire_logement VARCHAR(30),
    p_moyenne_avis_logement DECIMAL,
    p_prix_logement DECIMAL,
    p_en_ligne BOOLEAN,
    p_id_proprio_logement INTEGER
) RETURNS INTEGER AS
$$
DECLARE
    new_logement_id INTEGER;
BEGIN
    INSERT INTO Logement (
        libelle_logement, accroche_logement, descritpif_logement, nb_personne_max, longitude_logement, latitude_logement,
        adresse_logement, code_postal_logement, ville_logement, nature_logement, type_logement, surface_habitable_logement,
        nb_chambre_logement, nb_lit_total, nb_salle_de_bain_logement, amenagement_propose_logement,
        installation_offerte_logement, equipement_propose_logement, service_complementaire_logement,
        charge_additionnel_prix, charge_additionnel_libelle, photo_couverture_logement, photo_complementaire_logement,
        moyenne_avis_logement, prix_logement, en_ligne, id_proprio_logement
    )
    VALUES (
        p_libelle_logement, p_accroche_logement, p_descritpif_logement, p_nb_personne_max, p_longitude_logement, p_latitude_logement,
        p_adresse_logement, p_code_postal_logement, p_ville_logement, p_nature_logement, p_type_logement, p_surface_habitable_logement,
        p_nb_chambre_logement, p_nb_lit_total, p_nb_salle_de_bain_logement, p_amenagement_propose_logement,
        p_installation_offerte_logement, p_equipement_propose_logement, p_service_complementaire_logement,
        p_charge_additionnel_prix, p_charge_additionnel_libelle, p_photo_couverture_logement, p_photo_complementaire_logement,
        p_moyenne_avis_logement, p_prix_logement, p_en_ligne, p_id_proprio_logement
    )
    RETURNING id_logement INTO new_logement_id;
    
    RETURN new_logement_id;
END;
$$
LANGUAGE 'plpgsql';



CREATE OR REPLACE FUNCTION insere_chambre(
    p_nb_lit_simple integer,
    p_nb_lit_double integer,
    p_details_lit VARCHAR(255),
    p_id_logement integer
) RETURNS VOID AS
$$
BEGIN
    INSERT INTO Chambre (nb_lit_simple, nb_lit_double, details_lit, id_logement)
    VALUES (p_nb_lit_simple, p_nb_lit_double, p_details_lit, p_id_logement);
END;
$$
LANGUAGE 'plpgsql';



CREATE OR REPLACE FUNCTION insere_message(
    p_id_expediteur INTEGER,
    p_id_destinataire INTEGER,
    p_message VARCHAR(400),
    p_date_envoi DATE,
    p_heure_envoi TIME
) RETURNS VOID AS
$$
BEGIN
    INSERT INTO Messagerie (id_expediteur, id_destinataire, message, date_envoi, heure_envoi)
    VALUES (p_id_expediteur, p_id_destinataire, p_message, p_date_envoi, p_heure_envoi);
END;
$$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION insere_reservation(
    p_id_logement_reserv INTEGER,
    p_id_devis INTEGER,
    p_confirm_reserv BOOLEAN,
    p_CGV_reserv BOOLEAN,
    p_mail_reserv VARCHAR(255),
    p_num_carte INTEGER,
    p_date_carte DATE,
    p_crypt_carte INTEGER,
    p_annul_strict_reserv BOOLEAN,
    p_annul_flex_reserv BOOLEAN,
    p_annul_NRembours_reserv BOOLEAN,
    p_facture_davoir_reserv INTEGER
) RETURNS INTEGER AS
$$
DECLARE
    new_reservation_id INTEGER;
BEGIN
    INSERT INTO Reservation (
        id_logement_reserv, facture_reserv, confirm_reserv, CGV_reserv, mail_reserv, num_carte, date_carte, crypt_carte,
        annul_strict_reserv, annul_flex_reserv, annul_NRembours_reserv, facture_davoir_reserv
    )
    VALUES (
        p_id_logement_reserv, p_id_devis, p_confirm_reserv, p_CGV_reserv, p_mail_reserv, p_num_carte, p_date_carte, p_crypt_carte,
        p_annul_strict_reserv, p_annul_flex_reserv, p_annul_NRembours_reserv, p_facture_davoir_reserv
    )
    RETURNING id_reserv INTO new_reservation_id;
    
    RETURN new_reservation_id;
END;
$$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION insere_avis(
    p_note_avis INTEGER,
    p_com_avis VARCHAR(400),
    p_id_reserv_avis INTEGER
) RETURNS INTEGER AS
$$
DECLARE
    new_avis_id INTEGER;
BEGIN
    INSERT INTO Avis (note_avis, com_avis, id_reserv_avis)
    VALUES (p_note_avis, p_com_avis, p_id_reserv_avis)
    RETURNING id_avis INTO new_avis_id;
    
    RETURN new_avis_id;
END;
$$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION insere_calendrier(
    p_statut_propriete BOOLEAN,
    p_plage_disponibilite DATE,
    p_plage_indisponibilite DATE,
    p_tarif_journalier_location FLOAT,
    p_duree_min_location INTEGER,
    p_delai_res_arrivee INTEGER,
    p_contrainte_arrivee VARCHAR(255),
    p_contrainte_depart VARCHAR(255),
    p_id_reserv INTEGER,
    p_id_logement INTEGER
) RETURNS VOID AS
$$
BEGIN
    INSERT INTO Calendrier (
        statut_propriete, plage_disponibilite, plage_indisponibilite, tarif_journalier_location,
        duree_min_location, delai_res_arrivee, contrainte_arrivee, contrainte_depart, id_reserv, id_logement
    )
    VALUES (
        p_statut_propriete, p_plage_disponibilite, p_plage_indisponibilite, p_tarif_journalier_location,
        p_duree_min_location, p_delai_res_arrivee, p_contrainte_arrivee, p_contrainte_depart, p_id_reserv, p_id_logement
    );
END;
$$
LANGUAGE 'plpgsql';


/***************************
UPDATE
***************************/


CREATE OR REPLACE FUNCTION update_personne(
    p_id_personne INTEGER,
    p_civilite_pers VARCHAR(10),
    p_nom_pers VARCHAR(30),
    p_prenom_pers VARCHAR(30),
    p_telephone_pers VARCHAR(12),
    p_mail_pers VARCHAR(30),
    p_ville_pers VARCHAR(30),
    p_code_postal_pers INTEGER,
    p_adresse_pers VARCHAR(50),
    p_pays_pers VARCHAR(30),
    p_mdp_pers VARCHAR(30),
    p_pseudo_pers VARCHAR(30),
    p_photo_pers VARCHAR(30),
    p_age_pers INTEGER,
    p_IBAN VARCHAR(255),
    p_est_banni BOOLEAN
) RETURNS VOID AS
$$
BEGIN
    UPDATE Personne
    SET
        civilite_pers = p_civilite_pers,
        nom_pers = p_nom_pers,
        prenom_pers = p_prenom_pers,
        telephone_pers = p_telephone_pers,
        mail_pers = p_mail_pers,
        ville_pers = p_ville_pers,
        code_postal_pers = p_code_postal_pers,
        adresse_pers = p_adresse_pers,
        pays_pers = p_pays_pers,
        mdp_pers = p_mdp_pers,
        pseudo_pers = p_pseudo_pers,
        photo_pers = p_photo_pers,
        age_pers = p_age_pers,
        IBAN = p_IBAN,
        est_banni = p_est_banni
    WHERE id_personne = p_id_personne;
END;
$$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION update_devis(
    p_ref_devis INTEGER,
    p_nb_pers INTEGER,
    p_date_deb DATE,
    p_date_fin DATE,
    p_date_em DATE,
    p_date_val DATE,
    p_annul VARCHAR(255),
    p_charges_HT FLOAT,
    p_sous_tot_HT FLOAT,
    p_sous_tot_TTC FLOAT,
    p_frais_serv_HT FLOAT,
    p_frais_serv_TTC FLOAT,
    p_taxe_de_sejour FLOAT,
    p_prix_tot FLOAT,
    p_delai INTEGER,
    p_etat_devis BOOLEAN,
    p_heure_arriv TIME,
    p_heure_depart TIME,
    p_id_client_devis INTEGER
) RETURNS VOID AS
$$
BEGIN
    UPDATE Devis
    SET
        nb_pers = p_nb_pers,
        date_deb = p_date_deb,
        date_fin = p_date_fin,
        date_em = p_date_em,
        date_val = p_date_val,
        annul = p_annul,
        charges_HT = p_charges_HT,
        sous_tot_HT = p_sous_tot_HT,
        sous_tot_TTC = p_sous_tot_TTC,
        frais_serv_HT = p_frais_serv_HT,
        frais_serv_TTC = p_frais_serv_TTC,
        taxe_de_sejour = p_taxe_de_sejour,
        prix_tot = p_prix_tot,
        delai = p_delai,
        etat_devis = p_etat_devis,
        heure_arriv = p_heure_arriv,
        heure_depart = p_heure_depart,
        id_client_devis = p_id_client_devis
    WHERE ref_devis = p_ref_devis;
END;
$$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION update_reservation(
    p_id_reserv INTEGER,
    p_id_logement_reserv INTEGER,
    p_confirm_reserv BOOLEAN,
    p_CGV_reserv BOOLEAN,
    p_mail_reserv VARCHAR(255),
    p_facture_reserv INTEGER,
    p_num_carte INTEGER,
    p_date_carte DATE,
    p_crypt_carte INTEGER,
    p_annul_strict_reserv BOOLEAN,
    p_annul_flex_reserv BOOLEAN,
    p_annul_NRembours_reserv BOOLEAN,
    p_facture_davoir_reserv INTEGER
) RETURNS VOID AS
$$
BEGIN
    UPDATE Reservation
    SET
        id_logement_reserv = p_id_logement_reserv,
        confirm_reserv = p_confirm_reserv,
        CGV_reserv = p_CGV_reserv,
        mail_reserv = p_mail_reserv,
        facture_reserv = p_facture_reserv,
        num_carte = p_num_carte,
        date_carte = p_date_carte,
        crypt_carte = p_crypt_carte,
        annul_strict_reserv = p_annul_strict_reserv,
        annul_flex_reserv = p_annul_flex_reserv,
        annul_NRembours_reserv = p_annul_NRembours_reserv,
        facture_davoir_reserv = p_facture_davoir_reserv
    WHERE id_reserv = p_id_reserv;
END;
$$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION update_avis(
    p_id_avis INTEGER,
    p_note_avis INTEGER,
    p_com_avis VARCHAR(400),
    p_id_reserv_avis INTEGER
) RETURNS VOID AS
$$
BEGIN
    UPDATE Avis
    SET
        note_avis = p_note_avis,
        com_avis = p_com_avis,
        id_reserv_avis = p_id_reserv_avis
    WHERE id_avis = p_id_avis;
END;
$$
LANGUAGE 'plpgsql';


CREATE OR REPLACE FUNCTION update_logement(
    p_id_logement INTEGER,
    p_libelle_logement VARCHAR(50),
    p_accroche_logement VARCHAR(130),
    p_descritpif_logement VARCHAR(1200),
    p_nb_personne_max INTEGER,
    p_longitude_logement DECIMAL,
    p_latitude_logement DECIMAL,
    p_adresse_logement VARCHAR(255),
    p_code_postal_logement INTEGER,
    p_ville_logement VARCHAR(255),
    p_nature_logement VARCHAR(30),
    p_type_logement VARCHAR(30),
    p_surface_habitable_logement DECIMAL,
    p_nb_chambre_logement INTEGER,
    p_nb_lit_total INTEGER,
    p_nb_salle_de_bain_logement INTEGER,
    p_amenagement_propose_logement VARCHAR(30),
    p_installation_offerte_logement VARCHAR(30),
    p_equipement_propose_logement VARCHAR(30),
    p_service_complementaire_logement VARCHAR(30),
    p_charge_additionnel_prix DECIMAL[],
    p_charge_additionnel_libelle VARCHAR(30)[],
    p_photo_couverture_logement VARCHAR(30),
    p_photo_complementaire_logement VARCHAR(30),
    p_moyenne_avis_logement DECIMAL,
    p_prix_logement DECIMAL,
    p_en_ligne BOOLEAN,
    p_id_proprio_logement INTEGER
) RETURNS VOID AS
$$
BEGIN
    UPDATE Logement
    SET
        libelle_logement = p_libelle_logement,
        accroche_logement = p_accroche_logement,
        descritpif_logement = p_descritpif_logement,
        nb_personne_max = p_nb_personne_max,
        longitude_logement = p_longitude_logement,
        latitude_logement = p_latitude_logement,
        adresse_logement = p_adresse_logement,
        code_postal_logement = p_code_postal_logement,
        ville_logement = p_ville_logement,
        nature_logement = p_nature_logement,
        type_logement = p_type_logement,
        surface_habitable_logement = p_surface_habitable_logement,
        nb_chambre_logement = p_nb_chambre_logement,
        nb_lit_total = p_nb_lit_total,
        nb_salle_de_bain_logement = p_nb_salle_de_bain_logement,
        amenagement_propose_logement = p_amenagement_propose_logement,
        installation_offerte_logement = p_installation_offerte_logement,
        equipement_propose_logement = p_equipement_propose_logement,
        service_complementaire_logement = p_service_complementaire_logement,
        charge_additionnel_prix = p_charge_additionnel_prix,
        charge_additionnel_libelle = p_charge_additionnel_libelle,
        photo_couverture_logement = p_photo_couverture_logement,
        photo_complementaire_logement = p_photo_complementaire_logement,
        moyenne_avis_logement = p_moyenne_avis_logement,
        prix_logement = p_prix_logement,
        en_ligne = p_en_ligne,
        id_proprio_logement = p_id_proprio_logement
    WHERE id_logement = p_id_logement;
END;
$$
LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION update_chambre(
    p_id_chambre INTEGER,
    p_nb_lit_simple INTEGER,
    p_nb_lit_double INTEGER,
    p_details_lit VARCHAR(255),
    p_id_logement INTEGER
) RETURNS VOID AS
$$
BEGIN
    UPDATE Chambre
    SET
        nb_lit_simple = p_nb_lit_simple,
        nb_lit_double = p_nb_lit_double,
        details_lit = p_details_lit,
        id_logement = p_id_logement
    WHERE
        id_chambre = p_id_chambre;
END;
$$
LANGUAGE 'plpgsql';



CREATE OR REPLACE FUNCTION update_calendrier(
    p_statut_propriete BOOLEAN,
    p_plage_disponibilite DATE,
    p_plage_indisponibilite DATE,
    p_tarif_journalier_location FLOAT,
    p_duree_min_location INTEGER,
    p_delai_res_arrivee INTEGER,
    p_contrainte_arrivee VARCHAR(255),
    p_contrainte_depart VARCHAR(255),
    p_id_reserv INTEGER,
    p_id_logement INTEGER
) RETURNS VOID AS
$$
BEGIN
    UPDATE Calendrier
    SET
        statut_propriete = p_statut_propriete,
        plage_disponibilite = p_plage_disponibilite,
        plage_indisponibilite = p_plage_indisponibilite,
        tarif_journalier_location = p_tarif_journalier_location,
        duree_min_location = p_duree_min_location,
        delai_res_arrivee = p_delai_res_arrivee,
        contrainte_arrivee = p_contrainte_arrivee,
        contrainte_depart = p_contrainte_depart,
        id_reserv = p_id_reserv,
        id_logement = p_id_logement
    WHERE id_reserv = p_id_reserv AND id_logement = p_id_logement;
END;
$$
LANGUAGE 'plpgsql';

CREATE OR REPLACE FUNCTION update_message(
    p_id_expediteur INTEGER,
    p_id_destinataire INTEGER,
    p_message VARCHAR(400),
    p_date_envoi DATE,
    p_heure_envoi TIME
) RETURNS VOID AS
$$
BEGIN
    UPDATE Messagerie
    SET
        message = p_message,
        date_envoi = p_date_envoi,
        heure_envoi = p_heure_envoi
    WHERE id_expediteur = p_id_expediteur AND id_destinataire = p_id_destinataire;
END;
$$
LANGUAGE 'plpgsql';
