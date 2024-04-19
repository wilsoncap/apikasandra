<x-app-layout>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-7 py-2" id="test_one">
                <h2>Test 1</h2>
               <x-form >
                    @csrf
                    @foreach ($prueba as $answer)
                        <div style="border: 1px solid red; color: white">
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
            <div class="col-md-3 py-2" style="text-align: center" id="detalle">
                <h2>Detalle</h2>
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
                var datos = $(this).serialize();
                console.log('datos: ', datos);
                // Enviar los datos al servidor
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/result_test',
                    method: 'POST',
                    data: datos,
                    success: function(respuesta) {
                        console.log('respuesta: ', respuesta);
                        let {results, dataTest} = respuesta
                        console.log('=======================');
                        console.log('results: ', results);
                        console.log('dataTest: ', dataTest);
                        let accordionExample = $('accordionExample')
                        $.each(results, function(index, item) {
                            console.log("results: ", item);
                            var itemAcordion = `
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="heading${index}">
                                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${index}" aria-expanded="false" aria-controls="collapse${index}">
                                                        ${item.human_intelligence}
                                                    </button>
                                                </h2>
                                                <div id="collapse${index}" class="accordion-collapse collapse" aria-labelledby="heading${index}" data-bs-parent="#accordion">
                                                    <div class="accordion-body">
                                                        prueba
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
    </script>
    @endpush


</x-app-layout>