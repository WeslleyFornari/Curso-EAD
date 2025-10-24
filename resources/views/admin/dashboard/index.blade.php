@extends('layouts.app')

@section('content')

<!-- Card Trilhas -->
@foreach($trilhas as $trilha)
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $trilha->name }}</h4>
                </div>
                <div class="card-body">
                    <div class="slick-trilhas trilhas">
                        @foreach($trilha->cursos as $curso)
                            @if($curso->modulos->count() > 0)
                                <div class="item text-center text-warning">
                                    <a href="{{ auth()->user()->hasAccessToCurso($curso->id) ? route('admin.cursos.preview', ['slug' => $curso->slug]) : '#' }}"
                                       class="{{ !auth()->user()->hasAccessToCurso($curso->id) ? 'blocked-course' : '' }}"
                                       data-toggle="modal"
                                       data-target="#upgradeModal"
                                       data-curso-id="{{ $curso->id }}">
                                        @if (!auth()->user()->hasAccessToCurso($curso->id))
                                            <!-- Exibir cadeado se o usuário NÃO tiver acesso -->
                                            <div class="locked">
                                                <i class="fa-solid fa-lock"></i>
                                            </div>
                                        @endif
                                        <img src="{{ $curso->image && $curso->image->cover() ? $curso->image->cover() : asset('site/images/default.jpg') }}" alt="" style="height:300px;">
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

<!-- Modal for Upgrade Plans -->
<div class="modal fade" id="upgradeModal" tabindex="-1" role="dialog" aria-labelledby="upgradeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upgradeModalLabel">Planos Disponíveis para Upgrade</h5>
                <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Escolha um plano para obter acesso ao curso!</p>

                @foreach($planos as $plano)
                <div class="container-item pt-2">
                <div class="row mb-2 align-items-center">
                        <div class="col">
                            <strong>{{ $plano->name }}</strong>
                            <small class="d-block text-muted">{{ strlen($plano->descricao) > 50 ? substr($plano->descricao, 0, 50) . '...' : $plano->descricao }}</small>
                            </div>
                        <div class="col-auto d-grid text-end">
                            <span>R$ {{ getMoney($plano->preco) }}</span>
                            <a href="{{$plano->link}}" class="btn btn-primary btn-sm">Fazer Upgrade</a>
                        </div>
                        <div class="col-auto">
                        </div>
                    </div>
                </div>

                @endforeach

                <p class="mt-3 text-center">
                <a href="https://wa.me/{{ '55' . preg_replace('/\D/', '', $empresa->telefone_1) }}" target="_blank" class="btn btn-primary btn-sm">Falar com um consultor</a>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-modal" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
   var $trilhas =  $('.slick-trilhas').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 5,
      slidesToScroll: 1,
      variableWidth: true,
      prevArrow:'<button type="button" class="slick-prev-custom"><i class="fa-solid fa-angle-left"></i></button>',
      nextArrow:'<button type="button" class="slick-next-custom"><i class="fa-solid fa-angle-right"></i></button>',
      
      responsive: [
        {
          breakpoint: 1024, 
          settings: {
            slidesToShow: 3,
            slidesToScroll: 3,
            infinite: true,
            dots: true,
            variableWidth: false  
          }
        },
        {
          breakpoint: 600, 
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            variableWidth: false  
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: false  
          }
        }
      ]
    });

    $('.blocked-course').on('click', function(e) {
        e.preventDefault();
        $('#upgradeModal').modal('show');
    });

    $('.close-modal').on('click', function(e){
      e.preventDefault()
      $('#upgradeModal').modal('hide');
    })
</script>
@endsection
