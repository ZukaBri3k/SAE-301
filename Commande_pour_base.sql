/***********************
Exemple de commande pour Insérer
***********************/


SELECT SAE.insert_nouvelle_personne(
    'M.', 'Cristiano', 'Ronaldo', '0756453423', 'jean.dupont@email.com', 'Paris', 75001, '123 Rue de la Liberté', 'France', 'monmotdepasse', 'jdupont', 'avatar.jpg', 30, '0', /*role client*/
    'FR1234567890', FALSE
);


SELECT SAE.insert_nouvelle_personne(
    'M.', 'fdfds', 'dsfdsffff', '0756453423', 'testpropriétaire.ddd@gmail.com', 'Paris', 75000, '123 Rue de Paris', 'France',
    'motdepasse', 'jdupont', 'photo.jpg', 30, '1'/*role proprio*/, '3333-0000-1111-2222', false
);


SELECT SAE.insere_devis(
    4, /* ID du client */
    2, /* ID du logement */
    4, /* Nombre de personnes */
    '2023-10-01'::date, /* Date de début */
    '2023-10-15'::date, /* Date de fin */
    '2023-09-20'::date, /* Date d'émission */
    '2023-09-30'::date, /* Date de validation */
    'Annulation standard', /* Motif d'annulation */
    500.00, /* Charges HT */
    1000.00, /* Frais de service HT */
    1200.00, /* Taxe de séjour */
    50, /* Délai de réservation (en jours) */
    true, /* État du devis */
    '12:00:00'::time, /* Heure d'arrivée */
    '14:00:00'::time /* Heure de départ */
);


SELECT SAE.insere_logement(
    'Bel appartement en bord de mer', 'Vue imprenable sur l''océan', 'Un appartement confortable pour des vacances de rêve',
    4, 45.123456, -122.987654, '123 Ocean Drive', 90210, 'Malibu', 'Appartement', 'Bord de mer', 80.5,
    2, 3, 2, 'Cuisine équipée', 'Parking gratuit', 'WiFi, TV, lave-linge', 'Navette aéroport',
    ARRAY[10, 5, 15], ARRAY['Électricité', 'Eau', 'Nettoyage'], 'photo_appart.jpg', 'photo_vue_mer.jpg',
    4.5, 200.00, true, 50 /*id du propriétaire*/
);

SELECT SAE.insere_chambre(
    2, 1, 'Chambre spacieuse avec un lit double et deux lits simples.', 1 /*id logement*/
);

SELECT SAE.insere_message(
    1/*id expediteur*/, 2/*id destinataire*/, 'Bonjour, comment ça va ?', '2023-10-17', '14:30:00'
);

SELECT SAE.insere_reservation(
    1 /*id du logement*/, 1/*id du devis*/, true, true, 'johndoe@email.com', 1234, '2023-10-17', 567, false, true, false, null
);

SELECT SAE.insere_avis(
    5, 'Excellent séjour, je recommande cet endroit !', 2/*id de la réservation*/
);

SELECT SAE.insere_calendrier(
    true, '2023-10-17', '2023-10-24', 100.0, 7, 2, 'Arrivée après 14h', 'Départ avant 11h', 2/*id réservation*/, 1
);


/***********************
Exemple de commande pour Update
***********************/

SELECT SAE.update_personne(
    1/*id de la personne*/, 'Mme', 'Doe', 'Jane', '0123456789', 'jane.doe@email.com', 'Paris', 75001, '123 Main St', 'newpassword', 'jane_doe', 'avatar.jpg', 30, '2222-1111-0000-8888', false
);

SELECT SAE.update_devis(
    1/*id du devis*/, 3, '2023-10-17', '2023-10-24', '2023-10-16', '2023-10-20', 'Annulation', 250.0, 800.0, 920.0, 100.0, 115.0, 30.0, 920.0, 14, true, '14:00:00', '11:00:00', 1/*id du client du devis*/
);

SELECT SAE.update_reservation(
    3/*id de la réservation*/, 1/*id du logement*/, true, true, 'nouveau@email.com', 2/*id du devis*/, 123456789, '2023-10-20', 123, true, false, false, 1/*id du devis le même que pour la l'id de la facture*/
);

SELECT SAE.update_avis(
    2/*id de l'avis*/, 4, 'Excellent séjour!', 2/*id de la reservation*/
);

SELECT SAE.update_logement(
    1/*id logement*/, 'Nouveau Logement', 'Superbe vue', 'Description mise à jour', 6, 45.123, -72.456, '123 Main St', 12345, 'Ville Nouvelle', 'Appartement', 'Studio', 500.0, 1, 3, 2, 'Piscine', 'Wi-Fi', 'TV', 'Petit-déjeuner inclus', '{10.0, 5.0}', '{"Électricité", "Eau"}', 'image.jpg', 'image2.jpg', 4.5, 100.0, true, 2/*id du propriétaire du logement*/
);

SELECT SAE.update_chambre(
    1/*id de la chambre*/, 3, 2, 'Chambre rénovée avec un lit double et trois lits simples.', 1/*id du logement*/
);


SELECT SAE.update_calendrier(
    true, '2023-10-20', '2023-10-30', 150.0, 2, 3, 'Arrivée après 14h', 'Départ avant 10h', 6/*id de la reservation*/, 1/*id du logement*/
);

SELECT SAE.update_message(
    1/*id expediteur*/, 2/*id destinataire*/, 'Nouveau message', '2023-10-20', '15:30:00'
);
