<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" href="logo_navecran64x64.png">
    <title>Créer produits</title>
</head>
<body>
    
    @include('component/header')
    
    <form action="{{ route('admin.createProduct') }}" method="post">
        @csrf
        <div class="create-products">
            <div class="name_product-products">
                <label for="name_product">Nom du produit</label>
                <input type="text" name="name_product" placeholder="Nom du produit">
            </div>
            <div class="stock-products">
                <label for="stock">Stock</label>
                <input type="text" name="stock" placeholder="stock">
            </div>
            <div class="btn-submit">
                <button type="submit">Enregistrer</button>
            </div>
        </div>
    </form>

</body>
</html>