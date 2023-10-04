<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Création utilisateurs</title>
</head>
<body>
    
    @include('component/header')
    
    <form action="{{ route('admin.createUsers') }}" method="post">
        @csrf
            <div class="create-users">
                <div class="name-users">
                    <label for="name">Nom</label>
                    <input type="text" name="name" placeholder="Nom">
                </div>
                <div class="email-users">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="email">
                </div>
                <div class="password-users">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" placeholder="password">
                </div>
                <div class="role-users">
                    <label for="role">role</label>
                    <input type="text" name="isadmin" placeholder="role">
                </div>
                <div class="btn-submit">
                    <button type="submit">Enregistrer</button>
                </div>
            </div>
    </form>
</body>
</html>