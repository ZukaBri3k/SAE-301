<h1>Bienvenu sur ton compte propriétaire {{ auth()->user()->name }} !</h1>

<a href="#" onclick="document.getElementById('deco').submit()">
    <form action="{{route('logout')}}" method="post" id="deco">@csrf</form>
    Se déconnecter
</a>

<form action="{{ route('updateAccount') }}" method="get">
    <input type="text" name="name">
    <button type="submit">Changer le nom</button>
</form>

