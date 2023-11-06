<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" type="image/png" href="/../logo_navecran64x64.png">
    <title>Créer produits</title>
</head>
<body>
    
    @include('component/header')
    <div class="body">

        @include('component/sidebar')
        <div class="create-all">
            <div class="form-inscr-conn">
                <form action="{{ route('admin.createProduct') }}" method="post">
                @csrf
                    <label for="name_product">Nom du produit</label>
                    <input type="text" name="name_product" placeholder="Nom du produit">
                    <label for="stock">Stock</label>
                    <input type="text" name="stock" placeholder="stock">
                    <button type="submit">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>