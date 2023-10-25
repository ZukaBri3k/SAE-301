<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8" />
  <title>Demande de devis</title>
  <meta name="Devis" content=""/>
  <meta name="keywords" content="AlHaizBreizh"/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="./assets/IMG/logo.png">
  <link rel="stylesheet" href="./assets/CSS/style-devis.css">

</head>


<body>
        <header>
            <img src="./assets/IMG/image_header.png">
            <hr>
        </header>
    <main>
        <h1>Demander le devis :</h1>
        $devisCree = file_get_contents("devis_state.txt");
        <form action='devis-suite.php' method='POST' name="devis">
        <section>
            <div>    
                <section class="p1">
                    <button type="button">Demander devis</button>
                </section>
                <section class="p3">
                    @if ($devisCree === 'true')
                        <p>Accepter ou Refuser le devis :</p>
                        <button type="button">Accepter devis</button>
                        <button type="button">Refuser devis</button>
                    <p>Télécharger PDF</p>
                    <a href="Mon_Devis.pdf" download="Mon_Devis.pdf">Télécharger le PDF</a>
                </section>
            </div>
        </form>
    </main>
</body>
<script>
document.getElementById("refuserDevis").addEventListener("click", function () {
    // Effectuez ici toute action nécessaire, par exemple, enregistrez le refus du devis dans la base de données.
    // Redirigez ensuite l'utilisateur vers proprio.php avec un message.
    window.location.href = 'proprio.php?refus=1';
});
</script>
<script>
document.getElementById("accepterDevis").addEventListener("click", function () {
    // Effectuez ici toute action nécessaire, par exemple, enregistrez le refus du devis dans la base de données.
    // Redirigez ensuite l'utilisateur vers proprio.php avec un message.
    window.location.href = 'proprio.php?accept=1';
});
</script>
</html>
