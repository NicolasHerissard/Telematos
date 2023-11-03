<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    
    @include('component/header')

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

</body>
</html>