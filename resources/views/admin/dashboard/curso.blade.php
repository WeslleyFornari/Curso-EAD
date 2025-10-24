@extends('layouts.app')

@section('assets')
<style>
    #player {
        width: 100%; 
        max-width: 800px; 
        height: 500px; 
        margin: 0 auto; 
    }

    @media (max-width: 768px) { 
        #aula {
            flex-direction: column; 
        }
        #aula .video, #aula .modulos {
            width: 100%; 
        }
    }
</style>
@endsection

@section('content')
<div class="row">
        <div class="col">
        <h2 class="title-aula"></h2> 
        </div>
    </div>
<div id="aula" class="d-flex flex-column flex-md-row"> 
   
<div class="video">
        @include('admin.dashboard._aula')
    </div>
    <div class="modulos mb-3 mb-md-0"> 
        <div class="card">
            <div class="card-body">
                @foreach($curso->modulos as $modulo)
                    <div class="row mb-3">
                        <div class="col">
                            <button class="btn btn-secondary w-100" data-bs-toggle="collapse" href="#mod_{{ $modulo->id }}" role="button" aria-expanded="false" aria-controls="mod_{{ $modulo->id }}">
                                {{ $modulo->titulo }}
                            </button>

                            <div class="collapse" id="mod_{{ $modulo->id }}">
                                <ul class="list-unstyled">
                                    @foreach($modulo->aulas as $aula)
                                        <li class="d-flex justify-content-between align-items-center">
                                            <a href="{{route('admin.cursos.getAula', ['id' => $aula->id])}}" class="getAula">{{ $aula->titulo }}</a>
                                            <i class="fa-regular fa-circle-check text-success"></i>
                                        </li>
                                    @endforeach 
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

   
</div>
@endsection

@section('scripts')
<script>
 
var player;

$("body").on('click', '.getAula', function(e) {
    e.preventDefault();
    
    var url = $(this).attr('href');

    $.get(url, function(data) {
        console.log(data);
        $(".title-aula").html(data.titulo); 

        if (typeof player !== 'undefined') {
            player.destroy(); 
        }

        $('#player').attr("data-plyr-embed-id", data.link);

        player = new Plyr('.frame-video', {
            controls: [
                'play',
                'progress',
                'current-time', 'duration',
                'mute', 'volume',
                'captions', 
                'settings', 
                'pip', 
                'airplay', 
                'fullscreen' 
            ]
        });
    });
});
</script>
@endsection
