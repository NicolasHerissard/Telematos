<header>
    <div class="nav-left">
        <a class="img-logo" href="/"><img id="logo" src="/../PC_Mac.png" alt="Logo" width="170px" height="100px"></a>
    </div>
    <div class="menuBurger">
        <a class="img-menuBurger" id="burger" href=""><img id="menuBurger" src="/../menu-burger.png" alt="Menu Burger" width="40px" height="40px"></a>
    </div>
    <div class="navResponsive">
        <div class="nav-right">
            <nav class="navMenu">
                @if (Auth::check())
                    <a class="acceuil" href="/" style="width: 140px;">Accueil</a>
                    <a class="mon-materiel" href="{{ route('productUser.show', $user->id) }}">Mon Matériel</a>

                    @if ($user->isadmin == '1')
                    <a class="admin" href="/admin" style="width: 80px;">Admin</a>
                    @endif

                @endif
<<<<<<< HEAD
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
=======

            @endif
        </nav>
>>>>>>> 4de54f8fce996b5e971f543204cea428c52fc0ea
    </div>
    
</header>