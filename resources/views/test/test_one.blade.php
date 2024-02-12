<x-app-layout>


    <div class="container my-4">
        <div class="row">
            <div class="col-md-7 offset-md-3 py-2" id="test_one">
                <h2>Test 1</h2>
                @php
                    //dd('data', $testOne, $answers);
                @endphp
               
               <x-form >
                    @csrf
                    @foreach ($testOne as $answer)
                        @if ($loop->first)
                            @continue
                        @endif
                        <div style="border: 1px solid red; color: white">
                            <div>
                                <p>{{$answer->question_description}}</p>
                            </div>
                            @foreach ($answers as $item)
                                <label for="">{{$item}}</label>
                                <input type="radio" name="{{$item}}_{{$answer->id}}" id="">
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
            console.log('prueba sistemas');
            $('#formulario').submit(function(e) {
                e.preventDefault();

                // Capturar todos los datos del formulario
                var datos = $(this).serialize();
                console.log('datos: ', datos);
                //return

                // Enviar los datos al servidor
                $.ajax({
                    url: 'http://127.0.0.1:8000/api/result_test',
                    method: 'POST',
                    data: datos,
                    success: function(respuesta) {
                        // Procesar la respuesta del servidor
                    }
            });
    });
        })
    </script>
    @endpush


</x-app-layout>