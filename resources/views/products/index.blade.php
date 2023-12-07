<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css" >
    <link rel="stylesheet" href="/css/style.css" >
    <link rel="icon" type="image/png" href="/../logo_navecran64x64.png">
    <title>Listes produits</title>
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

    <div class="body">
    @include('component/sidebar')
        <div class="products">
            <div class="list-products">
                @if (Session::has('error'))
                    <div class="error">
                        {{ Session::get('error') }}
                    </div>
                @endif
                @if (Session::has('success'))
                <div class="success">
                    {{ Session::get('success') }}
                </div>
                @endif
                <div class="tableau">
                    <table class="tableauValeur">
                        <thead>
                            <tr>
                                <td>Nom du produit</td>
                                <td>Stock restant</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $item)
                                <tr>
                                    <td>{{ $item->name_product }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>
                                        <div class="btn-action">
                                            <form action="{{ route('admin.products.delete', [$item->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button id="btn-delete">Supprimer</button>
                                            </form>
                                            <form action="{{ route('admin.products.edit', [$item->id]) }}" method="get">
                                                @csrf
                                                <button id="btn-edit">Modifier</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
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