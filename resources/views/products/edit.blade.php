<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
    <title>Modifier produits</title>
</head>
<body>
    
    @include('component/header')
    <div class="body">
        @include('component/sidebar')
        <div class="create-all">
            <div class="form-inscr-conn">
                <form action="{{ route('admin.products.update', [$product->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="name_product">Nom du produit</label>
                    <input type="text" name="name_product" value="{{ $product->name_product }}" placeholder="Nom du produit">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" value="{{ $product->stock }}" placeholder="stock">
                    <button type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>