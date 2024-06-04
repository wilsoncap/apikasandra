<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    @vite([
        'resources/css/app.css', 
        'resources/css/style.css',
        'resources/js/app.js'
        ])

    @stack('css')
</head>
<body>
  fixed-top
    <div class="container-fluid py-2 Regular shadow fixed-top" id="cabecera"  >
        <div class="row">
          <div class="col">
            <header class="d-flex">
              <img src="{{ asset('images/Casandra.png')}}" alt="logo" width="200px" class="logo mx-4">
            </header>
          </div>
          <div class="col">
            @if (isset($buscar))
              <div class="input-group my-1">
                  <input type="text" id="offer-academic" class="form-control" placeholder="Qué Quieres Estudiar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                  <button class="btn btn-outline-secondary" type="button" onclick="buscar()" id="search">Button</button>
              </div>
             @endif
          </div>
          <div class="col py-1">
             <nav>
                    <ul class="d-flex justify-content-end align-items-center my-2">
                        <li class="mx-3"><a href="{{route('search_offers_academis')}}" class="fw-bold">Carreras</a></li>
                        <li class="mx-3"><a href="{{route('test_aptitud')}}" class="fw-bold">Test de Aptitud</a></li>
                        <li class="mx-3"><a href="" class="fw-bold">Carreras en Demanda</a></li>
                    </ul>
                </nav>
          </div>
        </div>
    </div>

    {{$slot}}


   
   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stack('js')

</body>
</html>