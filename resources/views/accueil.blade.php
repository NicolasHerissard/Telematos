<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Page D'accueil</title>
</head>
<body>
    <header>
        <div class="nav-left">
            <a class="text-logo" href="/">TELEMATOS</a>
        </div>
        <div class="nav-right">
            <nav class="navMenu">
                <a class="acceuil" href="/" style="width: 140px;">Accueil</a>
                <a class="mon-materiel" href="{{ route('productUser.show', $user->id) }}">Mon Matériel</a>
                <a class="Compte" href="" style="width: 80px;">Admin</a>
                <div class="dot"></div>
            </nav>
        </div>

        {{-- @if (Auth::check())
            <div class="username">
                <p>Bienvenue {{ $user->name }}</p>
            </div>
        @endif --}}

        <div class="bp-general">
            <div class="bp-inscr">
                <form action="register"><button class="bp">S'inscrire</button></form>
            </div>
            <div class="bp-conn">
                <form action="login"><button class="bp">Se Connecter</button></form>
            </div>
        </div>
    </header>

    @if (Session::has('error'))
        <div class="error">
            {{ Session::get('error') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <td>Produit</td>
                <td>Quantité</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $item)
                <form action="{{ route('productUser.store') }}" method="POST">
                @csrf
                    <tr>
                        <td>{{ $item->name_product }} <input name="product_id" value="{{ $item->id }}" hidden></td>
                        <td><input type="number" id="number_product" name="take_product"></td>
                        <td><button type="submit" id="btn_product">Choisir</button></td>
                    </tr>
                </form>
            @endforeach
        </tbody>
    </table>


<!--
<footer>
    <form id="copyright" class="button" style="width: 120px;">© Copyright 2023</form>
        <script> 
        document.getElementById("copyright").addEventListener("click", function(event) { 
            event.preventDefault(); alert("Copyright TKT"); 
        }); 
        </script>
</footer>
//-->
</body>
</html>