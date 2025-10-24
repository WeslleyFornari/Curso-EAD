@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
<div class="col-md-12">
                

<div class="card">
     <div class="card-body">

                <div class="row mb-3">
                    <div class="col-7 ps-4 my-2">
                        <h4>Plano</h4>          
                    </div>
                </div>

            
<!--EDITAR-->
        <form action="{{route('admin.planos.update', ['id' => $plano->id] )}}" id="update-planos" enctype="multipart/form-data">
        @csrf
                <input type="hidden" name="id" value="{{$plano->id}}">
            <div class="row my-2">
                
                <div class="col-md-3 col-12 ps-5">
                        <label for="exampleInputFile" class="control-label">
                        Imagem do Plano <small>(200 x 350px)</small>
                        </label>
                        <x-upload-file target="logo" collum="media_id" :media="@$plano" type="single"/>
                </div>

                <div class="col-md-9 col-12">
                    <div class="row">
                            <div class="col-12 form-group">
                                <span class="titulo text-white">Nome *</span>          
                                <input type="text" name="name" id="name" value="{{ $plano->name ?? ''}}" class="custom-input" required>  
                            </div>

                            <div class="col-6 form-group">
                                <span class="titulo text-white">Preço *</span>          
                                <input type="text" name="preco" id="preco" value="{{ getMoney($plano->preco ?? '') }}" class="moneyMask custom-input" required>  
                                <div id="error-message" class="text-danger" style="display: none;"></div> <!-- Mensagem de erro -->
                            </div>
                            <div class="col-6 form-group">
                            <span class="titulo text-white">Link *</span> <span class="float-end"><a href="https://app.go2pay.com.br/login" target="_blank">Ir para Go 2 Pay</a></span>         
                            <input name="link" required id="link" class="custom-input" value="{{$plano->link}}">
                        </div>

                            <div class="col-12 form-group">
                                <span class="titulo text-white"> Descricao do Curso *</span>          
                                <input type="text" name="descricao" id="descricao" value="{{ $plano->descricao ?? ''}}" class="custom-input" required>  
                            </div>
                    </div>
                </div>
            </div>
    <hr>  

            <div class="row mb-2">
                    <div class="col-7 ps-4 my-2">
                        <h4>Cursos</h4>          
                    </div>
            </div>
        <!-- Relação de Cursos -->

            <div class="row px-3 my-3">
            @foreach($trilhas as $k => $trilha)

            
                <div class="list-group col-auto mx-4 my-3">
                    <h6 class="text-warning text-center">{{ $trilha->name }}</h6>

                    @foreach($trilha->cursos as $k => $curso)
                        <label class="list-group-item">
                        <input class="form-check-input me-1" type="checkbox" name="cursos[]" value="{{ $curso->id }}"
                               @if(in_array($curso->id, $cursosIds)) checked @endif />
                           {{$curso->titulo}}
                        </label>
                    @endforeach
                </div>
            @endforeach
            </div>
<hr>
            <div class="row justify-content-end">
                <div class="col-md col-6">
                    <a href="{{ route('admin.planos.index') }}" class="btn btn-outline-light">Voltar</a>
                </div>
                <div class="col-md col-6 text-end"> 
                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Salvar</button>
                </div>
            </div>
            
        </form>
          

    </div>
 </div>

</div>
</div>
@endsection


@section('scripts')
<script>
    $("body").on('input', '#preco', function() {
        var value = $(this).val(); 
        var $errorMessage = $('#error-message');
        console.log(value);
        console.log(value.length);

        if (value.length > 10) {
            $errorMessage.text('O valor deve ser menor que R$ 1.000.000.000,00'); // Mensagem de erro
            $errorMessage.show(); 
        } else {
            $errorMessage.text(''); 
            $errorMessage.hide(); 
        }
    });
$(document).ready(function() {

// ATUALIZAR
        $("body").on('submit','#update-planos', function(e) {

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
                    text: "Plano atualizado com sucesso!.",
                    icon: "success",
                }).then(function() {

                    $("#update-planos")[0].reset();
                    window.location.href = '{{route("admin.planos.index")}}';
                });               
            }, 

            error: function (err) {
                console.log(err);

                if (err.status == 422) { 
                    console.log(err.responseJSON);
                    $('#success_message').fadeIn().html(err.responseJSON.message);
                
                    console.warn(err.responseJSON.errors);
                
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span class="error" style="color: red; font-size:12px; font-weight: bold; margin-left:10px; border: none;">' + error[0] +
                            '</span>'));
                    });
                }
            }
        });
        });
    






});
</script>
@endsection







  