<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
<<<<<<< HEAD
    <link rel="icon" type="image/png" href="/../logo_navecran64x64.png">
=======
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
>>>>>>> 9bccbba1f9257a037c100f53018b2acf3f252c5c
    <title>Mon matériel</title>
</head>
<body>
    
    @include('component/header')

    <div>
        @foreach ($var as $item)
            <div class="name_product">
                {{ $item->name_product }}
            </div>
            {{-- <div class="quantity">
                {{ $item->pivot }}
            </div> --}}
            {{-- {{ $take_product }} --}}
        @endforeach
    </div>
    
</body>
</html>