<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/../logo_navecran64x64.png">
    <title>Création utilisateurs</title>
</head>
<body>
    
    @include('component/header')

    <div class="body">

        @include('component/sidebar')
        <div class="create-all">
            <div class="form-inscr-conn">
                <form class="form-crea-compte" action="{{ route('admin.createUsers') }}" method="post">
                    @csrf
                    <label for="name">Nom</label>
                    <input type="text" name="name" placeholder="Nom">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="Mot de passe">
                    <label for="role">Role</label>
                    <input type="text" name="isadmin" placeholder="Role">
                    <button type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>