<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    
    @include('component/header')

    <div class="admin-acceuil">
        <h1>Bienvenue {{ $admin->name }} dans le panel administratif</h1>
        <div class="bp-general">
            <div class="btn-users">
                <form action="{{ route('admin.users') }}"><button>Voir les utilisateurs</button></form>
            </div>

            <div class="btn-products">
                <form action="{{ route('admin.products') }}"><button>Voir les produits</button></form>
            </div>
        </div>
    </div>

</body>
</html>