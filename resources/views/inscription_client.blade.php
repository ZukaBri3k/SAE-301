<!DOCTYPE html>
<html lang="en">
    
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="inscription.css">
</head>
<body>

    

    <header>
        @include('components.navbar')
    </header>
<main>
    <h1>Inscription client</h1>
    <div class="wrapper">
        <div class="gauche" >
            <div class="public-info-section">
            <h1>Infomation personnel public</h1>
            <form action="traitement.php" method="post">
                <div class="radio-container">
        
                <label for="civ"></label>
        
                <select id="genre" >
                    <option selected>Genre</option>
                    <option value="Homme">Homme</option>
                    <option value="Femme">Femme</option>
                    <option value="Non préscisé">Non préscisé</option>
                  </select>
        
                  <select id="civilite" name="civilite"><br>
                    <option selected>civilite</option>
                    <option class="lt" value="--">none</option>
                    <option value="M">M.</option>
                    <option value="MME">MME.</option>
                  </select>
        
        
                <br><br>
                </div>
        
                <br><br>
        
        
        
                <label for="nom"></label>
                <input type="text" id="nom" name="nom" placeholder="Nom*" required>
        
                <label for="prenom"></label>
                <input type="text" id="prenom" name="prenom" placeholder="Prenom* " required>
                <br></br>
        
                
                <label for="pseudo"></label>
                <input type="text" id="pseudo" name="pseudo" placeholder="Pseudo*" required>
        
                <label for="ville"></label>
                <input type="text" id="ville" name="ville" placeholder="Ville* " required>
                <br></br>
        
                <label for="pays"></label>
                <input type="text" id="pays" name="pays" placeholder="Pays* " required>
                <br></br>
        
                <label for="photoProfil">Inserer une Photo de profil* :</label>
                <input type="file" id="photoProfil" name="photoProfil" accept="image/*">
                <br><br>
            </div>
        
            <div class="messages_prop_devis" >
        
                <h1>Messages automatique</h1>
        
                <h3>Messages de demande de devis</h3>

        <label for="nom_prop_demande_devis"></label>
        <input type="text" name="nom_prop_demande_devis" id="nom_prop_demande_devis" placeholder="Bonjour Monsieur/Madame">
        <p>[nom propriétaire]</p>
        <br></br>

        <label for="nom_logement_demande_devis"></label>
        <input type="text" name="nom_logement_demande_devis" id="nom_logement_demande_devis" placeholder="Je souhaiterais réserver le logement 
        J’aimerais savoir si c’est possible 
        d’avoir un devis.">
        <p>[nom logement]</p>
            <br></br>  

        <label for="votre_nom_demande_devis"></label>
        <input type="text" name="votre_nom_demande_devis" id="votre_nom_demande_devis" placeholder="Cordialement,
        Bonne journée">
        <p>[votre nom]</p>
        <br></br>
        <h3>Messages d'acceptation de devis</h3>

        <label for="nom_prop_acceptation"></label>
        <input type="text" name="nom_prop_acceptation" id="nom_prop_demande_acceptation" placeholder="Bonjour Monsieur/Madame">
        <p>[nom propriétaire]</p>
        <br></br>

        <label for="nom_logement_acceptation"></label>
        <input type="text" name="nom_logement_acceptation" id="nom_logement_acceptation" placeholder="Je souhaiterais réserver le logement 
        J’aimerais savoir si c’est possible 
        d’avoir un devis.">
        <p>[nom logement]</p>   
            <br></br>  

        <label for="votre_nom_acceptation"></label>
        <input type="text" name="votre_nom_demande_acceptation" id="votre_nom_acceptation" placeholder="Cordialement,
        Bonne journée">
        <p>[votre nom]</p>
        <br></br>
                </div>  
            </div>
                
                
           <div class="private-info-section">    
                    <h1>Information personnel privée</h1>
        
                <label for="adresse"></label> 
                <input type="text" id="adresse" name="adresse" placeholder="Adresse*" required>
                <br></br>
        
                <label for="codepostal"></label>
                <input type="number" name="codepostal" id="codepostal" placeholder="code postal*" required>
                <br></br>
        
                <label for="age"></label>
                <input type="number" id="age" name="age" placeholder="Age*" required>  
        
                <label for="date_naissance"></label>
                <input type="date" id="date_naissance" name="date_naissance" placeholder="Date de date de naissance*" required>
                <br></br>
        
                <label for="tel"></label>
                <input type="tel" id="tel" name="tel" placeholder="Telephone*" required>
                <br><br>
        
                <label for="motDePasse"></label>
                <input type="password" id="motDePasse" name="motDePasse" placeholder="Mot de passe *" required>
                <br><br>
                
                <label for="confirmerMotDePasse"></label>
                <input type="password" id="confirmerMotDePasse" name="confirmerMotDePasse" placeholder="confirmer Mot De Passe*"  required>
                <br><br>
                <label for="iban"></label>
                <input type="number" id="iban" name="iban" placeholder="iban">
                <br></br>
        
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="email*" required>
                <br><br>
        
                <label for="identité_recto">Inserer une Photo de profil* :</label>
                <input type="file" id="identité_recto" name="identité_recto" accept="image/*">
                <br><br>
        
                <label for="identité_verso">Inserer une Photo de profil* :</label>
                <input type="file" id="identité_verso" name="identité_verso" accept="image/*">
                <br><br>



                <h3>Messages de refus de devis</h3>

        <label for="nom_prop_refus"></label>
        <input type="text" name="nom_prop_refus" id="nom_prop_refus" placeholder="Bonjour Monsieur/Madame">
        <p>[nom propriétaire]</p>
        <br></br>

        <label for="nom_logement_refus"></label>
        <input type="text" name="nom_logement_refus" id="nom_logement_refus" placeholder="Je souhaiterais réserver le logement 
        J’aimerais savoir si c’est possible 
        d’avoir un devis.">
        <p>[nom logement]</p>
            <br></br>  

        <label for="votre_nom_refus"></label>
        <input type="text" name="votre_nom_refus" id="votre_nom_refus" placeholder="Cordialement,
        Bonne journée">
        <p>[votre nom]</p>
        <br></br>
            </div>
    </div>

       

        <input type="submit" value="S'inscrire">
    </main>
        <footer>

        </footer>
    </form>
</body>
</html>
