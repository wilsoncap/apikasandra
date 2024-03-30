<x-app-layout>


    <div class="container my-4">
        <div class="row">
            <div class="col-md-7 offset-md-3 py-2" id="test_one">
                <h2>Test 1</h2>
                @php
                 //dd('data', $prueba, $data);
                @endphp
               
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
                    }
            });
    });
        })
    </script>
    @endpush


</x-app-layout>