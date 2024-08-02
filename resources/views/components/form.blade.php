<form action="{{ route('result_test') }}" method="POST" id="formulario">

    {{$slot}}

    <input class="btn-save" type="submit" value="Guardar">

</form>