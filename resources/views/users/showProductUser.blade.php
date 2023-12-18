<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/../logo_navecran64x64.png">
    <title>Mon matériel</title>
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
                    <td>Quantité</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($var as $item)
                    <tr>
                        <td>{{ $item->name_product }}</td>
                        <td></td>
                        <td>
                            <form action="{{ route('productUser.delete', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button id="btn_product" class="bp" type="submit">Rendre</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="display-telephone">
        @if (Session::has('error'))
            <div class="error">
                {{ Session::get('error') }}
            </div>
        @endif
        @foreach ($var as $item)
        <div class="card-display-telephone">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <div class="right-part-display-telephone">
                                <div class="subpart-display-telephone">{{ $item->name_product }}</div>
                                <div class="subpart-display-telephone">quantité ici</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <form action="{{ route('productUser.delete', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button id="btn_product" class="bp" type="submit">Rendre</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>
        @endforeach
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