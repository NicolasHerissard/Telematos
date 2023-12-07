<link rel="stylesheet" href="/css/reset.css">
<link rel="stylesheet" href="/css/style.css">

<nav class="nav">
    <div class="btn">
        <form action="{{ route('admin.admin') }}">
            <button class="bp">Voir les utilisateurs</button>
        </form>
    </div>
    <div class="btn">
        <form action="{{ route('admin.users.create') }}">
            <button class="bp">Créer un utilisateur</button>
        </form>
    </div>
    <div class="btn">
        <form action="{{ route('admin.products') }}">
            <button class="bp">Voir les produits</button>
        </form>
    </div>
    <div class="btn">
        <form action="{{ route('admin.products.create') }}">
            <button class="bp">Créer un produit</button>
        </form>
    </div>
</nav>