<!DOCTYPE html>
<html lang="en">
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
    
    <form action="{{ route('admin.products.update', [$product->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="update-products">
            <div class="name_product-products">
                <label for="name_product">Nom du produit</label>
                <input type="text" name="name_product" value="{{ $product->name_product }}" placeholder="Nom du produit">
            </div>
            <div class="stock-products">
                <label for="stock">Stock</label>
                <input type="text" name="stock" value="{{ $product->stock }}" placeholder="stock">
            </div>
            <div class="btn-submit">
                <button type="submit">Enregistrer</button>
            </div>
        </div>
    </form>

</body>
</html>