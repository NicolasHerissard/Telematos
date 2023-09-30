<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/reset.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <title>Modifier produits</title>
</head>
<body>
    <header>
        <div class="nav-left">
            <a class="text-logo" href="/">TELEMATOS</a>
        </div>
        <div class="nav-right">
            <nav class="navMenu">
                <a class="acceuil" href="/" style="width: 140px;">Accueil</a>
                <a class="mon-materiel" href="">Mon Matériel</a>
                @if ($user->isadmin == '1')
                    <a class="admin" href="/admin" style="width: 80px;">Admin</a>
                @endif
                <div class="dot"></div>
            </nav>
        </div>

        @if (!Auth::check())
            <div class="bp-general">
                <div class="bp-inscr">
                    <form action="register"><button class="bp">S'inscrire</button></form>
                </div>
                <div class="bp-conn">
                    <form action="login"><button class="bp">Se Connecter</button></form>
                </div>
            </div>
        @else
            <div class="disconnect">
                <form action="/logout"><button class="bp">Se déconnecter</button></form>
            </div>
        @endif
    </header>
    
    <form action={{ route('admin.products.update', [$product->id]) }} method="post">
        @csrf
        @method('PUT')
        <div class="update-products">
            <div class="name_product-products">
                <label for="name_product">Nom du produit</label>
                <input type="text" name="name_product" value={{ $product->name_product }} placeholder="Nom du produit">
            </div>
            <div class="stock-products">
                <label for="stock">Stock</label>
                <input type="text" name="stock" value={{ $product->stock }} placeholder="stock">
            </div>
            <div class="btn-submit">
                <button type="submit">Enregistrer</button>
            </div>
        </div>
    </form>

</body>
</html>