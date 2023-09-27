<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mon matériel</title>
</head>
<body>
    <header>
        <div class="nav-left">
            <a class="text-logo" href="/">TELEMATOS</a>
        </div>
        <div class="nav-right">
            <nav class="navMenu">
                <a class="acceuil" href="/" style="width: 140px;">Accueil</a>
                <a class="mon-materiel" href="">Mon Matériel</a>
                <a class="Compte" href="" style="width: 80px;">Admin</a>
                <div class="dot"></div>
            </nav>
        </div>
        <div class="bp-general">
            <div class="bp-inscr">
                <form action="register"><button class="bp">S'inscrire</button></form>
            </div>
            <div class="bp-conn">
                <form action="login"><button class="bp">Se Connecter</button></form>
            </div>
        </div>
    </header>

    <div>
        @foreach ($var as $item)
            <div class="name_product">
                {{ $item->name_product }}
            </div>
            {{-- <div class="quantity">
                {{ $item->pivot }}
            </div> --}}
            {{-- {{ $take_product }} --}}
        @endforeach
    </div>

    {{-- <h1>Matériel emprunté de {{ $user->products }}</h1>

    @foreach ($user->users as $item)
        <div>
            {{ $item }}
        </div>
    @endforeach --}}
    
</body>
</html>