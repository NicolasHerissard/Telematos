<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Modifier utilisateurs</title>
</head>
<body>
    
    @include('component/header')
    
    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
            <div class="update-users">
                <div class="name-users">
                    <label for="name">Nom</label>
                    <input type="text" name="name" value={{ $user->name }} placeholder="Nom">
                </div>
                <div class="email-users">
                    <label for="email">Email</label>
                    <input type="email" name="email" value={{ $user->email }} placeholder="email">
                </div>
                <div class="password-users">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" value={{ $user->password }} placeholder="password">
                </div>
                <div class="role-users">
                    <label for="role">role</label>
                    <input type="text" name="isadmin" value={{ $user->isadmin }} placeholder="role">
                </div>
                <div class="btn-submit">
                    <button type="submit">Modifié</button>
                </div>
            </div>
    </form>
</body>
</html>