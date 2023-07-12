<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <style>
     
  .pagination .page-link {
    font-size: 14px; /* Taille de police personnalisée */
}

        .carousel-item.active,
        .carousel-item-next,
        .carousel-item-prev {
            display: flex;
        }

        .carousel-inner {
            overflow: visible;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 10%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            transform: scale(1.5);
        }

        .card {
            width: 300px;
            height: 200px;
            margin: 0 auto;
        }

    </style>
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
                        <a class="nav-link" href="{{route('dash')}}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active " href="{{route('nosprospections')}}">Nos prospections</a>
                    </li>
                    <li class="nav-item">
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
    <br><br><br><br>
    <div class="container">

        <div class="p-3">
          <div class=" ">
        <center>   <h3 class="text-decoration-underline text-success ">Nos Prospections</h3>  </center> 
       <br>
          </div>
          <br>
          <div class="row border border-dark rounded p-3 mb-3 ">
              @foreach($liste_prospects as $prospect)
              <div class="row border border-success rounded p-3 mb-3 ">
    
              <div class="col-md-6">
              <div class="border border-dark rounded p-3 mb-3">
                <div class="text-success">
                  <i class="fas fa-user-secret"></i> Nom de l'agent:
                </div>
                <div class="text-primary">{{ $prospect->agent_name }}</div>
                <br>
                <div class="text-success">
                  <i class="fas fa-user"></i> Nom du client:
                </div>
                <div class="text-primary">{{ $prospect->client_name }}</div>
                <br>
                <div class="text-success">
                  <i class="fas fa-calendar"></i> Date:
                </div>
                <div class="text-primary">{{ $prospect->date }}</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="border border-dark rounded p-3 mb-3">
                <div class="text-success">
                  <i class="fas fa-stopwatch"></i> Heure de début:
                </div>
                <div class="text-primary">{{ $prospect->start_time }}</div>
                <br>
                <div class="text-success">
                  <i class="fas fa-stopwatch"></i> Heure de fin:
                </div>
                <div class="text-primary">{{ $prospect->end_time }}</div>
                <br>
                <div class="text-success">
                  <i class="fas fa-stopwatch"></i> Durée:
                </div>
                <div class="text-primary">{{ $prospect->duration }} minutes</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="border border-dark rounded p-3 mb-3">
                <div class="text-success">
                  <i class="fas fa-cube"></i> Produit:
                </div>
                <div class="text-primary">{{ $prospect->product }}</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="border border-dark rounded p-3 mb-3">
                <div class="text-success">
                  <i class="fas fa-comments"></i> Observation client:
                </div>
                <div class="text-primary">{{ $prospect->client_observation }}</div>
                <br>
                <div class="text-success">
                  <i class="fas {{ $prospect->sale_concluded ? 'fa-check-circle text-primary' : 'fa-times-circle text-danger' }}"></i> Vente conclue?
                </div>
                <div class="text-primary">{{ $prospect->sale_concluded ? 'Oui' : 'Non' }}</div>
              </div>
            </div>
           
          </div>
            <br> <br>
            <hr class="bg-dark text-dark">
            @endforeach 
          </div>
          <center>
         </div> </center>
         <center>
          <div> {{$liste_prospects->links('pagination::bootstrap-5')->withClass('my-pagination') }}
          </div> </center>
        </div>
     
    </div>


   
    <footer class=" rounded pt-4 my-md-5 pt-md-5 border-top bg-light expand-lg position-bottom ">
        <div class="row">
            <div class="col-6 col-md">
                <div class="ftco-footer-widget mb-4">
                    <a class="navbar-brand" href="#">
                        <i class="fas m-3  text-success fa-user"> Guest vue</i>
                    </a>
                    <br>
                    <small class="d-block mb-3 text-body-success text-success">&copy; Myself:ABIONAN Cédric</small>
                </div>
            </div>
            <div class="col-6 col-md text-success">
                <h5>Liens utiles</h5>
                <ul class="list-unstyled text-small text-success">
                    <li class="mb-1 fas fa-chevron-right"><a class="link-secondary text-decoration-none"
                            href="{{route('dash')}}">Accueil</a></li> <br>
                    <li class="mb-1 fas fa-chevron-right "><a class="link-secondary active text-decoration-none" href="{{route('nosprospections')}}">Nos
                            prospections</a></li> <br>
                    <li class="mb-1 fas fa-chevron-right"><a class="link-secondary text-decoration-none" href="{{route('profile.edit')}}">Profil</a></li> <br>
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
</body>

</html>
