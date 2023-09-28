<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
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
                <a class="admin" href="/admin" style="width: 80px;">Admin</a>
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

    <div class="main">
        <div class="form-inscr-conn">
            <h1>Connexion</h1>
            <form action="{{ route('loginUser') }}" method="get">
                <input type="text" placeholder="Nom" name="name">
                <input type="password" placeholder="Password" name="password">
                <button>Connexion</button>
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
</body>
</html>