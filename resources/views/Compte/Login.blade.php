<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang=fr>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <input type="email" name="email">
        <input type="password" name="password">
        <div>
            <input type="radio" id="client" name="typeCompte" value="client" />
            <label for="client">Client</label>
        </div>
        <div>
            <input type="radio" id="proprietaire" name="typeCompte" value="proprietaire" />
            <label for="proprietaire">Propriétaire</label>
        </div>
        <button type="submit" name="submit">Se connecter</button>
    </form>
</body>
</html>
