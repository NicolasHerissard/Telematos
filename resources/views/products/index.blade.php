<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Listes produits</title>
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
                @if ($user->isadmin == '1')
                    <a class="admin" href="/admin" style="width: 80px;">Admin</a>
                @endif
                <div class="dot"></div>
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
    </header>
    
    <div class="products">
        <div class="list-products">
            <h2>Listes des produits</h2>

            @if (Session::has('success'))
            <div class="success">
                {{ Session::get('success') }}
            </div>
            @endif
            @if (Session::has('error'))
                <div class="error">
                    {{ Session::get('error') }}
                </div>
            @endif

            <a href="{{ route('admin.products.create') }}">Créer un produit</a>

            <table>
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
                                    <form action={{ route('admin.products.delete', [$item->id]) }} method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button id="btn-delete">Supprimer</button>
                                    </form>
                                    <form action={{ route('admin.products.edit', [$item->id]) }} method="get">
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
        
</body>
</html>