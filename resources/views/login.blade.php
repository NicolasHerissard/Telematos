<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
    <title>Connexion</title>
    <meta name="description" content="Outils de gestion d'emprunt, matériel télétravail.">
    <meta name="keywords" content="Teletravail, Outils profesionnel">
    <meta name="author" content="Dominik KILIAN, Nicolas Herissard, Sofyane RAYE">
</head>
<body>
    
    @include('component/header')

    <div class="derouler">
        <div class="nav-right">
            <nav class="navMenu">
                @if (Auth::check())
                    <a class="acceuil" href="/" style="width: 140px;">Accueil</a>
                    <a class="mon-materiel" href="{{ route('productUser.show', $user->id) }}">Mon Matériel</a>

                    @if ($user->isadmin == '1')
                    <a class="admin" href="/admin" style="width: 80px;">Admin</a>
                    @endif

                @endif
            </nav>
        </div>
        
        @if (!Auth::check())
            <div class="bp-general">
                <div class="bp-inscr">
                    <form action="register"><button class="bp">S'inscrire</button></form>
                </div>
                <div class="bp-conn">
                    <form action="login"><button class="bp">Se Connecter</button></form>
                </div>
            </div>
        @else
            <div class="disconnect">
                <form action="/logout"><button class="bp">Se déconnecter</button></form>
            </div>
        @endif
    </div>

    <div class="main">
        <div class="form-inscr-conn">
            <h1>Connexion</h1>
            <form action="{{ route('loginUser') }}" method="get">
                <input type="text" placeholder="Nom" name="name">
                <input type="password" placeholder="Password" name="password">
                <button>Connexion</button>
                <a class="regis_a" href="/register">Inscrivez vous !</a>
            </form>
            @if (Session::has('error'))
                <div class="error">
                    {{ Session::get('error') }}
                </div>
            @endif
        </div>
    </div>

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
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var burgerLink = document.getElementById("burger");
    var deroulerDiv = document.querySelector(".derouler");

    burgerLink.addEventListener("click", function(event) {
      event.preventDefault(); 

      // alterner entre afficher et cacher la div
      if (deroulerDiv.style.display === "none" || deroulerDiv.style.display === "") {
        deroulerDiv.style.display = "grid";
        //css de la div quand on l'affiche
        deroulerDiv.style.backgroundColor = "rgb(234 234 234)"; 
        deroulerDiv.style.justifyContent = "center";
        deroulerDiv.style.padding = "10px"; 
      } else {
        deroulerDiv.style.display = "none";
      }
    });
  });
</script>
</body>
</html>