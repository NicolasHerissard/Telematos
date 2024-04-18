<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/reset.css" >
    <link rel="stylesheet" href="/css/style.css" >
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
    <title>Document</title>
</head>
<body>
    
    @if (Session::has('error'))
            <div class="error"> 
                {{ Session::get('error') }}
            </div>
            <br>
            
        @endif
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
                @foreach ($productUser as $item)
                    <tr>
                        <td>{{ $item->user_id }} <input name="product_id" value="{{ $item->id }}" hidden></td>
                        <td>{{ $item->product_id }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>