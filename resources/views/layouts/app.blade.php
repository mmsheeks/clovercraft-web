<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@if( isset( $title ) ) {{ $title }} | Clovercraft @else Clovercraft @endif</title>
        <link rel="stylesheet" href="{{ asset( 'css/app.css' ) }}">
    </head>
    <body class="{{ $module }}">
        <nav class="navbar navbar-expand-lg navbar-light" id="main-nav">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img class="logo" src="{{ asset( 'img/logo.png' ) }}" alt="Clovercraft" />
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-navigation" aria-controls="main-navigation" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main-navigation">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link @activepage( 'pages.home' ) active @endactivepage" href="{{ route( 'pages.home' ) }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.patreon.com/clovercraft" target="_blank">Donate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://docs.clovercraft.gg/" target="_blank">Player Guide</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @activepage( 'shop.shops' ) active @endactivepage" href="{{ route( 'shop.shops' ) }}">Shops</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @activepage( 'pages.members' ) active @endactivepage" href="{{ route( 'pages.members' ) }}">Members</a>
                        </li>
                        <!--li class="nav-item">
                            <a class="nav-link" href="#">Lore Library</a>
                        </li-->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        @if( $user !== false )
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $user->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('me.profile') }}">Profile</a></li>
                                <!--li><a class="dropdown-item" href="">My Lore</a></li-->
                                @role( 'mod' )
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="">Moderation Tools</a></li>
                                @role( 'admin' )
                                    <li><a class="dropdown-item" href="">Admin Tools</a></li>
                                @endrole
                                @endrole
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ route( 'auth.logout' ) }}">Log Out</a></li>
                            </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route( 'pages.join' ) }}">Join</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route( 'auth.redirect' ) }}">Log In</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield( 'layout' )
        <script src="{{ asset( 'js/app.js' ) }}"></script>
    </body>
</html>