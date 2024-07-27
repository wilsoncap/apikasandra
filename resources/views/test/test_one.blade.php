<x-app-layout>
    @push('css')
    <style>

        
        #form-container {
            max-width: 600px;
            margin: auto;
        }

        .question-group {
            display: none; /* Oculta todos los grupos por defecto */
        }

        .question {
            margin-bottom: 15px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        button:disabled {
            background-color: #ddd;
            cursor: not-allowed;
        }

        i {
        display: inline;
        vertical-align: middle;
        }

        /* Radio Button */
        input[type="radio"] {
        position: relativ;
        display: none;
        }

        input[type="radio"] + label {
        min-width: 45px;
        height: 25px;
        margin: 8px;
        padding: 1px 8px;
        border-radius: 25px;
        position: relative;
        }

        /* input[type="radio"]#radio-pink + label { */
        input[type="radio"][id^="radio-pink_"] + label {
        background-color: #e83f7759;
        color: #ffffff;
        }

        input[type="radio"]#radio-indigo + label {
        background-color: #E8EAF680;
        color: #3F51B5;
        }

        input[type="radio"]#radio-cyan + label {
        background-color: #E0F7FA80;
        color: #00BCD4;
        }

        input[type="radio"][id^="radio-teal_"] + label {
            background-color: #00968742;
            color: #009688;
        }

        input[type="radio"]#radio-lime + label {
        background-color: #F9FBE780;
        color: #CDDC39;
        }

        input[type="radio"]#radio-deep-orange + label {
        background-color: #FBE9E780;
        color: #FF5722;
        }


        /*hover, checked, focus*/

        input[type="radio"][id^="radio-pink_"]:hover + label,
        input[type="radio"][id^="radio-pink_"]:checked + label,
        input[type="radio"][id^="radio-pink_"]:focus + label{
        cursor: pointer;
        background-color: #f24f85fc;
        color: #FFFFFF;
        }

        input[type="radio"]#radio-indigo:hover + label,
        input[type="radio"]#radio-indigo:checked + label,
        input[type="radio"]#radio-indigo:focus + label{
        cursor: pointer;
        background-color: #3F51B5;
        color: #FFFFFF;
        }
        input[type="radio"]#radio-cyan:hover + label,
        input[type="radio"]#radio-cyan:checked + label,
        input[type="radio"]#radio-cyan:focus + label{
        cursor: pointer;
        background-color: #00BCD4;
        color: #FFFFFF;
        }

        input[type="radio"][id^="radio-teal_"]:hover + label,
        input[type="radio"][id^="radio-teal_"]:checked + label,
        input[type="radio"][id^="radio-teal_"]:focus + label{
        cursor: pointer;
        background-color: #009688;
        color: #FFFFFF;
        }

        input[type="radio"]#radio-lime:hover + label,
        input[type="radio"]#radio-lime:checked + label,
        input[type="radio"]#radio-lime:focus + label{
        cursor: pointer;
        background-color: #CDDC39;
        color: #FFFFFF;
        }

        input[type="radio"]#radio-deep-orange:hover + label,
        input[type="radio"]#radio-deep-orange:checked + label,
        input[type="radio"]#radio-deep-orange:focus + label{
        cursor: pointer;
        background-color: #FF5722;
        color: #FFFFFF;
        }


    </style>
    <div class="container" style="margin-top: 90px;">
        @php
            //dd($data);
        @endphp
        <div class="row">
            <div class="col-md-7 py-2" id="test_one">
                <h2 class="titulo-2">Test 1</h2>

                <div id="form-container">
                    <x-form id="question-form">
                            @csrf
                                <form id="question-form">
                                    @foreach ($prueba as  $group)
                                    @php
                                        //dd('item_', $items);
                                    @endphp
                                    {{-- <div class="question-group"> --}}
                                        <div class="question-group">
                                            @foreach ($group as $index1 => $answer)
                                                @php
                                                    //dd('item_', $question);
                                                @endphp
                                                <div>
                                                    <p>{{$answer->question_description}}</p>
                                                </div>
                                                  
                                                <div class="question">
                                                @foreach ($data as $index2 => $item)
                                                        @if ($item['description'] == 'verdadero')
                                                            @php
                                                                
                                                            @endphp
                                                            <p>{{$item['description']}}</p>
                                                            <input
                                                                type="radio"
                                                                name="Pregunta_{{$index1}}"
                                                                data-response="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}"
                                                                id="radio-teal_{{$index1}}_{{$index2}}"
                                                            />
                                                            <label for="radio-teal_{{$index1}}_{{$index2}}"><i class="material-icons">mood</i>{{$item['description']}}</label>
                                                        @else
                                                            <input
                                                                type="radio"
                                                                name="Pregunta_{{$index1}}"
                                                                data-response="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}"
                                                                id="radio-pink_{{$index1}}_{{$index2}}"
                                                                value="pink"
                                                            />
                                                            <label for="radio-pink_{{$index1}}_{{$index2}}"><i class="material-icons">sentiment_dissatisfied</i>Falso</label>
                                                            
                                                        @endif
                                                        @endforeach
                                                    </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                

                            {{-- @foreach ($prueba as $index1 => $answer)
                                <div style="border: 1px solid rgb(56, 56, 56); color: white">
                                    <div>
                                        <p>{{$answer->question_description}}</p>
                                    </div>
                                    @foreach ($data as $index2 => $item)
                                        @if ($answer->id == $item['qId'])
                                            @if ($item['description'] == 'verdadero')
                                                <input
                                                    type="radio"
                                                    name="Pregunta_{{$index1}}"
                                                    data-response="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}"
                                                    id="radio-teal_{{$index1}}_{{$index2}}"
                                                />
                                                <label for="radio-teal_{{$index1}}_{{$index2}}"><i class="material-icons">mood</i>{{$item['description']}}</label>
                                            @else
                                                <input
                                                    type="radio"
                                                    name="Pregunta_{{$index1}}"
                                                    data-response="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}"
                                                    id="radio-pink_{{$index1}}_{{$index2}}"
                                                    value="pink"
                                                />
                                                <label for="radio-pink_{{$index1}}_{{$index2}}"><i class="material-icons">sentiment_dissatisfied</i>Falso</label>
                                            @endif
        
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach --}}

                        {{-- @foreach ($prueba as $answer)
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
                        @endforeach --}}

                        <div class="buttons">
                            <button type="button" id="prev-btn" onclick="showPreviousGroup()">Anterior</button>
                            <button type="button" id="next-btn" onclick="showNextGroup()">Siguiente</button>
                        </div>
                    </x-form>
                </div>


            </div>
            
             {{-- <label
                                for="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}"
                                >{{$item['description']}}
                                </label>
                                <input
                                type="radio"
                                name="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}"
                                id="{{$answer->human_intelligence_id}}_{{$item['description']}}_{{$item['qId']}}"> --}}


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
                var formData = $(this).serializeArray();

                 // Añadir los atributos data-response de los radio buttons seleccionados
                $(this).find('input[type="radio"]:checked').each(function() {
                    var responseValue = $(this).data('response'); // Captura el valor de data-response
                    var name = $(this).attr('name'); // Obtiene el nombre del radio button

                    // Añadir al array serializado
                    formData.push({
                        name: name + '_response', // Añade un sufijo al nombre para diferenciarlo
                        value: responseValue
                    });
                });

                console.log('formData: ', formData);

                // Convertir el array de objetos en un string para enviar al servidor
                //var serializedData = $.param(serializedData);


                //console.log('serializedData: ', serializedData);
                //return
                // Enviar los datos al servidor
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/result_test',
                    method: 'POST',
                    data: formData,
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




        // paginacion
        let currentGroupIndex = 0;
        const questionGroups = document.querySelectorAll('.question-group');
        const prevButton = document.getElementById('prev-btn');
        const nextButton = document.getElementById('next-btn');

        // Función para mostrar el grupo de preguntas actual
        function showCurrentGroup() {
            questionGroups.forEach((group, index) => {
                group.style.display = index === currentGroupIndex ? 'block' : 'none';
            });

            // Deshabilita el botón "Anterior" si estamos en el primer grupo
            prevButton.disabled = currentGroupIndex === 0;

            // Deshabilita el botón "Siguiente" si estamos en el último grupo
            nextButton.disabled = currentGroupIndex === questionGroups.length - 1;
        }

        // Función para mostrar el grupo de preguntas anterior
        function showPreviousGroup() {
            if (currentGroupIndex > 0) {
                currentGroupIndex--;
                showCurrentGroup();
            }
        }

        // Función para mostrar el siguiente grupo de preguntas
        function showNextGroup() {
            if (currentGroupIndex < questionGroups.length - 1) {
                currentGroupIndex++;
                showCurrentGroup();
            }
        }

        // Mostrar el primer grupo de preguntas al cargar la página
        showCurrentGroup();

    </script>
    @endpush


</x-app-layout>