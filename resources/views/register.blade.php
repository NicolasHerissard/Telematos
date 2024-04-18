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
            <form action="{{ route('registerUser') }}" method="post">
            @csrf
                <input type="text" placeholder="Nom" name="name" required >
                <input type="email" placeholder="Email" name="email" required >
                <input type="password" name="password" placeholder="Mot de Passe" required >
                <button type="submit">Enregistrer</button>
                <a class="regis_a" href="/login">Connectez vous !</a>
            </form>
            @if (Session::has('error'))
                <div class="error">
                    {{ Session::get('error') }}
                </div>
            @endif
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
    var burgerLink = document.getElementById("burger");
    var deroulerDiv = document.querySelector(".derouler");

    burgerLink.addEventListener("click", function(event) {
      event.preventDefault(); 

      // alterner entre afficher et cacher la div
      if (deroulerDiv.style.display === "none" || deroulerDiv.style.display === "") {
        deroulerDiv.style.display = "grid";
        //css de la div quand on l'affiche
        deroulerDiv.style.backgroundColor = "rgb(234 234 234)"; 
        deroulerDiv.style.justifyContent = "center";
        deroulerDiv.style.padding = "10px"; 
      } else {
        deroulerDiv.style.display = "none";
      }
    });
  });
</script>
</body>
</html>