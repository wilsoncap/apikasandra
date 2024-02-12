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
</head>
<body>
<div class="container-fluid py-2 Regular shadow" id="cabecera">
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

@php
    //dd($buscar);
@endphp
<div class="container my-2" id="buscador">
    <div class="row">
        <div class="col-md-7 offset-md-3 py-2" id="universities">
            
            @foreach ($datos as $item)
            <div class="my-3 px-2 card">
                <div class="p-3" style="border-bottom: solid 1px lightgray">
                    <div class="row" >
                        <div class="col-4">
                            <img src="{{$item->url_logo}}" width="120px" alt="universidades" class="my-2">
                        </div>
                        <div class="col-8">
                            <p class="my-2 fs-5 fw-bold">{{$item->nombre_oferta}}</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col p-3" >
                                    <div>
                                        <span class="subtitulos">Jornadas</span>
                                        <p>{{$item->jornadas == 1 ? "Diurna" : ($item->jornadas == 2 ? "Nocturna" : "mixta")}}</p>
                                    </div>
                                    <div>
                                        <span class="subtitulos">Ubicacion</span>
                                        <p>{{$item->nom_municipio}}</p>
                                    </div>
                                </div>
                                <div class="col p-3">
                                    <div>
                                        <span class="subtitulos">Modalidad</span>
                                        <p>{{$item->modalidad == 1 ? "Presencial" : ($item->modalidad == 2 ? "Semipresencial" : "Virtual")}}</p>
                                    </div>
                                    <div>
                                        <span class="subtitulos">Tipo</span>
                                        <p>{{$item->nombre_oferta}}</p>
                                    </div>
                                </div>
                                <div class="col p-3">
                                    <div>
                                        <span class="subtitulos">Semestres</span>
                                        <p>{{$item->semestres}}</p>
                                    </div>
                                    <div>
                                        <span class="subtitulos">Homologaciones</span>
                                        <p>{{$item->convenios}}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 p-3" style="border-left: solid 1px lightgray">
                            <div>
                                <span class="subtitulos">Descuentos</span>
                                <p>{{$item->descuentos == 1 ? "Si" : "No"}}</p>
                            </div>
                            <div>
                                <span class="subtitulos">$ Aproximado</span>
                                <p>{{$item->precio_aproxim}}</p>
                            </div>
                            <div>
                                <button class="unstyle btn-oferta">ver oferta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</div>

   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>

    function buscar(){
        let offer = $("#offer-academic").val();
        let tabbla = $("#tabbla-academic").val();
        console.log('prueba', offer);
      $.ajaxSetup({
          headers:{
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url : 'http://127.0.0.1:8000/api/academic_offers',
          data : { offer : offer },
          type : 'POST',
          dataType : 'json',
          success : function(response) {
            const jornadas = {
                                "1": "Diurna",
                                "2": 'Nocturna',
                                "3": "Mixta"
                            };
            const modalidades = {
                                "1": "Presencial",
                                "2": 'Semipresencial',
                                "3": "Virtual"
                            };
            let tabla = ``;
            response.forEach(function(item, index) {
            let descriptor = Object.getOwnPropertyDescriptor(jornadas, item.jornadas);
            let modalidad = Object.getOwnPropertyDescriptor(modalidades, item.modalidad);
          
            tabla += `<div class="my-3 px-2 card">
                <div class="p-3" style="border-bottom: solid 1px lightgray">
                    <div class="row" >
                        <div class="col-4">
                            <img src="${item.url_logo}" width="120px" alt="universidades" class="my-2">
                        </div>
                        <div class="col-8">
                            <p class="my-2 fs-5 fw-bold">${item.nombre_oferta}</p>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-9">
                            <div class="row">
                                <div class="col p-3" >
                                    <div>
                                        <span class="subtitulos">Jornadas</span>
                                        <p>${descriptor.value}</p>
                                    </div>
                                    <div>
                                        <span class="subtitulos">Ubicacion</span>
                                        <p>${item.nom_municipio}</p>
                                    </div>
                                </div>
                                <div class="col p-3">
                                    <div>
                                        <span class="subtitulos">Modalidad</span>
                                        <p>${modalidad.value}</p>
                                    </div>
                                    <div>
                                        <span class="subtitulos">Tipo</span>
                                        <p>${item.tipo}</p>
                                    </div>
                                </div>
                                <div class="col p-3">
                                    <div>
                                        <span class="subtitulos">Semestres</span>
                                        <p>${item.semestres}</p>
                                    </div>
                                    <div>
                                        <span class="subtitulos">Homologaciones</span>
                                        <p>${item.convenios == null ? "Ninguno" : item.convenios}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 p-3" style="border-left: solid 1px lightgray">
                            <div>
                                <span class="subtitulos">Descuentos</span>
                                <p>${item.descuentos == 1 ? "Si" : "No"}</p>
                            </div>
                            <div>
                                <span class="subtitulos">$ Aproximado</span>
                                <p>${item.precio_aproxim.toLocaleString('es')}</p>
                            </div>
                            <div>
                                <button class="unstyle btn-oferta">ver oferta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
                $('#universities').empty()
                $('#universities').html(tabla)
            });


            /*$.each(response, (index, element)=>{
    
                tabla += `<div class="my-3 card">
                <div class="border p-3">
                    universidad
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-9 border">
                            <div class="row">
                                <div class="col p-3">
                                    <div>
                                        jornadas:
                                    </div>
                                    <div>
                                        ubicacion:s
                                    </div>
                                </div>
                                <div class="col p-3">
                                    <div>
                                        modalidad:
                                    </div>
                                    <div>
                                        tipo:
                                    </div>
                                </div>
                                <div class="col p-3">
                                    <div>
                                        semestres:
                                    </div>
                                    <div>
                                        Homologaciones:
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 border p-3">
                            <div>
                                descuentos:
                            </div>
                            <div>
                                precio aproximado
                            </div>
                            <div>
                                <button>ver oferta</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`;
                $('#universities').html(tabla)
              });*/

          },
      
          error : function(jqXHR, status, error) {
              alert('Disculpe, existió un problema');
          },
      });
        
    }

    function loadUniversities(){
        //
    }

</script>
</body>
</html>