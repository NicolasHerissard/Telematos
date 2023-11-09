<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="/../logo_navecran64x64.png">
    <title>Modifier utilisateurs</title>
</head>
<body>
    
    @include('component/header')
    
    <div class="body">
        @include('component/sidebar')
        <div class="create-all">
            <div class="form-inscr-conn">
                <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name">Nom</label>
                    <input type="text" name="name" value="{{ $user->name }}" placeholder="Nom">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" placeholder="email">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" value="{{ $user->password }}" placeholder="password">
                    <label for="role">role</label>
                    <input type="text" name="isadmin" value="{{ $user->isadmin }}" placeholder="role">
                    <button type="submit">Modifié</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>