@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

                <div class="collapse" id="collapse-Curso">
                    <div class="card shadow mb-4">
                        <div class="card-body " id="cadastro-cursos">
                  <!--      <a href="#" class="tooglegeCollapse float-right" data-target="#collapse-User"><i class="fas fa-times"></i></a> -->
                            @include('admin.cursos.cadastrar')
                        </div>
                    </div>
                </div>

                <div class="collapse" id="collapse-Curso2">
                    <div class="card shadow mb-4">
                        <div class="card-body " id="edit-cursos">
                  <!--      <a href="#" class="tooglegeCollapse float-right" data-target="#collapse-User"><i class="fas fa-times"></i></a> -->
                            @include('admin.cursos.cadastrar')
                        </div>
                    </div>
                </div>
                

        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-7 ps-4 my-2">
                        <h4>Cursos @if(request()->trilha)
                        <a href="{{ route('admin.cursos.index') }}" class="btn btn-sm btn-primary">Ver Todos</a>
                        @endif</h4>     
                        
                    </div>
                   
                    <div class="col-5 my-2 pe-4 text-end">
                    <a class="btn btn-primary tooglegeCollapse" type="button" 
                       data-target="#collapse-Curso">Cadastrar</a>
                    </div>
                </div>

                <div class="row bg-dark arial16-font text-light text-bold m-0 py-2">
                <div class="col-md-1 col-6 text-md-center">Ordem</div>
                        <div class="col-md-2 col-6">Titulo</div>
                        <div class="col-md-4 col-6 text-end text-md-center">Descrição</div>
                      
                        <div class="col-md-2 col-6 text-end text-md-center">Trilha</div>
                        <div class="col-md-2 col-6 text-md-center">Status</div>

                        <div class="col-md col-6 text-md-center text-end">Ações</div>
                </div>

                <div id="lista-Cursos">
                    @include('admin.cursos._list')
                </div>


                
              
           </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {

    
// Sortable Jquery
$("#lista-Cursos").sortable({
    
    placeholder: "ui-state-highlight",
    update: function(event, ui) {
       
        var ordem = [];
console.log(ordem)
    
        $(".curso-item").each(function(index) {
            var id = $(this).data('id');
            ordem.push({ id: id, ordem: index + 1 });
        });

        $.ajax({
            url: "{{ route('admin.cursos.update.order') }}", 
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                ordem: ordem
            },
            success: function(response) {
                if (response.success) {
                    swal('Ordem atualizada com sucesso!');
                } else {
                    swal('Falha ao atualizar a ordem.');
                }
            }
        });
    }
});

$( "#lista-Cursos" ).disableSelection();





// TOGGLE SWITCH STATUS
$("body").on('change', '.status-curso', function () {
    
    var id = $(this).data('id');
    var status = $(this).is(":checked") ? 'ativo' : 'inativo';

    $.ajax({
        url: '{{ route("admin.cursos.status") }}',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            id: id,
            status: status,
        },

        success: function (response) {
           console.log(response);
        }
    });
});


// CADASTRAR
    $("body").on('submit','#cadastrar-cursos', function(e) {

    e.preventDefault();
    $("span.error").remove()


    $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: $(this).serialize(),
        
        success: function(response) {
            console.log(response);

        $("#cadastrar-cursos")[0].reset();

        var id = response.curso_id;
        window.location.href = '{{route("admin.cursos.edit")}}/' + id ;
        
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







  