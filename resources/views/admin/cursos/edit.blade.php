@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">


        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-7 ps-4 my-2">
                        <h4>Curso</h4>
                    </div>
                </div>


                <!--EDITAR-->
                <form action="{{route('admin.cursos.update', ['id' => $curso->id] )}}" id="update-cursos" enctype="multipart/form-data">
                    @csrf

                    <div class="row my-2">
                        <div class="col-md-3 col-12">
                            <label for="exampleInputFile" class="control-label">
                                Imagem do Curso <small>(360 x 480px)</small>
                            </label>
                            <x-upload-file target="logo" collum="media_id" :media="@$curso" type="single" />
                        </div>
                        <div class="col-md-9 col-12">
                            <div class="form-group my-2">
                                <span class="titulo"> Trilha: </span>
                                {{$curso->trilha->name}}
                            </div>
                            <div class="form-group">
                                <span class="titulo"> Título do Curso *</span>
                                <input type="text" name="titulo" id="titulo" value="{{$curso->titulo}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <span class="titulo"> Descrição do Curso *</span>
                                <input type="text" name="descricao" id="descricao" value="{{$curso->descricao}}" class="form-control" required>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-2 col-12">
                                    <h4 class="text-warning text-center">Planos *</h4>
                                </div>
                                <div class="col-md-10">
                                    <div class="row">
                                        @foreach($planos as $k => $plano)
                                        <div class="col-auto m-2">
                                            <input type="checkbox" name="planos[]" value="{{ $plano->id }}"
                                                @if(in_array($plano->id, $planosIds)) checked @endif />
                                            <span class="ms-1">{{ $plano->name }}</span>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>


                    <div class="row my-2" id="lista-Modulos"> <!-- LISTA DE MODULOS -->

                        @forelse($curso->modulos as $k => $modulo)
                        <div class="item-modulo my-3" data-key-modulo="{{$k}}"> <!-- Modulos filhos -->
                           
                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Módulos</h5>
                                <button class="btn btn-icon-only btn-warning close deletarModulo"><i class="fas fa-trash" aria-hidden="true"></i></button>
                            </div>
                            <strong>Título</strong>
                            <input type="text" name="modulos[{{$k}}][titulo]" value="{{ $modulo->titulo ?? '' }}" class="form-control my-3">
                            <input type="hidden" name="modulos[{{$k}}][id]" value="{{$modulo->id ?? ''}}">
                            <input type="hidden" name="modulos[{{$k}}][status]" class="status" value="{{$modulo->status ?? ''}}">
                            <div class="lista-aulas  border p-3"> <!-- LISTA DE AULAS -->
                                @foreach($modulo->aulas as $q => $aula)
                               
                                <div class="row my-2 ps-md-5 item-aula">
                                    <div class="col-12">
                                    <input type="hidden" name="modulos[{{$k }}][aulas][{{ $q }}][id]" value="{{$aula->id}}">
                                    <input type="hidden" name="modulos[{{$k }}][aulas][{{ $q }}][status]" class="status" value="{{$aula->status}}">
                                    <h5>Aulas</h5> 
                                </div>     <!-- Aulas filhas -->
                                    <div class="col-md-6 col-12">
                                        <strong>Título</strong>
                                        <input type="text" name="modulos[{{$k }}][aulas][{{ $q }}][titulo]" value="{{ $aula->titulo ?? '' }}" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-12 wraper-video">
                                        <strong>Link</strong>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#modalYoutubeTutorial" class="float-end">qual link devo usar?</a>
                                            <input type="text" class="form-control link-youtuve"  placeholder="Cole o link do youtube aqui">
                                            
                                            <div class="video-preview">
                                                @if(@$aula->link)
                                            <iframe width="200" height="130" src="https://www.youtube.com/embed/{{ $aula->link ?? '' }}" frameborder="0" allowfullscreen></iframe>
                                                @endif
                                            </div>
                                           
                                        <input type="hidden" name="modulos[{{ $k }}][aulas][{{ $q }}][link]" value="{{ $aula->link ?? '' }}" class="link form-control">
                                    </div>
                                    <div class="col-md-1 col-12 text-center pe-3 py-4">
                                        <button class="btn btn-icon-only btn-danger close deletarAulas"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="row mt-2 ps-md-5">
                                <div class="col-md col-12 text-center">
                                    <button class="btn btn-primary addAulas btn-sm">Adicionar aula</button>
                                </div>
                            </div>
                        </div>
                        @empty


                        <div class="item-modulo my-3"> <!-- Modulos filhos -->

                            <div class="d-flex justify-content-between align-items-center">
                                <h5>Módulos</h5>
                                <button class="btn btn-icon-only btn-warning close deletarModulo"><i class="fas fa-trash" aria-hidden="true"></i></button>
                            </div>
                            <strong>Título</strong>
                            <input type="text" name="modulos[0][titulo]" value="" class="form-control my-3">
                            <input type="hidden" name="modulos[0][id]" value="">
                            <input type="hidden" name="modulos[0][status]" value="ativo">
                            <div class="lista-aulas  border"> <!-- LISTA DE AULAS -->

                                <div class="row my-2 ps-md-5"> <!-- Aulas filhas -->
                                <input type="hidden" name="modulos[0][aulas][0][id]" value="">
                                <input type="hidden" name="modulos[0][aulas][0][status]" value="ativo">
                                    <h5>Aulas</h5>
                                    <div class="col-6">
                                        <strong>Título</strong>
                                        <input type="text" name="modulos[0][aulas][0][titulo]" value="" class="form-control">
                                    </div>
                                    <div class="col-md-5 col-12 wraper-video">
                                        <strong>Link</strong>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#modalYoutubeTutorial" class="float-end">qual link devo usar?</a>
                                            <input type="text" class="form-control link-youtuve"  placeholder="Cole o link do youtube aqui">
                                            
                                            <div class="video-preview">
                                               
                                            </div>
                                           
                                        <input type="hidden" name="modulos[0][aulas][0][link]" value="" class="link form-control">
                                    </div>
                                    <div class="col-1 pe-3 py-4">
                                        <button class="btn btn-icon-only btn-danger close deletarAulas"><i class="fas fa-trash" aria-hidden="true"></i></button>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-2 ps-md-5">
                                <div class="col">
                                    <button class="btn btn-primary addAulas">Adicionar aula</button>
                                </div>
                            </div>
                        </div>
                        @endforelse

                        <!-- Adiciona item-modulo -->

                    </div>
                    <!-- END LISTA-MODULOS -->



                    <div class="row my-4">
                        <div class="col-md col-12 text-center">
                            <button class="btn btn-primary addModulos">Adicionar Modulos</button>
                        </div>
                    </div>





                    <div class="row ">

                        <div class="col-md col-6 text-start">
                        <a href="{{ route('admin.cursos.index') }}" class="btn btn-outline-light">Voltar</a>                        </div>

                        <div class="col-md col-6 text-end">
                            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Atualizar</button>
                        </div>
                    </div>

                </form>


            </div>
        </div>

    </div>
