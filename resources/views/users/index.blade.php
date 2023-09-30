<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Listes utilisateurs</title>
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
    
    <div class="users">
        <div class="list-users">
            <h2>Listes des utilisateurs</h2>

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

            <a href="{{ route('admin.users.create') }}">Créer un utilisateur</a>

            <table>
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
    </div>

</body>
</html>