<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
    <title>Document</title>
</head>
<body>
    
    
    @foreach ($productUser as $item)

        <div>
            {{ $item->user_id }}
            {{ $item->product_id }}
        </div>
    @endforeach

</body>
</html>