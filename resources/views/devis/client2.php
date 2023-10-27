<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Messagerie</title>
    <link rel="stylesheet" href="styleM.css">
</head>
<body>
    <div class="container">
    <header>
        <p>Place de la navbar</p>
    </header>
    <main>
        <section class="boutons">
            <form action="index.php" method="get" target="_blank">
                <button id="refuserDevis" class="bouton-creer">Refuser le devis</button>
                <button id="accepterDevis" class="bouton-creer">Accepter le devis</button>
            </form>
            <h2>Votre messagerie avec BigPapoo<img src="img/pp.png" alt="Avatar" class="avatar" width=5% height=5%></h2>
        </section>
        <section class="messaging">
            <div class="contact-list">
                <bouton class="rechercher">Rechercher</bouton>
                <div class="contact">
                    <p>Kyrill</p>
                </div>
                <div class="contact">
                    <p>BigPapoo</p>
                </div>
                <div class="contact">
                    <p>Fabienne</p>
                </div>
                <div class="contact">
                    <p>Nedelec</p>
                </div>
            </div>
            <div class="message-box">
                <div class="message message-sent">
                    <p>BigPapoo : Bonjour, comment ça va ?</p>
                </div>
                <div class="message message-received">
                    <p>Moi : Bonjour, ça va bien et toi ?</p>
                </div>
                <div class="message message-sent">
                    <p>BigPapoo : Je vais bien, merci !</p>
                    <button id="afficherPdf" class="bouton-afficher-pdf">Afficher le devis</button>
                    <iframe id="pdfViewer" src="" style="display: none; width: 800px; height: 600px;"></iframe>
                    <button id="fermerPdf" class="bouton-afficher-pdf" style="display: none;">Fermer</button>
                </div>
            </div>
        </section>
    </main>
    </div>
    <footer>
        <p>Place du footer</p>
    </footer>
</body>
<script>
document.getElementById("refuserDevis").addEventListener("click", function () {
    // Effectuez ici toute action nécessaire, par exemple, enregistrez le refus du devis dans la base de données.
    // Redirigez ensuite l'utilisateur vers proprio.php avec un message.
    window.location.href = 'proprio2.php?refus=1';
});

document.getElementById("accepterDevis").addEventListener("click", function () {
    // Effectuez ici toute action nécessaire, par exemple, enregistrez le refus du devis dans la base de données.
    // Redirigez ensuite l'utilisateur vers proprio.php avec un message.
    window.location.href = 'proprio2.php?accept=1';
});

document.getElementById("afficherPdf").addEventListener("click", function () {
    // Affichez le PDF en utilisant l'iframe
    document.getElementById("pdfViewer").src = 'Mon_Devis.pdf'; // Assurez-vous que le chemin du PDF est correct
    document.getElementById("pdfViewer").style.display = 'block';
    document.getElementById("fermerPdf").style.display = 'block';
});

document.getElementById("fermerPdf").addEventListener("click", function () {
    // Masquez l'iframe et le bouton "Fermer"
    document.getElementById("pdfViewer").style.display = 'none';
    document.getElementById("fermerPdf").style.display = 'none';
});
</script>
</html>