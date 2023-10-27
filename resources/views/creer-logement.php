
<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="utf-8" />
<title>Créer mon logement</title>
<meta name="créer logement" content=""/>
<meta name="keywords" content="AlHaizBreizh"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="./assets/IMG/logo.png">
<link rel="stylesheet" href="./assets/CSS/creer-logement.css">
<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="script.js"></script>
</head>


<body>
    <header>
        <div>
            <img class="img_header1" src="./assets/IMG/header_logo.png">
            <img class="img_header2" src="./assets/IMG/profil.png">
        </div>    
        <hr>
    </header>
<main>
    <?php
            $id_l = $dbh->prepare("SELECT id_logement FROM sae.logement");
            $id_l->execute();
            
            $i = 0; 
        
            while ($row = $id_l->fetch(PDO::FETCH_ASSOC)) {
                $i++;
            }
        
            if ($i > 0) {

            } else {
                $id_logement  = $i++;
            }
    
    
    ?>
    <section class="p-top">
        <h1>Dites nous tout sur votre logement !</h1>
    </section>
<section class="part1">
<form action="creer-logement-suite.php" method="POST">
    <div>    
        <section class="p1">
            <div class='p1-1'>
                <div class="abc">
                    <div class='p1-1-nom'><h3>De quelle nature est votre logement ?* </h3><p title="obligatoire">* Veuillez selectionner une nature de logement</p></div>
                    <div>
                        <button id="btn1" name="maison" type="button"><img src="./assets/IMG/maison.svg"><p>Maison</p></button>
                        <button id="btn2" name="appartement" type="button"><img class="appart" src="./assets/IMG/appartement.svg"><p>Appartement</p></button>
                    </div>
                    <div>
                        <button id="btn3" name="villa" type="button"><img src="./assets/IMG/villa.png"><p>Villa d'exception</p></button>
                        <button id="btn4" name="bateau" type="button"><img src="./assets/IMG/bateau.png"><p>Bateau</p></button>
                    </div>           
                 <input type="hidden" id="nature_logement" name="nature_logement" />

                </div>
            </div>
            <?php
                if(isset($_POST["nature_logement"])){
                    $nature_logement = $_POST["nature_logement"];
                }
            ?>
            <div class='p1-2'>
                <div class="abc">
                    <div class='p1-2-nom'><h3>Décrivez-nous votre logement * </h3><p title="obligatoire">* Tous les champs sont obligatoires et doivent être remplis</p></div>
                    <div class='champ1'><textarea name="description"  placeholder="Saisissez la description du logement"></textarea></div>      
                </div>
            </div>
            <?php
                if(isset($_POST["description"])){
                    $descritpif_logement = $_POST["description"];
                }
            ?>
            <div class="p1-3">
                <div class="abc">
                    <section class="p1-3-1">
                        <p>Surface habitable : </p>
                        <p>Nombre de personnes max : </p>
                        <p>Nombre de chambre(s) : </p>    
                        <p>Nombre de salle de bain : </p>      
                    </section>
                    <section class="p1-3-2">    
                        <input name='surface' value = '' type='number'>
                        <input name='nb_p_max' value = '' type='number'>
                        <input name='nb_chambre' value = '' type='number'>
                        <input name='sdb' value = '' type='number'>
                    </section>    
                </div>
            </div>
            <?php
                if(isset($_POST["surface"])){
                    $surface_habitable_logement = $_POST["surface"];
                }
                if(isset($_POST["nb_p_max"])){
                    $nb_personne_max = $_POST["nb_p_max"];
                }
                if(isset($_POST["nb_chambre"])){
                    $nb_chambre_logement = $_POST["nb_chambre"];
                }
                if(isset($_POST["sdb"])){
                    $nb_salle_de_bain_logement = $_POST["sdb"];
                }
            ?>
            <div class='p1-4'>
                <div class="abc">
                    <div class='p1-4-nom'><h3>De quels aménagements propose votre logement ?* </h3><p title="obligatoire">* Veuillez selectionner au moins un aménagement de logement</p></div>
                    <div>
                        <div>
                            <button id="btn5" name="terrasse" onclick="toggleButton(this)" type="button"><img src="./assets/IMG/terrasse.svg"><p>Terrasse</p></button>
                            <button id="btn6" name="jardin" onclick="toggleButton(this)" type="button"><img src="./assets/IMG/jardin.svg"><p>Jardin</p></button>
                        </div>
                        <div>
                            <button id="btn7" name="balcon" onclick="toggleButton(this)" type="button"><img src="./assets/IMG/balcon.svg"><p>Balcon</p></button>
                            <button id="btn8" name="parking prive" onclick="toggleButton(this)" type="button"><img src="./assets/IMG/parking_p.svg"><p>Parking privé</p></button>
                        </div>
                        <div class="boutonbas">
                            <button id="btn9" name="parking public" onclick="toggleButton(this)" type="button"><img src="./assets/IMG/parking.svg"><p>Parking public</p></button>
                        </div>
                        <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_ame' placeholder="Parking, Jardin, ..." value = '' type='text'>
                   </div>
                   <input type="hidden" id="amenagement_logement" name="amenagement_logement" />
                </div>
            </div>
            <?php
                if(isset($_POST["amenagement_logement"])){
                    $amenagement_propose_logement = $_POST["amenagement_logement"] + ",". $_POST["autre_ame"];
                }
            ?>
            <div class='p1-5'>
                <div class="abc">
                    <div class='p1-5-nom'><h3>De quelles installations propose votre logement ?*</h3><p title="obligatoire">* Veuillez selectionner au moins une installation de logement</p></div>
                    <div>
                        <div>
                            <button id="btn10" name="jacuzzi" onclick="toggleButton2(this)" type="button"><img src="./assets/IMG/jacuzzi.svg"><p>Jacuzzi</p></button>
                            <button id="btn11" name="sauna" onclick="toggleButton2(this)" type="button"><img src="./assets/IMG/sauna.svg"><p>Sauna</p></button>
                        </div>
                        <div>
                            <button id="btn12" name="piscine" onclick="toggleButton2(this)" type="button"><img src="./assets/IMG/piscine.svg"><p>Piscine</p></button>
                            <button id="btn13" name="climatisation" onclick="toggleButton2(this)" type="button"><img src="./assets/IMG/climatisation.svg"><p>Climatisation</p></button>
                        </div>
                        <div class="boutonbas">
                            <button id="btn14" name="hammam" onclick="toggleButton2(this)" type="button"><img src="./assets/IMG/hammam.png"><p>Hammam</p></button>
                        </div>
                        <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_inst' placeholder="Sauna, Climatisation..." value = '' type='text'>
                    </div>
                    <input type="hidden" id="installation_logement" name="installation_logement" />
                </div>
            </div>
            <?php
                if(isset($_POST["installation_logement"])){
                    $installation_offerte_logement = $_POST["installation_logement"] + ",". $_POST["autre_inst"];
                }
            ?>
            <div class='p1-6'>
                <div class="abc">
                    <div class='p1-6-nom'><h3>Quelles sont les charges additionnelles que vous souhaitez proposer ?</h3></div>
                    <div>
                        <button id="btn15" name="menage" onclick="toggleButton3(this)" type="button"><img src="./assets/IMG/menage.svg"><p>Ménage</p></button>
                        <button id="btn16" name="animaux" onclick="toggleButton3(this)" type="button"><img src="./assets/IMG/animaux.svg"><p>Animaux</p></button>
                    </div>
                    <div>
                        <button id="btn17" name="taxe" onclick="toggleButton3(this)" type="button"><img src="./assets/IMG/taxe.svg"><p>Taxe</p></button>
                        <button id="btn18" name="personne supplémentaire"  onclick="toggleButton3(this)" type="button"><img src="./assets/IMG/personne_sup.svg"><p>Personne supplémentaire</p></button>
                    </div>
                    <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_charge' placeholder="Animaux, Taxe..." value = '' type='text'>
                </div>
                <input type="hidden" id="charge" name="charge" />
            </div>
            <?php
                if(isset($_POST["charge"])){
                    $charge_additionnel_libelle = $_POST["charge"] + ",".$_POST["autre_charge"]." ";
                }
            ?>
            <div class='p1-7'>
                <div class="abc">
                    <div class='p1-7-nom'><h3>Vous-voulez faire payer par paypal ?</h3></div>
                    <div>
                            <button id="btn19" name="btn_paypal" type="button"><img src=""></button>
                            <label>Paypal :</label><input style="width:380px; margin-left:15px;" name='lien_paypal' placeholder="Lien Paypal" value = '' type='text'>
                        </div>
                </div>
            </div>
            <?php
            if(isset($_POST["btn_paypal"])){
                if(isset($_POST["lien_paypal"])){
                    $lien_paypal = $_POST["lien_paypal"];
                }
            }   
            ?>
            <div class='p1-8'>
                <div class="abc">
                    <div class='p1-8-nom'><h3>Quelle sera la photo de couverture de votre logement ?*</h3><p title="obligatoire">* Veuillez insérer au moins une photo de couverture pour votre logement</p></div>
                        <div class="import_image">
                            <label>Insérer une photo :</label><div><input id="btn40" name="image_1" type="file"><img src="./assets/IMG/Download.png"></input>

                        </div>
                    </div>             
                </div>
                <?php
                    if(isset($_POST["image_1"])){
                        $image1 = $_POST["image_1"];
                    }   
                    ?>
            </div>
        </section>
        <section class="p2">
            <div class="p2-1">
                <div class="abc">
                    <div class='p2-1-nom'><h3>Ou se situe votre logement ?*</h3><p title="obligatoire">* Veuillez insérer au moins une photo de couverture pour votre logement</p></div>
                    <section class="p2-1-1">   
                        <div><img src="./assets/IMG/location.png"><input style="width:550px; margin-left:15px;" name='adresse' placeholder="Saisissez votre adresse" value = '' type='text'></div>
                        <div><img src="./assets/IMG/bat.png"><input style="width:550px; margin-left:15px;" name='ville' placeholder="Saisissez votre ville" value = '' type='text'></div>
                        <div><img src="./assets/IMG/enveloppe.png"><input style="width:150px; margin-left:15px;" name='cp' placeholder="Code postal" value = '' type='number'></div> 
                    </section>    
                    <section class="p2-1-2">
                        <div><img src="./assets/IMG/longitude.png"><input style="width:150px; margin-left:15px;" name='longitude' placeholder="Longitude" value = '' type='number'></div>
                        <div><img src="./assets/IMG/latitude.png"><input style="width:150px; margin-left:15px;" name='latitude' placeholder="Latitude" value = '' type='number'></div>
                    </section>  
                </div>
            </div>
            <?php
                if(isset($_POST["adresse"])){
                    $adresse_logement = $_POST["adresse"];
                }
                if(isset($_POST["ville"])){
                    $ville_logement = $_POST["ville"];
                }
                if(isset($_POST["cp"])){
                    $code_postal_logement = $_POST["cp"];
                }
                if(isset($_POST["longitude"])){
                    $longitude_logement = $_POST["longitude"];
                }
                if(isset($_POST["latitude"])){
                    $latitude_logement = $_POST["latitude"];
                }
            ?>
            <div class='p2-2'>
                <div class="abc">
                    <div class='p2-2-nom'><h3>De quel type est votre logement ?*</h3><p title="obligatoire">* Veuillez sélectionner un  type de logement (pour en savoir plus, <a href="">cliquez ici</a>)</p></div>
                    <div>
                        <button id="btn21" name="T1" type="button"><img src="./assets/IMG/sofa1.png"><p>T1</p></button>
                        <button id="btn22" name="T2" type="button"><img src="./assets/IMG/sofa2.png"><p>T2</p></button>
                    </div>
                    <div>
                        <button id="btn23" name="T3" type="button"><img src="./assets/IMG/sofa3.png"><p>T3</p></button>
                        <button id="btn24" name="T4" type="button"><img src="./assets/IMG/chair1.svg"><p>T4</p></button>
                    </div>
                    <div>
                        <button id="btn25" name="T5" type="button"><img src="./assets/IMG/chair2.svg"><p>T5</p></button>
                        <button id="btn26" name="studio" type="button"><img src="./assets/IMG/chair3.svg"><p>Studio</p></button>
                    </div>
                    <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_type' placeholder="Triplex..." value = '' type='text'>
                </div>
                <input type="hidden" id="type_logement" name="type_logement" />
            </div>
            <?php
                if(isset($_POST["type_logement"])){
                    $type_logement = $_POST["type_logement"] ;
                }
                if(isset($_POST["autre_type"])){
                    $type_logement = $_POST["autre_type"] ;
                }
            ?>
            <div class="p2-3">
                <div class="abc">
                    <div class='p2-3-nom'><h3>Quel sera le titre de votre logement ?*</h3><p title="obligatoire">* Tous les champs sont obligatoires et doivent être remplis</p></div>
                        <section class="p2-1-1">   
                            <div style="width:650px"><input style="width:600px; margin-left:15px;" name='libelle' placeholder="Saisissez le libellé du logement" value = '' type='text'></div>
                            <div style="width:650px"><input style="width:600px; margin-left:15px;" name='accroche' value = '' placeholder="Saisissez l'accroche du logement" type='text'></div>
                        </section>     
                </div>
            </div>
            <?php
                if(isset($_POST["libelle"])){
                    $libelle_logement = $_POST["libelle"];
                }
                if(isset($_POST["accroche"])){
                    $accroche_logement = $_POST["accroche"];
                }
            ?>
            <div class='p2-4'>
                <div class="abc">
                    <div class='p2-4-nom'><h3>Quels équipements propose votre logement ?*</h3><p title="obligatoire">* Veuillez sélectionner au moins un équipement de logement</p></div>
                    <div>
                        <div>
                            <button id="btn27" name="wifi" onclick="toggleButton4(this)" type="button"><img src="./assets/IMG/wifi.svg"><p>Wifi</p></button>
                            <button id="btn28" name="tv" onclick="toggleButton4(this)" type="button"><img src="./assets/IMG/tv.svg"><p>Télévision</p></button>
                        </div>
                        <div>
                            <button id="btn29" name="cuisine" onclick="toggleButton4(this)" type="button"><img src="./assets/IMG/cuisine.svg"><p>Cuisine</p></button>
                            <button id="btn30" name="lave-linge" onclick="toggleButton4(this)" type="button"><img src="./assets/IMG/lave_linge.svg"><p>Lave-linge</p></button>
                        </div>
                        <div class="boutonbas">
                            <button id="btn31" name="lave-vaisselle" onclick="toggleButton4(this)" type="button"><img src="./assets/IMG/lave_vaisselle.svg"><p>Lave-vaisselle</p></button>
                        </div>
                        <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_equip' placeholder="Wifi, Cuisine..." value = '' type='text'>       
                    </div>
                    <input type="hidden" id="equipement" name="equipement" />
                </div>
            </div>
            <?php

                if(isset($_POST["equipement"])){
                    $equipement_propose_logement = $_POST["equipement"] + ",".$_POST["autre_equip"] ." ";
                }
            ?>
            <div class='p2-5'>
                <div class="abc">
                    <div class='p2-5-nom'><h3>De quels services propose votre logement ?*</h3><p title="obligatoire">* Veuillez sélectionner au moins un service de logement</p></div>
                    <div>    
                        <div>
                            <button id="btn32" name="menage" onclick="toggleButton5(this)" type="button"><img src="./assets/IMG/menage2.svg"><p>Ménage</p></button>
                            <button id="btn33" name="linge" onclick="toggleButton5(this)" type="button"><img src="./assets/IMG/linge.svg"><p>Linge</p></button>
                        </div>
                        <div class="boutonbas">
                            <button id="btn34" name="taxi" onclick="toggleButton5(this)" type="button"><img src="./assets/IMG/taxi.svg"><p>Taxi</p></button>
                        </div>
                    </div>
                    <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_service' placeholder="Taxi, Linge..." value = '' type='text'>
                </div>
                <input type="hidden" id="services" name="services" />
            </div>
            <?php

                if(isset($_POST["services"])){
                    $service_complementaire_logement = $_POST["services"] + $_POST["autre_service"];
                }
            ?>
            <div class='p2-6'>
                <div class="abc">
                    <div class='p2-6-nom'><h3>Quel sera le prix par nuit de votre logement ?*</h3><p title="obligatoire">* Veuillez renseigner le prix par nuit du logement</p></div>
                    <div><input name='prix' style="width:150px; margin-left:15px;" placeholder="Prix par nuit" value = '' type='number'>€</div>
                </div>
            </div>
            <?php
                if(isset($_POST["prix"])){
                    $prix_logement = $_POST["prix"];
                }
            ?>
            <div class='p2-7'>
                <div class="abc">
                    <div class='p2-7-nom'>
                        <h3>Quelle sera votre condition d'annulation ?*</h3>
                        <p style="width:600px" title="obligatoire">* Veuillez choisir une condition d'annulation du logement</p>
                    </div>
                    <div>
                        <button id="btn35" name="strictes" type="button"></button>
                        <label>Strictes :</label>
                        <p>Remboursement intégral pour les annulations effectuées dans les 48H suivant la réservation si la date d’arrivée intervient dans 14 jours ou plus. Remboursement à hauteur de 50% pour les annulations effectuées au moins 7 jours avant la date d’arrivée. Aucun remboursement pour les annulations effectuées dans les 7 jours précédant la date d’arrivée.</p>
                    </div>
                    <div>
                        <button id="btn36" name="flexible" type="button"></button>
                        <label>Flexible :</label>
                        <p>Remboursement intégral jusqu’à 3 jours avant la date d’arrivée</p>
                    </div>
                    <div>
                        <button id="btn37" name="non remboursable" type="button"></button>
                        <label>Non-remboursable :</label>
                        <p>Un·e propriétaire peut offrir une option non remboursable : le·la client·e paie 10% de moins son séjour, mais en cas d’annulation, la totalité du versement sera conservée, quelque soit la date de cette annulation.</p>
                    </div>
                    <input type="hidden" id="condition_annulation" name="condition_annulation" />
                </div>
            </div>
            <?php
                if(isset($_POST["condition_annulation"])){
                    $condition_annulation = $_POST[""];
                }
            ?>
            <div class='p2-8'>
                <div class="abc">
                    <div class='p2-8-nom'>
                        <h3>Quelles seront les photos de votre logement ?*</h3>
                        <p title="obligatoire">* Veuillez insérer au moins une photo pour votre logement</p>
                    </div>
                    <div class="import_image">
                        <label>Insérer une photo :</label>
                        <div>
                            <input id="btn38" name="image_2" type="file">
                                <img src="./assets/IMG/Download.png">
                            </input>
                        </div>
                    </div>
                    <div class="import_image">    
                        <label>Insérer une photo :</label>
                        <div>
                            <input id="btn39" name="image_3" type="file">
                                <img src="./assets/IMG/Download.png">
                            </input>
                        </div>
                    </div>
                    <div class="import_image">
                        <label>Insérer une photo :</label>
                        <div>
                            <input id="btn40" name="image_4" type="file">
                                <img src="./assets/IMG/Download.png">
                            </input>
                        </div>
                    </div>
                </div>
                <?php
                    if(isset($_POST["image_2"])){
                        $image2 = $_POST["image_2"];
                    }if(isset($_POST["image_3"])){
                        $image2 = $_POST["image_3"];
                    }if(isset($_POST["image_4"])){
                        $image2 = $_POST["image_4"];
                    }
                    ?>
            </div>
        </section>
    </div>        

    <button name="btn_validation" class="validation" type="submit">VALIDER</button>
    <?php
    
    if (isset($_POST["btn_validation"])) {
        $r = $dbh->prepare("INSERT INTO sae.logement(   id_logement,  
                                                        libelle_logement, 
                                                        accroche_logement, 
                                                        descritpif_logement, 
                                                        nb_personne_max, 
                                                        longitude_logement, 
                                                        latitude_logement, 
                                                        adresse_logement, 
                                                        code_postal_logement, 
                                                        ville_logement, 
                                                        nature_logement, 
                                                        type_logement, 
                                                        surface_habitable_logement, 
                                                        nb_chambre_logement, 
                                                        nb_salle_de_bain_logement, 
                                                        amenagement_propose_logement, 
                                                        installation_offerte_logement, 
                                                        equipement_propose_logement, 
                                                        service_complementaire_logement, 
                                                        charge_additionnel_libelle, 
                                                        photo_couverture_logement, 
                                                        photo_complementaire_logement, 
                                                        prix_logement)
                            VALUES (".$id_logement.",".$libelle_logement.",".$accroche_logement.",".$descritpif_logement."".$nb_personne_max.",".$longitude_logement.",".$latitude_logement.",".$adresse_logement.",".$code_postal_logement.",".$ville_logement.",".$nature_logement.",".$type_logement.",".$surface_habitable_logement.",".$nb_chambre_logement.",".$nb_salle_de_bain_logement.",".$amenagement_propose_logement.",".$installation_offerte_logement.",".$equipement_propose_logement.",".$service_complementaire_logement.",".$charge_additionnel_libelle.",".$image_1.",".$image_2.",".$prix_logement.")");
        $r->execute();
    }
    ?>
    </form>
</section> 
</main>
<script src="./assets/JS/script.js"></script>
<footer>
<div class="progress-container">
    <div class="progress-bar" id="myBar"></div>
</div>
</footer>
</body>
</html>
