@extends('layouts.app')

@section('content')
<h2 class="title-aula">Titulo da Aula bem grandão</h2>
<div id="aula">

    
    <div class="video">

        <iframe src="https://www.youtube.com/embed/2mrRqwwiLAE?si=7P8Yv391M2VBzHkG" title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
    

    <div class="modulos">


        <div class="card">
            <div class="card-body">


            
                <div class="row mb-3">
                    <div class="col">
                        <button class="btn btn-secondary w-100" data-bs-toggle="collapse" href="#mod_1" role="button" aria-expanded="false" aria-controls="mod_1">
                            Modulo 1
                        </button>

                        <div class="collapse " id="mod_1">
                            <ul class="">
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="">Aula 1</a>
                                    <i class="fa-regular fa-circle-check text-success"></i>
                                </li>
                                <li class=" d-flex justify-content-between align-items-center">
                                    <a href="">Aula 1</a>
                                    <i class="fa-regular fa-circle text-secondary"></i>
                                </li>
                                <li class=" d-flex justify-content-between align-items-center">
                                    <a href="">Aula 3</a>
                                    <i class="fa-regular fa-circle text-secondary"></i>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <button class="btn btn-secondary w-100" data-bs-toggle="collapse" href="#mod_2" role="button" aria-expanded="false" aria-controls="mod_2">
                            Modulo 2
                        </button>

                        <div class="collapse " id="mod_2">
                            <ul class="">
                                <li class="d-flex justify-content-between align-items-center">
                                    <a href="">Aula 1</a>
                                    <i class="fa-regular fa-circle-check text-success"></i>
                                </li>
                                <li class=" d-flex justify-content-between align-items-center">
                                    <a href="">Aula 1</a>
                                    <i class="fa-regular fa-circle text-secondary"></i>
                                </li>
                                <li class=" d-flex justify-content-between align-items-center">
                                    <a href="">Aula 3</a>
                                    <i class="fa-regular fa-circle text-secondary"></i>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
 

</script>
@endsection