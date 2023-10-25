<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8" />
    <title>Demande de devis</title>
    <meta name="Devis" content="" />
    <meta name="keywords" content="AlHaizBreizh" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/IMG/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/CSS/style-devis.css') }}">
</head>

<body>
    <header>
        <img src="{{ asset('assets/IMG/image_header.png') }}">
        <hr>
    </header>

    <main>
        <h1>Demander le devis :</h1>
        @if ($devisCree === 'true')
            <form action="{{ route('accept-devis') }}" method="POST">
                @csrf
                <section>
                    <div>
                        <section class="p1">
                            <button type="submit">Demander devis</button>
                        </section>
                        <section class="p3">
                            <p>Accepter ou Refuser le devis :</p>
                            <button type="submit" name="accepter" value="true">Accepter devis</button>
                            <button type="submit" name="refuser" value="true">Refuser devis</button>
                        </section>
                    </div>
                </section>
            </form>
        @endif
        <p>Télécharger PDF</p>
        <a href="{{ route('telecharger-pdf') }}" download="Mon_Devis.pdf">Télécharger le PDF</a>
    </main>
</body>
</html>
