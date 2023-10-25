<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page du Propriétaire</title>
</head>
<body>
    <h1>Page du Propriétaire</h1>
    <p>{{ isset($message) ? $message : '' }}</p>
    <a href="{{ route('client-page') }}">Revenir à la page du client</a>
    <p>Créer mon devis</p>
    <a href="{{ route('devis-page') }}">Créer mon devis</a>

    @if (request()->input('refus') == 1)
        Le client a refusé le devis.
    @endif

    @if (request()->input('accept') == 1)
        Le client a accepté le devis.
    @endif
</body>
</html>
