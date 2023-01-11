<!doctype html>
    <html lang="lv">
        <head>
            <meta charset="utf-8">
            <title>PD 2 - {{ $title }}</title>
            <meta name="description" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="/js/main.js"></script>
        </head>

        <body>
            <div class="bg-light mb-4 py-4">
                <div class="container">
                    <div class="row">
                        <header class="col-md-12">
                            <nav class="navbar navbar-light navbar-expand-md">
                                <span class="navbar-brand mb-0 h1">Niklāvs Bergs</span>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="/">Sākumlapa</a>
                                        </li>

                                        @if(Auth::check())
                                            <li class="nav-item">
                                                <a class="nav-link" href="/brands">Brandi</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/cars">Modeļi</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="/types">Tipi</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" href="/logout">Beigt darbu</a>
                                            </li>
                                        @else
                                            <li class="nav-item">
                                                <a class="nav-link" href="/login">Pieslēgties</a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </nav>
                        </header>
                    </div>
                </div>
            </div>

            <div class="container mb-4">
                <div class="row">
                    <main class="col-md-12">
                        
                        @yield('content')

                    </main>
                </div>
            </div>

            <div class="bg-primary text-white py-4 mt-4">
                <div class="container">
                    <div class="row">
                        <footer class="col-md-12">
                            Ventspils Augstskola, 2022
                        </footer>
                    </div>
                </div>
            </div>

        </body>
    </html>