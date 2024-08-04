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
            margin-bottom: 2px;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }

        .btn-save{
            margin-left: 16rem;
            border: none;
            padding: 8px 1.9rem;
            border-radius: 10rem;
            background-color: #40074d;
            color: white;
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

        .btn-page{
            border: none;
            border-radius: 2rem;
            background-color: #121F3D;
            color: white;
        }

        /* progressbart */
        .progress-container {
            width: 80px;
            height: 600px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
            display: flex;
            flex-direction: column-reverse; /* Invierte la dirección del flujo de los hijos */
        }

        .progress-bar {
            width: 100%;
            height: 0;
            background-color: #76c7c0;
            transition: height 0.3s ease;
        }

        .radio-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .radio-buttons label {
            cursor: pointer;
        }

        .radio-buttons input[type="radio"] {
            margin-right: 10px;
        }



    </style>
    <div class="container" style="margin-top: 90px;">
        <div class="row">
            <div class="col-md-7 py-2" id="test_one">
                <h2 class="titulo-2" style="margin-left: 4rem;">Test 1</h2>

                <div id="form-container">
                    <x-form id="question-form">
                            @csrf
                                <form id="question-form">
                                @foreach ($prueba as  $group)
                                    <div class="question-group">
                                            {{-- Pintamos pintamos las 9 preguntas --}}
                                     @foreach ($group as $index1 => $answer)
                                                <div>
                                                    <p style="color: white; margin-bottom: 0.2rem;">{{$answer->question_description}}</p>
                                                </div>
                                                  
                                                <div class="question">

                                            @for ($i = 0; $i <= 1; $i++)
                                                @if ($i == 0)
                                                    <input
                                                        type="radio"
                                                        name="Pregunta_{{$answer->id}}"
                                                        data-response="{{$answer->human_intelligence_id}}_verdadero_{{$i}}"
                                                        id="radio-teal_{{$answer->id - 1}}_{{$i}}"
                                                    />
                                                    <label for="radio-teal_{{$answer->id - 1}}_{{$i}}"><i class="material-icons">mood</i>Verdadero </label>
                                                @else
                                                    <input
                                                        type="radio"
                                                        name="Pregunta_{{$answer->id}}"
                                                        data-response="{{$answer->human_intelligence_id}}_falso_{{$i}}"
                                                        id="radio-pink_{{$answer->id - 1}}_{{$i}}"
                                                        value="pink"
                                                    />
                                                    <label for="radio-pink_{{$answer->id - 1}}_{{$i}}"><i class="material-icons">sentiment_dissatisfied</i>Falso</label>
                                                    
                                                @endif
                                            @endfor

                                            </div>
                                            @endforeach
                                        </div>
                                    @endforeach

                        <div class="buttons">
                            <button type="button" class="btn-page" id="prev-btn" onclick="showPreviousGroup()">Anterior</button>
                            <button type="button" class="btn-page" id="next-btn" onclick="showNextGroup()">Siguiente</button>
                        </div>
                    </x-form>
                </div>


            </div>
            <div class="col-md-4 py-2 " style="text-align: center; border: 1px solid rgb(61, 61, 61)" id="detalle">
                <h2 class="titulo-2 ocultar">Detalle</h2>
                <h3 class="ocultar" id="message" style="color: white">¡Felicidades! Estas son las inteligencias donde mejor aplicas los conocimientos académicos.</h3>
                <div class="accordion" id="accordionExample">
                </div>
                <div>
                        <div class="container" style="display: flex;flex-direction: column;align-items: center;" id="progress_bar">
                            <div class="progress-container">
                                <div id="progress-bar" class="progress-bar"><p style="color:#121F3D; font-size: 2rem"><span id="porcentaje">0</span>%</p></div>
                            </div>
                            <div class="radio-buttons">
                                <h2 style="color: #ddd">Preguntas Respondidas</h2>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>



    @push('js')
    <script>
        $(document).ready(function(){

            const progressBar = $('#progress-bar');
            const $radioButtons = $('input[name="progress"]');

            // $radioButtons.on('change', function() {
            //     const value = $(this).val();
            //     console.log('value:', value);
            //     progressBar.css('height', `${value}%`);
            // });

            $('input[name^="Pregunta_"]').change(function() {
                // Contar los radio buttons seleccionados
                const cantidadPreguntas = 77;
                const cantidadSeleccionados = $('input[name^="Pregunta_"]:checked').length;
                let porcentaje = Math.round((cantidadSeleccionados / cantidadPreguntas) * 100) 
                $("#porcentaje").text(porcentaje);
                progressBar.css('height', `${porcentaje}%`);
            });

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

                $.ajax({
                    url: 'http://127.0.0.1:8000/api/result_test',
                    method: 'POST',
                    data: formData,
                    success: function(respuesta) {
                        let {results, dataTest} = respuesta
                        let accordionExample = $('accordionExample')
                        
                        if (results.length > 0) {
                            $('#message').show('slow');
                            $('#progress_bar').hide('slow');
                            $.each(results, function(index, item) {
                                let {academicoffers} = item
                                //console.log('academicoffers: ', academicoffers);
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