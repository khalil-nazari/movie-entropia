<div class="container-fluid bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{URL::to('movies')}}">Movies</a>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() == 'movies' || Request::path() == '/' ? 'active': ''}}" href="{{URL::to('movies')}}">Movies</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() == 'actor' ? 'active': ''}}" href="{{URL::to('actor')}}">Actors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::path() == 'producers' ? 'active': ''}}" href="{{URL::to('producers')}}">Producers</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>