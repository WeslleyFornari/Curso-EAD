@extends('layouts.app')


@section('assets')




@endsection


@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">

                <div class="collapse" id="collapse-Plano">
                    <div class="card shadow mb-4">
                        <div class="card-body " id="cadastro-planos">
                  <!--      <a href="#" class="tooglegeCollapse float-right" data-target="#collapse-User"><i class="fas fa-times"></i></a> -->
                            @include('admin.planos.cadastrar')
                        </div>
                    </div>
                </div>

                <div class="collapse" id="collapse-Plano2">
                    <div class="card shadow mb-4">
                        <div class="card-body " id="edit-planos">
                  <!--      <a href="#" class="tooglegeCollapse float-right" data-target="#collapse-User"><i class="fas fa-times"></i></a> -->
                            @include('admin.planos.cadastrar')
                        </div>
                    </div>
                </div>
                

        <div class="card">
            <div class="card-body">

                <div class="row mb-3">
                    <div class="col-7 ps-4 my-2">
                        <h4>Planos</h4>          
                    </div>
                   
                    <div class="col-5 my-2 pe-4 text-end">
                    <a class="btn btn-primary tooglegeCollapse" type="button" 
                       data-target="#collapse-Plano">Cadastrar</a>
                    </div>
                </div>

                <div class="row bg-dark arial16-font text-light text-bold m-0 py-2">

                        <div class="col-4 col-md-4 text-md-center text-start">Nome</div>
                        <div class="col-4 col-md-2 text-md-center text-center">Preço</div>
                        <div class="col-4 col-md-1 text-md-center text-end">Ordem</div>
                        <div class="col-6 col-md-2 text-md-center text-star">Link</div>
                        <div class="col-6 col-md-2 text-md-center text-end">Status</div>

                        <div class="col-12 col-md text-md-center text-center">Ações</div>
                </div>

                <div id="lista-Planos">
                    @include('admin.planos._list')
                </div> 

                <div class="row mt-3 justify-content-center">
                    <div class="col-sm-12 mx-auto align-center">
                            {{ $planos->links() }}
                    </div>
                </div>

               

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

    
   
// Sortable Jquery
$("#lista-Planos").sortable({
    
        placeholder: "ui-state-highlight",
        update: function(event, ui) {
           
            var ordem = [];
console.log(ordem)
          
            $(".plano-item").each(function(index) {
                var id = $(this).data('id');
                ordem.push({ id: id, ordem: index + 1 });
            });

            $.ajax({
                url: "{{ route('admin.planos.update.order') }}", 
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

    $( "#lista-Planos" ).disableSelection();


// TOGGLE SWITCH STATUS
$("body").on('change', '.status-planos', function () {
    
    var id = $(this).data('id');
    var status = $(this).is(":checked") ? 'ativo' : 'inativo';

    $.ajax({
        url: '{{ route("admin.planos.status") }}',
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
$("body").on('submit','#cadastrar-planos', function(e) {

e.preventDefault();
$("span.error").remove()


$.ajax({
    url: $(this).attr('action'),
    type: "POST",
    data: $(this).serialize(),
    
    success: function(response) {
        console.log(response);

    $("#cadastrar-planos")[0].reset();

    var id = response.plano_id;
    window.location.href = '{{route("admin.planos.edit")}}/' + id ;
    
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







  