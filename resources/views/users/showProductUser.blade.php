<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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