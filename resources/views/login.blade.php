<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    
    <h1>Login</h1>

    @if (Session::has('error'))
        <div class="error">
            {{ Session::get('error') }}
        </div>
    @endif

    <form action="{{ route('loginUser') }}" method="get">
        <input type="text" placeholder="Nom" name="name">
        <input type="password" placeholder="Password" name="password">

        <button>Connexion</button>
    </form>

</body>
</html>