</div>


<div class="modal fade" id="modalYoutubeTutorial" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Qual link usar?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-sm-6 col-12">
                <img src="{{asset('assets/img/link-youtube-01.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-sm-6 col-12">
            <img src="{{asset('assets/img/link-youtube-02.jpg')}}" class="img-fluid" alt="">
            </div>
        </div>
        <img src="" alt="">
      </div>
     
    </div>
  </div>
</div>


@endsection


@section('scripts')
<script>
    $(document).ready(function() {

        
      

        // Add Aulas
        $("body").on('click', '.addAulas', function(e) {
            e.preventDefault();
            var q = $(this).closest('.item-modulo').find(".item-aula").length;
            var k = $(this).closest('.item-modulo').data('key-modulo');
            q++;
         

            var aula = `<div class="row my-2 ps-5 item-aula">
                            <input type="hidden" name="modulos[${k}][aulas][${q}][id]" value="">
                            <input type="hidden" name="modulos[${k}][aulas][${q}][status]" class="status" value="ativo">
                            <h5>Aulas</h5>
                            <div class="col-6">
                                <strong>Título</strong>
                                <input type="text" name="modulos[${k}][aulas][${q}][titulo]" value="" class="form-control">
                            </div>
                             
                              <div class="col-md-5 col-12 wraper-video">
                                        <strong>Link</strong>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#modalYoutubeTutorial" class="float-end">qual link devo usar?</a>
                                            <input type="text" class="form-control link-youtuve"  placeholder="Cole o link do youtube aqui">
                                            
                                            <div class="video-preview">
                                             
                                            </div>
                                           
                                        <input type="hidden" name="modulos[${k}][aulas][${q}][link]" value="" class="link form-control">
                                    </div>

                            <div class="col-1 pe-3 py-4">
                                <button class="btn btn-icon-only btn-danger close deletarAulas"><i class="fas fa-trash" aria-hidden="true"></i></button>
                            </div>              
                        </div>`
            $(this).closest('.item-modulo').find(".lista-aulas").append(aula);

        })

        // Deletar Aulas
        $("body").on('click', '.deletarAulas', function(e) {
            e.preventDefault();

            $(this).closest('.item-aula').addClass('d-none');
            $(this).closest('.item-aula').find('.status').val('deletar')
            if($(this).closest('.item-aula').find("input[name*='id']").val() == ""){
                $(this).closest('.item-aula').remove()
            }
        })

        // Deletar Modulos
        $("body").on('click', '.deletarModulo', function(e) {
            e.preventDefault();

            $(this).closest('.item-modulo').addClass('d-none');
            $(this).closest('.item-modulo').find('.status').val('deletar');

            if($(this).closest('.item-modulo').find("input[name*='id']").val() == ""){
                $(this).closest('.item-modulo').remove()
            }
        })


        // Add MODULOS
        $("body").on('click', '.addModulos', function(e) {
            e.preventDefault();
            var k = $('.item-modulo').length;
            k++;
           

            var modulo = `
            <div class="item-modulo" data-id-modulo="">

                <div class="d-flex justify-content-between align-items-center">
                      <h5>Módulos</h5>
                      <button class="btn btn-icon-only btn-warning close deletarModulo"><i class="fas fa-trash" aria-hidden="true"></i></button>
                 </div>
                <strong>Título</strong>
                <input type="text" name="modulos[${k}][titulo]" class="form-control my-3">
                <input type="hidden" name="modulos[${k}][id]" value="">
                 <input type="hidden" name="modulos[${k}][id]" class="status" value="ativo">
                <div class="lista-aulas border">
                    <div class="row my-2 ps-5" data-aula-index="0">
                        <h5>Aulas</h5>
                        <div class="col-6">
                            <strong>Título</strong>
                            <input type="text" name="modulos[${k}][aulas][0][titulo]" class="form-control">
                            <input type="hidden" name="modulos[${k}][aulas][0][status]" class="status" value="ativo">
                        </div>
                  
                        <div class="col-md-5 col-12 wraper-video">
                                        <strong>Link</strong>
                                        <a href="" data-bs-toggle="modal" data-bs-target="#modalYoutubeTutorial" class="float-end">qual link devo usar?</a>
                                            <input type="text" class="form-control link-youtuve"  placeholder="Cole o link do youtube aqui">
                                            
                                            <div class="video-preview">
                                             
                                            </div>
                                           
                                        <input type="hidden" name="modulos[${k}][aulas][0][link]" value="" class="link form-control">
                                    </div>
                        <div class="col-1 pe-3 py-4">
                            <button class="btn btn-icon-only btn-danger close deletarAulas">
                                <i class="fas fa-trash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 ps-5">
                    <div class="col">
                        <button class="btn btn-primary addAulas">Adicionar aula</button>
                    </div>
                </div>
                </div>`;

            $("#lista-Modulos").append(modulo);
        });




        // ATUALIZAR
        $("body").on('submit', '#update-cursos', function(e) {

            e.preventDefault();
            $("span.error").remove()

            var form = $(this)[0];
            var formData = new FormData(form);

            $.ajax({

                url: $(this).attr('action'),
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,

                success: function(response) {

                    swal({
                        title: "Parábens",
                        text: "Curso atualizado com sucesso!.",
                        icon: "success",
                    }).then(function() {

                       
                       
                    });
                },

                error: function(err) {
                    console.log(err);

                    if (err.status == 422) {
                        console.log(err.responseJSON);
                        $('#success_message').fadeIn().html(err.responseJSON.message);

                        console.warn(err.responseJSON.errors);

                        $.each(err.responseJSON.errors, function(i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span class="error" style="color: red; font-size:12px; font-weight: bold; margin-left:10px; border: none;">' + error[0] +
                                '</span>'));
                        });
                    }
                }
            });
        });







    });

    $('body').on('change','.link-youtuve',function(e){
       
        $(this).closest('.wraper-video').find('.video-preview').addClass('active-preview');
        $(this).closest('.wraper-video').find('.link').addClass('active-link');

        processYoutubeUrl($(this).val())

    })

    function processYoutubeUrl(urlInput) {

    const youtubeIdInput = document.querySelector('.active-link');
    const videoPreviewDiv = document.querySelector('.active-preview');

    // Regex para capturar o ID do vídeo do YouTube
    const regex = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
    const match = urlInput.match(regex);

    if (match && match[1]) {
        const videoId = match[1];
      
        // Salva o ID no input hidden
        youtubeIdInput.value = videoId;

        // Cria o embed do vídeo
        videoPreviewDiv.innerHTML = `<iframe width="200" height="130" src="https://www.youtube.com/embed/${videoId}" frameborder="0" allowfullscreen></iframe>`;
    } else {
        // Exibe uma mensagem de erro caso o link não seja válido
        videoPreviewDiv.innerHTML = `<p style="color:red;">URL inválida. Por favor, insira um link válido do YouTube.</p>`;
    }
}

</script>
@endsection