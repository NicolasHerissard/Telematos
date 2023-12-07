<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
    <title>Page D'accueil</title>
</head>
<body>
    
    @include('component/header')

<<<<<<< HEAD
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
=======
>>>>>>> 4de54f8fce996b5e971f543204cea428c52fc0ea
    
    <div class="tableau">
        @if (Session::has('error'))
            <div class="error">
                {{ Session::get('error') }}
            </div>
        @endif
        <table class="tableauValeur">
            <thead>
                <tr>
                    <td>Produit</td>
                    <td>Stock disponible</td>
                    <td>Quantité</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <form action="{{ route('productUser.store') }}" method="POST">
                    @csrf
                        <tr>
                            <td>{{ $item->name_product }} <input name="product_id" value="{{ $item->id }}" hidden></td>
                            <td>{{ $item->stock }}</td>
                            <td><input type="number" id="number_product" name="take_product"></td>
                            <td><button type="submit" id="btn_product" class="bp">Choisir</button></td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
<<<<<<< HEAD

    <div class="display-telephone">
        @if (Session::has('error'))
            <div class="error">
                {{ Session::get('error') }}
            </div>
        @endif
        @foreach ($products as $item)
        <div class="card-display-telephone">
            <form action="{{ route('productUser.store') }}" method="POST">
            @csrf
                <table>
                    <tbody>
                        <tr>
                            <td style="vertical-align: top;"><img src="pion.png" alt="Pion" width="120px" height="140px"></td>
                            <td>
                                <div class="right-part-display-telephone">
                                    <div class="subpart-display-telephone">{{ $item->name_product }} <input name="product_id" value="{{ $item->id }}" hidden></div>
                                    <div class="subpart-display-telephone">Quantité : {{ $item->stock }}</div>
                                    <div class="subpart-display-telephone"><input type="number" id="number_product" name="take_product"></div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button type="submit" id="btn_product" class="bp">Choisir</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>    
        </div>
        @endforeach
    </div>
=======
>>>>>>> 4de54f8fce996b5e971f543204cea428c52fc0ea

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
        deroulerDiv.style.backgroundColor = "#ccc"; 
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