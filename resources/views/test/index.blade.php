<x-app-layout>


    <div class="container my-0">
        <div class="row">
            <div class="col-md-12 " id="universities">
               <!-- Hero 5 - Bootstrap Brain Component ejemplo codigo arquitectura hexagonal en laravel
 -->
                <section style="background-image: url('{{ asset('images/student.png')}}'); background-size:cover; background-position:center center; ; height: 700px">
                    <div class="container">
                    <div class="row justify-content-md-center align-items-center pt-5">
                        <div class="col-12 col-md-11 col-lg-9 col-xl-8 col-xxl-7 mt-5">
                        <h1 class="display-1 text-white text-center fw-bold mt-4">Test de Aptitud</h1>
                        <p class="lead text-white text-center mb-5 d-flex justify-content-sm-center">
                            <span class="col-12 col-sm-10 col-md-8 col-xxl-7">!Genial, aquí tienes dos formas de responder. Let's start.</span>
                        </p>
                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                            <a href="{{ route('test_one')}}" class="btn bsb-btn-2xl btn-outline-light">Test Aptitud 1</a>
                            <a href="{{ route('test_two')}}" class="btn bsb-btn-2xl btn-outline-light">Test Aptitud 2</a>
                        </div>
                        </div>
                    </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <x-footer></x-footer>

</x-app-layout>