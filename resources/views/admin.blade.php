<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
    <title>Admin</title>
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

        <div class="container">
            <div class="tableau">
                <table class="tableauValeur">
                    <thead>
                        <tr>
                            <td>Nom</td>
                            <td>Email</td>
                            <td>Role</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $item)
                            @if ($item->isadmin == '1')
                                <input type="hidden" value="{{$item->isadmin = 'Admin'}}">
                            @else
                                <input type="hidden" value="{{$item->isadmin = 'Utilisateur'}}">
                            @endif
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->isadmin }}</td>
                                    <td>
                                        <div class="btn-action">
                                            <form action="{{ route('admin.users.delete', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button id="btn-delete">Supprimer</button>
                                            </form>
                                            <form action="{{ route('admin.users.edit', $item->id) }}" method="get">
                                                <button id="btn-edit">Modifier</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="display-telephone">
                @foreach ($users as $item)
                    @if ($item->isadmin == '1')
                        <input type="hidden" value="{{$item->isadmin = 'Admin'}}">
                    @else
                        <input type="hidden" value="{{$item->isadmin = 'Utilisateur'}}">
                    @endif
                    <table>
                        <thead>
                            <tr>
                                <th>{{ $item->isadmin }}</th>
                                <th>{{ $item->name }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="2">{{ $item->email }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <form action="{{ route('admin.users.delete', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button id="btn-delete">Supprimer</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('admin.users.edit', $item->id) }}" method="get">
                                        <button id="btn-edit">Modifier</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
    
    {{-- <div class="admin-acceuil">
        <h1>Bienvenue {{ $user->name }} dans le panel administratif</h1>
        <div class="bp-general">
            <div class="btn-users">
                <form action="{{ route('admin.users') }}"><button>Voir les utilisateurs</button></form>
            </div>

            <div class="btn-products">
                <form action="{{ route('admin.products') }}"><button>Voir les produits</button></form>
            </div>
        </div>
    </div> --}}
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