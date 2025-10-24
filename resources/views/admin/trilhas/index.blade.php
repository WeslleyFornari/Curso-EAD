@extends('layouts.app')


@section('assets')




@endsection


@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

                <div class="collapse" id="collapse-Trilha">
                    <div class="card shadow mb-4">
                        <div class="card-body " id="cadastro-trilhas">
                  <!--      <a href="#" class="tooglegeCollapse float-right" data-target="#collapse-User"><i class="fas fa-times"></i></a> -->
                            @include('admin.trilhas.cadastrar')
                        </div>
                    </div>
                </div>

                <div class="collapse" id="collapse-Trilha2">
                    <div class="card shadow mb-4">
                        <div class="card-body " id="edit-trilhas">
                  <!--      <a href="#" class="tooglegeCollapse float-right" data-target="#collapse-User"><i class="fas fa-times"></i></a> -->
                            @include('admin.trilhas.cadastrar')
                        </div>
                    </div>
                </div>
                

        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-md-7 col-6 ps-4 my-2">
                        <h4>Trilhas</h4>          
                    </div>
                   
                    <div class="col-md-5 col-6 my-2 pe-4 text-end">
                    <a class="btn btn-primary tooglegeCollapse" type="button" 
                       data-target="#collapse-Trilha">Cadastrar</a>
                    </div>
                </div>

                <div class="row bg-dark arial16-font text-light text-bold m-0 py-2">
                        <div class="col-md-1 col-6 text-md-center text-end">Ordem</div>
                        <div class="col-md-4 col-6">Nome</div>
                        <div class="col-md-4 col-6">Cursos</div>
                       
                        <div class="col-md-2 col-6 text-md-center">Status</div>

                        <div class="col-md col-6 text-md-center text-end">Ações</div>
                </div>

                <div id="lista-Trilhas">
                    @include('admin.trilhas._list')
                </div>                

           </div>
        </div>

    </div>
</div>
@endsection



@section('scripts')
<script>
$(document).ready(function() {

    
    function lista(url = "{{ route('admin.trilhas.list') }}" ){
            
            $.ajax({
                url:url, 
                method: "GET",
               
                success: function(response) {
                   $("#lista-Trilhas").html(response)
                }
            });
   }
// Sortable Jquery
$("#lista-Trilhas").sortable({
    
        placeholder: "ui-state-highlight",
        update: function(event, ui) {
           
            var ordem = [];
console.log(ordem)
          
            $(".trilha-item").each(function(index) {
                var id = $(this).data('id');
                ordem.push({ id: id, ordem: index + 1 });
            });

            $.ajax({
                url: "{{ route('admin.trilhas.update.order') }}", 
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

    $( "#lista-Trilhas" ).disableSelection();

// TOGGLE SWITCH STATUS
$("body").on('change', '.status-trilha', function () {
    
    var id = $(this).data('id');
    var status = $(this).is(":checked") ? 'ativo' : 'inativo';

    $.ajax({
        url: '{{ route("admin.trilhas.status") }}',
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
    $("body").on('submit','#cadastrar-trilhas', function(e) {

      e.preventDefault();
    $("span.error").remove()


    $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: $(this).serialize(),
        
        success: function(response) {
            console.log(response);

        $("#cadastrar-trilhas")[0].reset();
        lista()
        
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
   
    
// EDITAR
    $("body").on('click','.editar-trilha',function(e) {
        
        e.preventDefault();
       
        $.ajax({
            url: $(this).attr('href'),
            type: "GET",

            success: function(response) {
              
                console.log('retorno OK')
                console.log(response);

                $("#edit-trilhas").html(response);
                $("#collapse-Trilha2").collapse('show');
               
            },       
        });
    });



// ATUALIZAR
    $("body").on('submit','#atualizar-trilhas', function(e) {

        e.preventDefault();
        $("span.error").remove()

        $.ajax({

            url: $(this).attr('action'),  
            type: "POST",                
            data: $(this).serialize(),
            
            success: function(response) {

                swal('Trilha atualizada')

                $("#atualizar-trilhas")[0].reset();
                
                $('#lista-Trilhas').html(response);
                $("#collapse-Trilha2").collapse('hide');

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







  