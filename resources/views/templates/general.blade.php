<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="/css/toastr.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" type="text/css" href="/css/green-audio-player.css">
  <link rel="stylesheet" type="text/css" href="/css/icones.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  
</head>
<body>
    
<header>

 <div class="header ">
     <img class="header__logo" src="/image/type_logo.png">
     <nav class="nav-links">
     <a href="/">Home</a>
    
       <!-- Authentication Links -->
       @guest
                            @if (Route::has('login'))
                                
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                
                            @endif
                            
                            @if (Route::has('register'))
                                
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                
                            @endif
                        @else
                        
                            <div class="nav-item dropdown">
                           
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                         
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" >
                                        @csrf
                                    </form>
                                </div>
</div>
                        @endguest

</nav>
</div>





 </header>
 
 <section class="translate ">
 <div class="ready-player-1 container">
         <audio class="lecteur" id="audio" crossorigin preload="none">
             
        </audio>
    </div>

 <form class="search"id="search" method="get" action="/search">
                            <input class="search_bar" type="text" name="search" placeholder="Recherchez des artistes, des groupes, des titres">
                            <input class="search_button"type=submit value="Rechercher">
                            

    </form>

    <div class="create_song container">
   
    <a href="/songs/create" class="upload_button">Uplodez votre musique</a> 
    </div> 

<div id="pjax-container">
 @yield('content')

 
 @if(Session::has("toastr"))
        <script>
            toastr.{{Session::get('toastr')['status']}}('{{Session::get('toastr')['message']}}')
        </script>
    @endif
</div>
 
 
 


 <footer>
 
 <p>© RapCoud. Tous droits réservés.</p>
 </footer>
 </section>

 
 <script src="/js/jquery.js"></script>
 <script src="/js/jquery.pjax.js"></script>
<script src="/js/divers.js"></script>
<script src="/js/toastr.min.js"></script>
<script src="/js/green-audio-player.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            new GreenAudioPlayer('.ready-player-1', { showTooltips: true, showDownloadButton: false, enableKeystrokes: true });
        });
    </script>
   
</body>
</html>