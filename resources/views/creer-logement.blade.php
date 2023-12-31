
<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="utf-8" />
<title>Créer mon logement</title>
<meta name="créer logement" content=""/>
<meta name="keywords" content="AlHaizBreizh"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="16x16" href="./assets/IMG/logo.png">
<link rel="stylesheet" href="{{asset ('css/style_logement.css')}}">
<!DOCTYPE html>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{asset ('js/script_logement.css')}}"></script>
</head>


<body>
    <header>
        <x-Navbar></x-Navbar>
    </header>
<main>
    <section class="p-top">
        <h1>Dites nous tout sur votre logement !</h1>
    </section>
<section class="part1">
<form action="{{route ('myProprietaireAccount')}}" method="POST">
    <div>    
        <section class="p1">
            <div class='p1-1'>
                <div class="abc">
                    <div class='p1-1-nom'><h3>De quelle nature est votre logement ?* </h3><p title="obligatoire">* Veuillez selectionner une nature de logement</p></div>
                    <div>
                        <button id="btn1" name="maison" type="button"><img src="{{asset ('img/maison.svg')}}"><p>Maison</p></button>
                        <button id="btn2" name="appartement" type="button"><img class="appart" src="{{asset ('img/appartement.svg')}}"><p>Appartement</p></button>
                    </div>
                    <div>
                        <button id="btn3" name="villa" type="button"><img src="{{asset ('img/villa.png')}}"><p>Villa d'exception</p></button>
                        <button id="btn4" name="bateau" type="button"><img src="{{asset ('img/bateau.png')}}bateau.png"><p>Bateau</p></button>
                    </div>           
                 <input type="hidden" id="nature_logement" name="nature_logement" />

                </div>
            </div>
            <div class='p1-2'>
                <div class="abc">
                    <div class='p1-2-nom'><h3>Décrivez-nous votre logement * </h3><p title="obligatoire">* Tous les champs sont obligatoires et doivent être remplis</p></div>
                    <div class='champ1'><textarea name="description"  placeholder="Saisissez la description du logement"></textarea></div>      
                </div>
            </div>
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
            <div class='p1-4'>
                <div class="abc">
                    <div class='p1-4-nom'><h3>De quels aménagements propose votre logement ?* </h3><p title="obligatoire">* Veuillez selectionner au moins un aménagement de logement</p></div>
                    <div>
                        <div>
                            <button id="btn5" name="terrasse" onclick="toggleButton(this)" type="button"><img src="{{asset ('img/terrasse.svg')}}"><p>Terrasse</p></button>
                            <button id="btn6" name="jardin" onclick="toggleButton(this)" type="button"><img src="{{asset ('img/jardin.svg')}}"><p>Jardin</p></button>
                        </div>
                        <div>
                            <button id="btn7" name="balcon" onclick="toggleButton(this)" type="button"><img src="{{asset ('img/balcon.svg')}}"><p>Balcon</p></button>
                            <button id="btn8" name="parking prive" onclick="toggleButton(this)" type="button"><img src="{{asset ('img/parking_p.svg')}}"><p>Parking privé</p></button>
                        </div>
                        <div class="boutonbas">
                            <button id="btn9" name="parking public" onclick="toggleButton(this)" type="button"><img src="{{asset ('img/parking.svg')}}"><p>Parking public</p></button>
                        </div>
                        <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_ame' placeholder="Parking, Jardin, ..." value = '' type='text'>
                   </div>
                   <input type="hidden" id="amenagement_logement" name="amenagement_logement" />
                </div>
            </div>
            <div class='p1-5'>
                <div class="abc">
                    <div class='p1-5-nom'><h3>De quelles installations propose votre logement ?*</h3><p title="obligatoire">* Veuillez selectionner au moins une installation de logement</p></div>
                    <div>
                        <div>
                            <button id="btn10" name="jacuzzi" onclick="toggleButton2(this)" type="button"><img src="{{asset ('img/jacuzzi.svg')}}"><p>Jacuzzi</p></button>
                            <button id="btn11" name="sauna" onclick="toggleButton2(this)" type="button"><img src="{{asset ('img/sauna.svg')}}"><p>Sauna</p></button>
                        </div>
                        <div>
                            <button id="btn12" name="piscine" onclick="toggleButton2(this)" type="button"><img src="{{asset ('img/piscine.svg')}}"><p>Piscine</p></button>
                            <button id="btn13" name="climatisation" onclick="toggleButton2(this)" type="button"><img src="{{asset ('img/climatisation.svg')}}"><p>Climatisation</p></button>
                        </div>
                        <div class="boutonbas">
                            <button id="btn14" name="hammam" onclick="toggleButton2(this)" type="button"><img src="{{asset ('img/hammam.png')}}"><p>Hammam</p></button>
                        </div>
                        <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_inst' placeholder="Sauna, Climatisation..." value = '' type='text'>
                    </div>
                    <input type="hidden" id="installation_logement" name="installation_logement" />
                </div>
            </div>
            <div class='p1-6'>
                <div class="abc">
                    <div class='p1-6-nom'><h3>Quelles sont les charges additionnelles que vous souhaitez proposer ?</h3></div>
                    <div>
                        <button id="btn15" name="menage" onclick="toggleButton3(this)" type="button"><img src="{{asset ('img/menage.svg')}}"><p>Ménage</p></button>
                        <button id="btn16" name="animaux" onclick="toggleButton3(this)" type="button"><img src="{{asset ('img/animaux.svg')}}"><p>Animaux</p></button>
                    </div>
                    <div>
                        <button id="btn17" name="taxe" onclick="toggleButton3(this)" type="button"><img src="{{asset ('img/taxe.svg')}}"><p>Taxe</p></button>
                        <button id="btn18" name="personne supplémentaire"  onclick="toggleButton3(this)" type="button"><img src="{{asset ('img/personne_sup.svg')}}"><p>Personne supplémentaire</p></button>
                    </div>
                    <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_charge' placeholder="Animaux, Taxe..." value = '' type='text'>
                </div>
                <input type="hidden" id="charge" name="charge" />
            </div>
            <div class='p1-7'>
                <div class="abc">
                    <div class='p1-7-nom'><h3>Vous-voulez faire payer par paypal ?</h3></div>
                    <div>
                            <button id="btn19" name="btn_paypal" type="button"><img src=""></button>
                            <label>Paypal :</label><input style="width:380px; margin-left:15px;" name='lien_paypal' placeholder="Lien Paypal" value = '' type='text'>
                        </div>
                </div>
            </div>
            <div class='p1-8'>
                <div class="abc">
                    <div class='p1-8-nom'><h3>Quelle sera la photo de couverture de votre logement ?*</h3><p title="obligatoire">* Veuillez insérer au moins une photo de couverture pour votre logement</p></div>
                        <div class="import_image">
                            <label>Insérer une photo :</label><div><input id="btn40" name="image_1" type="file"><img src="{{asset ('img/Download.png')}}"></input>

                        </div>
                    </div>             
                </div>
            </div>
        </section>
        <section class="p2">
            <div class="p2-1">
                <div class="abc">
                    <div class='p2-1-nom'><h3>Ou se situe votre logement ?*</h3><p title="obligatoire">* Veuillez insérer au moins une photo de couverture pour votre logement</p></div>
                    <section class="p2-1-1">   
                        <div><img src="{{asset ('img/location.png')}}"><input style="width:550px; margin-left:15px;" name='adresse' placeholder="Saisissez votre adresse" value = '' type='text'></div>
                        <div><img src="{{asset ('img/bat.png')}}"><input style="width:550px; margin-left:15px;" name='ville' placeholder="Saisissez votre ville" value = '' type='text'></div>
                        <div><img src="{{asset ('img/enveloppe.png')}}"><input style="width:150px; margin-left:15px;" name='cp' placeholder="Code postal" value = '' type='number'></div> 
                    </section>    
                    <section class="p2-1-2">
                        <div><img src="{{asset ('img/longitude.png')}}"><input style="width:150px; margin-left:15px;" name='longitude' placeholder="Longitude" value = '' type='number'></div>
                        <div><img src="{{asset ('img/latitude.png')}}"><input style="width:150px; margin-left:15px;" name='latitude' placeholder="Latitude" value = '' type='number'></div>
                    </section>  
                </div>
            </div>
            <div class='p2-2'>
                <div class="abc">
                    <div class='p2-2-nom'><h3>De quel type est votre logement ?*</h3><p title="obligatoire">* Veuillez sélectionner un  type de logement (pour en savoir plus, <a href="">cliquez ici</a>)</p></div>
                    <div>
                        <button id="btn21" name="T1" type="button"><img src="{{asset ('img/sofa1.png')}}"><p>T1</p></button>
                        <button id="btn22" name="T2" type="button"><img src="{{asset ('img/sofa2.png')}}"><p>T2</p></button>
                    </div>
                    <div>
                        <button id="btn23" name="T3" type="button"><img src="{{asset ('img/sofa3.png')}}"><p>T3</p></button>
                        <button id="btn24" name="T4" type="button"><img src="{{asset ('img/chair1.svg')}}"><p>T4</p></button>
                    </div>
                    <div>
                        <button id="btn25" name="T5" type="button"><img src="{{asset ('img/chair2.svg')}}"><p>T5</p></button>
                        <button id="btn26" name="studio" type="button"><img src="{{asset ('img/chair3.svg')}}"><p>Studio</p></button>
                    </div>
                    <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_type' placeholder="Triplex..." value = '' type='text'>
                </div>
                <input type="hidden" id="type_logement" name="type_logement" />
            </div>
            <div class="p2-3">
                <div class="abc">
                    <div class='p2-3-nom'><h3>Quel sera le titre de votre logement ?*</h3><p title="obligatoire">* Tous les champs sont obligatoires et doivent être remplis</p></div>
                        <section class="p2-1-1">   
                            <div style="width:650px"><input style="width:600px; margin-left:15px;" name='libelle' placeholder="Saisissez le libellé du logement" value = '' type='text'></div>
                            <div style="width:650px"><input style="width:600px; margin-left:15px;" name='accroche' value = '' placeholder="Saisissez l'accroche du logement" type='text'></div>
                        </section>     
                </div>
            </div>
            <div class='p2-4'>
                <div class="abc">
                    <div class='p2-4-nom'><h3>Quels équipements propose votre logement ?*</h3><p title="obligatoire">* Veuillez sélectionner au moins un équipement de logement</p></div>
                    <div>
                        <div>
                            <button id="btn27" name="wifi" onclick="toggleButton4(this)" type="button"><img src="{{asset ('img/wifi.svg')}}"><p>Wifi</p></button>
                            <button id="btn28" name="tv" onclick="toggleButton4(this)" type="button"><img src="{{asset ('img/tv.svg')}}"><p>Télévision</p></button>
                        </div>
                        <div>
                            <button id="btn29" name="cuisine" onclick="toggleButton4(this)" type="button"><img src="{{asset ('img/cuisine.svg')}}"><p>Cuisine</p></button>
                            <button id="btn30" name="lave-linge" onclick="toggleButton4(this)" type="button"><img src="{{asset ('img/lave_linge.svg')}}"><p>Lave-linge</p></button>
                        </div>
                        <div class="boutonbas">
                            <button id="btn31" name="lave-vaisselle" onclick="toggleButton4(this)" type="button"><img src="{{asset ('img/lave_vaisselle.svg')}}"><p>Lave-vaisselle</p></button>
                        </div>
                        <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_equip' placeholder="Wifi, Cuisine..." value = '' type='text'>       
                    </div>
                    <input type="hidden" id="equipement" name="equipement" />
                </div>
            </div>
            <div class='p2-5'>
                <div class="abc">
                    <div class='p2-5-nom'><h3>De quels services propose votre logement ?*</h3><p title="obligatoire">* Veuillez sélectionner au moins un service de logement</p></div>
                    <div>    
                        <div>
                            <button id="btn32" name="menage" onclick="toggleButton5(this)" type="button"><img src="{{asset ('img/menage2.svg')}}"><p>Ménage</p></button>
                            <button id="btn33" name="linge" onclick="toggleButton5(this)" type="button"><img src="{{asset ('img/linge.svg')}}"><p>Linge</p></button>
                        </div>
                        <div class="boutonbas">
                            <button id="btn34" name="taxi" onclick="toggleButton5(this)" type="button"><img src="{{asset ('img/taxi.svg')}}"><p>Taxi</p></button>
                        </div>
                    </div>
                    <label>Autre :</label><input style="width:350px; margin-left:15px;" name='autre_service' placeholder="Taxi, Linge..." value = '' type='text'>
                </div>
                <input type="hidden" id="services" name="services" />
            </div>
            <div class='p2-6'>
                <div class="abc">
                    <div class='p2-6-nom'><h3>Quel sera le prix par nuit de votre logement ?*</h3><p title="obligatoire">* Veuillez renseigner le prix par nuit du logement</p></div>
                    <div><input name='prix' style="width:150px; margin-left:15px;" placeholder="Prix par nuit" value = '' type='number'>€</div>
                </div>
            </div>
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
                                <img src="{{asset ('img/Download.png')}}">
                            </input>
                        </div>
                    </div>
                    <div class="import_image">    
                        <label>Insérer une photo :</label>
                        <div>
                            <input id="btn39" name="image_3" type="file">
                                <img src="{{asset ('img/Download.png')}}">
                            </input>
                        </div>
                    </div>
                    <div class="import_image">
                        <label>Insérer une photo :</label>
                        <div>
                            <input id="btn40" name="image_4" type="file">
                                <img src="{{asset ('img/Download.png')}}">
                            </input>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>        

    <button name="btn_validation" class="validation" type="submit">VALIDER</button>
    </form>
</section> 
</main>
<footer>
<div class="progress-container">
    <div class="progress-bar" id="myBar"></div>
</div>
</footer>
</body>
</html>
