<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-success">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-user"> Guest vue</i>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" fas collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('dash')}}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('nosprospections')}}">Nos prospections</a>
                    </li>
                  
                    <li  class="nav-item">
                        <a href="{{route('profile.edit')}}" class="nav-link">Profil</a>
                    </li>
                    <li class="nav-item">
                     
                        <form method="POST" action="{{ route('logout') }}">
                         @csrf
                   
                         <a href="route('logout')" class="nav-link"
                                 onclick="event.preventDefault();
                                             this.closest('form').submit();">
                             {{ __('Déconnexion') }}
                           </a>
                     </form>
                      
                     </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>
    <main>
        <br><br>
        <div class="container shadow-lg rounded">
            <div class="row flex-md-row-reverse align-items-center">
                <div class="col-md-6">
                    <div class="py-5 text-center">
                        <img src="img/images.png" alt="Image" class="rounded-3 img-fluid"
                            style="max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="col-md-6  text-center shadow-sm">
                    <div class="py-5 text-center ">
                        <h1 class="fas text-center">Bienvenue sur notre application de prospection</h1> <br>
                        <br> <br>
                        <p class="lead text-center ">Cette application permet de gérer les prospections. Vous pouvez y
                            ajouter,supprimer ,modifier des prospections. Vous pouvez même obtenir des rapports sur vos
                            prospections et les exporter en Excel. <br>
                            <br>
                            <center>
                                <p class=" text-success fas fa-laugh-wink"> Contactez un administrateur pour avoir accès
                                    à toutes les fonctionnalités.</p>
                            </center>
                        </p>
                    </div>
                </div>

            </div>
            <br><br>
            <div class="container">
            <center>
                    <h2 class="fas text-success">Nos Statistiques </h2> </center>
            
                <hr>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Nombre de prospections</h5>
                                <h1 class="counter prospects-counter">0</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title ">Nombre d'agents</h5>
                                <h1 class="counter agents-counter">0</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br><br> <br>
        </div>

    </main>


    
       
    <footer class=" rounded pt-4 my-md-5 pt-md-5 border-top bg-light expand-lg position-bottom ">
        <div class="row">
            <div class="col-6 col-md">
                <div class="ftco-footer-widget mb-4">
                    <a class="navbar-brand" href="#">
                        <i class="fas m-3  text-success fa-user"> Guest vue</i>
                    </a>
                    <br>
                    <small class="d-block mb-3 text-body-success text-success">&copy; Myself:ABIONAN Cédric <br>
                    contact:admin@gmail.com</small>
                </div>
            </div>
            <div class="col-6 col-md text-success">
                <h5>Liens utiles</h5>
                <ul class="list-unstyled text-small text-success">
                    <li class="mb-1 fas fa-chevron-right"><a class="link-secondary active text-decoration-none"
                            href="{{route('dash')}}">Accueil</a></li> <br>
                    <li class="mb-1 fas fa-chevron-right"><a class="link-secondary text-decoration-none"
                            href="{{route('nosprospections')}}">Nos prospections</a></li> <br>
                   
                            <li class="mb-1 fas fa-chevron-right"><a class="link-secondary text-decoration-none" href="{{route('profile.edit')}}">
                                Profil</a></li> <br>
                            <li class="">
                     
                                <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                           
                                 <a href="route('logout')" class="link-secondary text-decoration-none mb-1 fas fa-chevron-right"
                                         onclick="event.preventDefault();
                                                     this.closest('form').submit();">
                                     {{ __('Déconnexion') }}
                                   </a>
                             </form>
                              
                             </li>
                </ul>
            </div>
        </div>
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            var targetProspects = {{$prospectCount}}; // Remplacez par votre nombre souhaité
            var targetAgents = {{$userCount }}; // Remplacez par votre nombre souhaité

            function startCounting(target, counterElement) {
                var count = 0;
                var increment = Math.ceil(target / 100); // L'incrément est calculé en divisant la cible par 100

                var interval = setInterval(function () {
                    count += increment;

                    if (count >= target) {
                        count = target;
                        clearInterval(interval);
                    }

                    counterElement.text(count);
                }, 300); // La vitesse d'incrémentation (20ms) peut être ajustée selon vos préférences
            }

            $('.counter').each(function () {
                var $this = $(this);
                if ($this.hasClass('prospects-counter')) {
                    startCounting(targetProspects, $this);
                } else if ($this.hasClass('agents-counter')) {
                    startCounting(targetAgents, $this);
                }
            });
        });

    </script>
        @include('sweetalert::alert')

</body>

</html>
