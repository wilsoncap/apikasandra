<x-app-layout>
    <div class="container" style="margin-top: 90px;">
        <div class="row">
            <div class="col-md-7 py-2" id="test_one">
                <h2 class="titulo-2">Test 1</h2>
               <x-form >
                    @csrf
                    @foreach ($prueba as $answer)
                        <div style="border: 1px solid rgb(56, 56, 56); color: white">
                            <div>
                                <p>{{$answer->question_description}}</p>
                            </div>
                            @foreach ($data as $item)
                                @if ($answer->id == $item['qId'])
                                <label
                                for="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}"
                                >{{$item['description']}}
                                </label>
                                <input
                                type="radio"
                                name="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}"
                                id="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}">
                                    
                                @endif
                            @endforeach
                        </div>
                    @endforeach
               </x-form>
            </div>
            
            <div class="col-md-4 py-2 " style="text-align: center; border: 1px solid rgb(61, 61, 61)" id="detalle">
                <h2 class="titulo-2">Detalle</h2>
                <h3 class="ocultar" id="message" style="color: white">¡Felicidades! Estas son las inteligencias donde mejor aplicas los conocimientos académicos.</h3>
                <div class="accordion" id="accordionExample">
                </div>
            </div>
        </div>
    </div>



    @push('js')
    <script>
        $(document).ready(function(){

            $('#formulario').submit(function(e) {
                e.preventDefault();

                // Capturar todos los datos del formulario
                var datos = $(this).serialize();;
                // Enviar los datos al servidor
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/result_test',
                    method: 'POST',
                    data: datos,
                    success: function(respuesta) {
                        let {results, dataTest} = respuesta
                        let accordionExample = $('accordionExample')
                        
                        $.each(results, function(index, item) {
                            $('#message').show('slow');
                            let {academicoffers} = item
                            console.log('academicoffers: ', academicoffers);
                            listoffers = ``
                            academicoffers.forEach(item => {
                                console.log('itemForeach: ', item.nombre_oferta);
                                listoffers +=`<li style="text-align: left; margin-bottom: 3px;"><a href="#" class="icon-carrera" onclick="buscarOferta('${item.nombre_oferta}')">${item.nombre_oferta}</a></li>`
                            })
                            

                            console.log("results: ", item);
                            let itemAcordion = `
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading${index}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${index}" aria-expanded="false" aria-controls="collapse${index}">
                                                        ${item.human_intelligence}
                                                    </button>
                                                </h2>
                                                <div id="collapse${index}" class="accordion-collapse collapse" aria-labelledby="heading${index}" data-bs-parent="#accordion">
                                                    <div class="accordion-body">
                                                        <ul>
                                                            ${listoffers}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        `;
                            $('#accordionExample').append(itemAcordion)
                        });
                    }
            });
    });
        })

        const buscarOferta = (oferta) =>{
            console.log('oferta', oferta);

             // Construir la URL con el parámetro oferta
            const url = 'http://127.0.0.1:8000/search_offers_academis?oferta=' + encodeURIComponent(oferta);
            // Abrir la URL en una nueva pestaña
            window.open(url, '_blank');
        }
    </script>
    @endpush


</x-app-layout>