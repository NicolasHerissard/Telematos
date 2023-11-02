<link rel="stylesheet" href="/css/style.css">

<div class="body">
    <nav class="nav">
        <div class="btn">
            <form action={{ route('admin.admin') }}>
                <button>Voir les utilisateurs</button>
            </form>
        </div>
        <div class="btn">
            <form action={{ route('admin.users.create') }}>
                <button>Créer un utilisateur</button>
            </form>
        </div>
        <div class="btn">
            <form action={{ route('admin.products') }}>
                <button>Voir les produits</button>
            </form>
        </div>
        <div class="btn">
            <form action={{ route('admin.products.create') }}>
                <button>Créer un produit</button>
            </form>
        </div>
    </nav>