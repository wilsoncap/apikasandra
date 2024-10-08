<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/spinner.css')}}">
    @vite([
        'resources/css/app.css', 
        'resources/css/style.css',
        'resources/js/app.js'
        ])

    <style>
        .demanda-carreras{
            position: fixed;
            top: 1;
            right: 6rem;
            left: 2;
            z-index: 1020;
        }

        .scroll-vertical {
            padding-left: 2rem;
            width: 25rem;          /* Ancho del div */
            height: 45rem;         /* Altura del div donde se aplicará el scroll */
            /*border: 1px solid #ccc;/* Borde del div para mejor visibilidad */
            overflow-y: auto;      /* Scroll vertical automático */
            padding: 10px;         /* Espacio interior del div */
            box-sizing: border-box;/* Incluye el borde y el padding en el cálculo del ancho/alto */
            /*background-color: #241e39ab; /* Color de fondo del div */
            border-radius: 10px;
            scrollbar-width: thin;
        }

        .scroll-vertical-dos {
            width: 300px;
            height: 200px;
            border: 1px solid #ccc;
            overflow-y: auto;
            padding: 10px;
            box-sizing: border-box;
            background-color: #f9f9f9;
            scrollbar-width: thin; /* Ancho del scroll */
            scrollbar-color: #888 #f1f1f1; /* Color del thumb y del track */
        }
    </style>
</head>
<body>
    
    <div class="loading ocultar" id="loading">Loading&#8230;</div>
<div class="container-fluid py-2 Regular shadow fixed-top" id="cabecera">
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
                    <li class="mx-3"><a href="{{route('search_offers_academis')}}" class="fw-bold">Ofertas Académicas</a></li>
                    <li class="mx-3"><a href="{{route('test_aptitud')}}" class="fw-bold">Test de Aptitud</a></li>
                    <li class="mx-3"><a href="{{route('prueba_qr')}}" class="fw-bold">pruebaQr</a></li>
                </ul>
            </nav>
      </div>
    </div>
</div>

<div class="container my-2" id="buscador">
    <div class="row g-5" style="margin-top: 6rem">

        <div class="col-md-3 mt-1 mr-3 demanda-carreras" style="margin-left: 1rem;">
            <h2 style="text-align: center; color: white; margin-top: 1rem">Carreras mas demandadas</h2>
            <div class="scroll-vertical">
                @foreach ($carrerasEnDemanda as $item)
                    <p style=" text-aling: center; margin-bottom: 0.4rem; color:white; padding:5px 10px; background-color: rgba(9, 119, 170, 0.439); border-radius:50px;">{{$item}}</p>
                @endforeach
            </div>
        </div>

        <div class="col-md-7 py-0" style="margin-left: 16rem" id="universities">
            
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
                                <p>{{number_format($item->precio_aproxim, 0, '', '.')}}</p>
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

    $(document).ajaxStart(function() {
        $('#loading').removeClass("ocultar");
    });

    $(document).ajaxStop(function() {
        $('#loading').addClass("ocultar");
    });

    $(document).ready(function(){
        const currentUrl = window.location.href;
        // Crea un objeto URL a partir de la URL actual
        const urlObj = new URL(currentUrl);
        // Obtiene el valor del parámetro 'oferta'
        const oferta = urlObj.searchParams.get('oferta');
        // Muestra el valor del parámetro 'oferta' en la consola
        if (oferta !== null && oferta !== undefined) {
            $("#offer-academic").val(oferta);
            $('#search').trigger('click')
        }
    })


    

    function buscar(){
        let offer = $("#offer-academic").val();
        let tabbla = $("#tabbla-academic").val();
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
            console.log('response', response);
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



            },
        
            error : function(jqXHR, status, error) {
                alert('Disculpe, existió un problema');
            },
        });
        
    }

</script>
</body>
</html>