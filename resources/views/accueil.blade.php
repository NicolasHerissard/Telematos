<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
    <title>Page D'accueil</title>
</head>
<body>
    
    @include('component/header')

    
    <div class="tableau">
        <table class="tableauValeur">
            <thead>
                <tr>
                    <td>Produit</td>
                    <td>Stock disponible</td>
                    <td>Quantité</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <form action="{{ route('productUser.store') }}" method="POST">
                    @csrf
                        <tr>
                            <td>{{ $item->name_product }} <input name="product_id" value="{{ $item->id }}" hidden></td>
                            <td>{{ $item->stock }}</td>
                            <td><input type="number" id="number_product" name="take_product"></td>
                            <td><button type="submit" id="btn_product" class="bp">Choisir</button></td>
                        </tr>
                    </form>
                @endforeach
            </tbody>
        </table>
    </div>
    @if (Session::has('error'))
        <div class="error">
            {{ Session::get('error') }}
        </div>
    @endif

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