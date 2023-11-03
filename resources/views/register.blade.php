<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
    <title>Inscription</title>
</head>
<body>
    
    @include('component/header')

    <div class="main">
        <div class="form-inscr-conn">
            <h1>Inscription</h1>

            @if (Session::has('error'))
                <div class="error">
                    {{ Session::get('error') }}
                </div>
            @endif

            <form action="{{ route('registerUser') }}" method="post">
            @csrf
                <input type="text" placeholder="Nom" name="name">
                <input type="email" placeholder="Email" name="email">
                <input type="password" name="password" placeholder="Mot de Passe">
                <button type="submit">Enregistrer</button>
            </form>
        </div>
        
    </div>
<!--
<footer>
    <form id="copyright" class="button" style="width: 120px;">© Copyright 2023</form>
        <script> 
        document.getElementById("copyright").addEventListener("click", function(event) { 
            event.preventDefault(); alert("Copyright TKT"); 
        }); 
        </script>
</footer>
//-->
</body>
</html>