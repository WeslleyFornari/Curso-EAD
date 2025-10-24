@extends('layouts.app')

@section('assets')

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<!-- CSS Modal Pedido-->
<style>
    .nav.nav-pills{
        border-right: 1px solid #fff;
    }
    @media(max-width: 600px){
        .nav.nav-pills{
            width: 100%;
            overflow-x: scroll;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            align-items: center;
            border-right:none;
        }
        .nav.nav-pills button{
            text-wrap: nowrap;
        }
    }
</style>
@endsection


@section('content')


<div class="row justify-content-center mt-5">
    <div class="col-md-12">
   
        <div class="card">
            <div class="card-body" id="minha-conta">

                <div class="row mb-0" >
                    

                    <div class="col-12 ps-4 mt-4 align-items-center">
                       
                                    <h5> {{$titulo}} </h5>
                                    {{$sub_titulo}}
                           
                         <hr>
                    </div>     
                </div> 


                <div class="row">
                    
                    <div class="d-sm-flex align-items-start">
                        
                        <div class="nav flex-sm-column nav-pills me-3 pe-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link  text-end active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Dados Pessoais</button>
                            <button class="nav-link  text-end" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Perfil</button>
                            <button class="nav-link  text-end" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled" aria-selected="false">Redes Sociais</button>
                            <button class="nav-link  text-end" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Dados de Acesso</button>
                        </div>


                        
                        <div class="tab-content col-sm-10" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">@include('admin.clientes._dados-pessoais')</div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">@include('admin.clientes._perfil')</div>
                            <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel" aria-labelledby="v-pills-disabled-tab" tabindex="0">@include('admin.clientes._redes-sociais')</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab" tabindex="0">@include('admin.clientes._acesso')</div>
                        </div>
                    </div>
                </div>




           </div>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>


<script>
// Avatar Upload 
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);

        // Enviar a imagem via AJAX
            var formData = new FormData();
            formData.append('file', input.files[0]);

            $.ajax({
                url: "{{route('admin.dados_pessoais.avatar')}}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  
                },
                success: function(response) {
                    console.log('Upload bem-sucedido:', response);
                   
                },
                error: function(xhr, status, error) {
                    console.error('Erro no upload:', error);
                    // Aqui você pode tratar os erros do upload
                }
            });
        }
    };

    $(".file-upload").on('change', function(){
        var x =  readURL(this);
    });

    $(".upload-button").on('click', function() {
        $(".file-upload").click();
    });
// End Avatar
            
    $("body").on('submit', '#atualizar-dados', function(e) {
       
        e.preventDefault();
        $("span.error").remove()

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function (data) {
                console.log(data);
            
                    
                swal({
                    title: "Parábens",
                    text: "Cadastro realizado com sucesso!.",
                    icon: "success",
                }).then(function() {

                    $('#v-pills-profile-tab').click();
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
        })
        })



    $("body").on('submit', '#atualizar-perfil', function(e) {
      
       e.preventDefault();
       $("span.error").remove()

       $.ajax({
           type: "POST",
           url: $(this).attr('action'),
           data: $(this).serialize(),
           success: function (data) {
               console.log(data);
           
                   
               swal({
                   title: "Parábens",
                   text: "Cadastro realizado com sucesso!.",
                   icon: "success",
               }).then(function() {

                   $('#v-pills-disabled-tab').click();
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
       })
       })


    $("body").on('submit', '#atualizar-redes', function(e) {
     
      e.preventDefault();
      $("span.error").remove()

      $.ajax({
          type: "POST",
          url: $(this).attr('action'),
          data: $(this).serialize(),
          success: function (data) {
              console.log(data);
          
                  
              swal({
                  title: "Parábens",
                  text: "Cadastro realizado com sucesso!.",
                  icon: "success",
              }).then(function() {

                  $('#v-pills-settings-tab').click();
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
      })
      })


 $("body").on('submit', '#atualizar-acesso', function(e) {
     
     e.preventDefault();
     $("span.error").remove()

     $.ajax({
         type: "POST",
         url: $(this).attr('action'),
         data: $(this).serialize(),
         success: function (data) {
             console.log(data);
         
                 
             swal({
                 title: "Parábens",
                 text: "Senha alterada com sucesso!.",
                 icon: "success",
             }).then(function() {

                window.location.href = '{{route("admin.dash")}}';
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
     })
     })
    
</script>

@endsection









  