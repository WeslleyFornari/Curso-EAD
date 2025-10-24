<!DOCTYPE html>
<html lang="pt-br" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{env('APP_NAME')}}</title>

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v5.15.4/css/all.css">  
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   
    <link href="{{asset('vendors/fontawesome-free-6.6.0-web/css/all.min.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/slick-1.8.1/slick/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/slick-1.8.1/slick/slick-theme.css')}}"/>

     <!-- Estilos CSS / TOGGLE-->
  <link rel="stylesheet" href="{{asset('css/toggle_Switch.css')}}">
  <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
  <link rel="stylesheet" href="{{asset('css/avatar.css')}}">
  <!-- Plyr Player Video -->
  <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
  <!-- J Sortable -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">





@include('layouts._vite')

    @yield('assets')
    @stack('assets')
    <style>
            .btn-flutuante {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff; 
            color: white;
            border: none;
            border-radius: 50%;
            width: 56px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: background-color 0.3s;
            z-index: 1000; 
        }

        .btn-flutuante:hover {
            background-color: #0056b3; 
        }
        .tachado {
            text-decoration: line-through; 
            color: gray; 
        }
        @media (max-width: 320px) {
            aside.open{
                width: 100%;
                position: fixed;
                z-index: 100;
            }
            .icon-menu.active{
                position: fixed;
                z-index: 101;
                right: 10px;
            }
        }
        @media (max-width: 480px) {
           aside.open{
            width: 100%;
            position: fixed;
            z-index: 100;
           }
           .icon-menu.active{
            position: fixed;
            z-index: 101;
            right: 10px;
           }
        }
        @media (max-width: 768px) {
            aside.open{
                width: 100%;
                position: fixed;
                z-index: 100;
            }
            .icon-menu.active{
                position: fixed;
                z-index: 101;
                right: 10px;
            }
        }
        @media (max-width: 1024px) {
            aside.open{
                width: 100%;
                position: fixed;
                z-index: 100;
            }
            .icon-menu.active{
                position: fixed;
                z-index: 101;
                right: 10px;
            }
        }
        .custom-check:checked {
        background-color: #28a745;
        border-color: #28a745; 
        }
        .custom-check:checked:focus {
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25); 
        }
    </style>
</head>

<body>
  
<div id="tudo">
    
<div id="container-app" style="background-image:url('{{ asset('img/bg-login.jpg') }}')">
<aside>
        <div class="content">
            <div class="logo">
            @if(ead() && ead()->logo)
                <img src="{{ead->logo->fullpatch()}}" alt="">
                @else
                <img src="{{asset('site/images/logo.svg')}}" alt="Logo">
                @endif
            </div>
            <nav>
                
               <ul>
               @include('layouts.aside._'.Auth::user()->role)
               </ul> 
            </nav>
        </div>
    </aside>
    <main>
<header>
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center">
            <div class="col-2">
            <div class="icon-menu">
                <div></div>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center gap-2">
                    <a href="" class="minha-conta">
                        Olá, {{Auth::user()->name}}
                    </a>
                   
                    @if(Auth::check())
    <form method="POST" class="form-logout" action="{{ route('logout') }}">
    @csrf
        <button type="submit"><i class="fa-solid fa-power-off"></i></button>
        </form>
        @endif
                       
                    
                </div>
            </div>
        </div>
        </header>
        <div id="conteudo">

        <!-- <button class="btn-flutuante" id="toggleChat">
            <i class="fa-solid fa-question"></i> 
        </button> -->
        <!-- <div class="primeiro-acesso mb-3 d-none">
            <div class="accordion" id="chatAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingChat">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseChat" aria-expanded="false" aria-controls="collapseChat">
                            Primeiro acesso?
                        </button>
                    </h2>
                    <div id="collapseChat" class="accordion-collapse collapse" aria-labelledby="headingChat" data-bs-parent="#chatAccordion">
                        <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input custom-check" type="checkbox" id="checkPlano" 
                                        {{ Auth::user()->hasPlano() ? 'checked disabled' : '' }}>
                                    <label class="form-check-label" for="checkPlano">
                                        1. Cadastre um plano, <a href="{{ route('admin.planos.index') }}">clicando aqui.</a>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input custom-check" type="checkbox" id="checkTrilha" 
                                        {{ Auth::user()->hasTrilha() ? 'checked disabled' : '' }}>
                                    <label class="form-check-label" for="checkTrilha">
                                        2. Cadastre uma trilha, <a href="{{ route('admin.trilhas.index') }}">clicando aqui.</a>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input custom-check" type="checkbox" id="checkCurso" 
                                        {{ Auth::user()->hasCurso() ? 'checked disabled' : '' }}>
                                    <label class="form-check-label" for="checkCurso">
                                        3. Cadastre um curso e vincule a uma trilha e plano, <a href="{{ route('admin.cursos.index') }}">clicando aqui.</a>
                                    </label>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="form-check">
                                    <input class="form-check-input custom-check" type="checkbox" id="checkModulo" 
                                        {{ Auth::user()->hasCurso() ? 'checked disabled' : '' }}>
                                    <label class="form-check-label" for="checkModulo">
                                        4. Adicione os módulos do seu curso, <a href="{{ route('admin.cursos.index') }}">clicando aqui.</a>
                                    </label>
                                </div>
                            </li>
                        </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
            
            @yield('content')
            
          
       
        </div>
    </div>
    

</main>
</div>

  
<!-- Modal -->
   
                    
   


<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

<!-- Sortable -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><!-- Custom Javascript -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript" src="{{asset('vendors/slick-1.8.1/slick/slick.min.js')}}"></script>

<!-- Account MOney -->
<script src="{{asset('assets/js/accounting.min.js')}}"></script>
<!-- Plyr  -->
<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>

<script>

$("body").on("click", ".form-logout", function(e) {
    e.preventDefault(); 

    swal({
        title: "Você tem certeza?",
        text: "Você irá sair do sistema",
        icon: "warning",
        dangerMode: true,
        buttons: {
            cancel: {
                text: "Cancelar",
                value: null,
                visible: true,
                className: "",
                closeModal: true, 
            },
            confirm: {
                text: "Sair",
                value: true,
                visible: true,
                className: "",
                closeModal: true 
            }
        }
    }).then((willLogout) => {
        if (willLogout) {

            $.ajax({
                url: "{{ route('logout') }}", 
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}" 
                },
                success: function(data) {
                    window.location.href = "{{ route('site.home') }}"; 
                },
                error: function(err) {
                    var erro = err.responseJSON;
                    swal("Atenção!", erro.error || "Ocorreu um erro", "error");
                }
            });
        }
    });
});
$(document).ready(function() {

    
   $("body").on('change' , '.form-switch .form-check-input',function(){
   
        if($(this).is(':checked')){
                $(this).siblings('label').html('Ativo')
                $(this).val('ativo');
        }else{
            $(this).siblings('label').html('Inativo')
        }
    })  

    
// jQuery COLLAPSE  
    $("body").on('click','.tooglegeCollapse',function(e){
                
                e.preventDefault();
                var alvo = $(this).data('target');
                $(".collapse").not(alvo).removeClass('show');
                $(alvo).toggleClass('show')
    })
        
    $("body").on('click','.icon-menu',function(e){

        e.preventDefault();
        $(this).toggleClass('active');
            if($(this).hasClass('active')){
                $('aside').addClass('open')
            }else{
                $('aside').removeClass('open')
            }  
    })

    $(".flatPicker").flatpickr({
            
        altInput: true,
        altFormat: "d/m/Y",
        dateFormat: "Y-m-d",
        locale: "pt",
        minDate: "today",
        "disable": [
            function(date) {
                // return true to disable
                return (date.getDay() === 0);

            }
        ],
        
    })

// MAscaras
    function getMoney(numero) {
        return new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' }).format(numero).replace('R$', '');
    }

    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    };

    var spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

        $('.phoneMask').mask(SPMaskBehavior, spOptions);
        $('.moneyMask').mask("#.##0,00", {reverse: true});
        $('.cepMask').mask('00000-000');
        $('.cpfMask').mask('000.000.000-00', {reverse: true});
        $('.cnpjMask').mask('00.000.000/0000-00', {reverse: true});
        $('.creditCardMask').mask('0000 0000 0000 0000');
        $('.expirationDateMask').mask('00/00');
        $('.celMask').mask('(00) 00000-0000');

// Busca CEP
        function buscaCep(cep) {
            $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function (dados) {
                console.log(dados);
                $("input[name='endereco']").val(dados.logradouro)
                $("input[name='bairro']").val(dados.bairro)
                $("input[name='cidade']").val(dados.localidade)
                $("input[name='estado']").val(dados.uf)

            });
            }

            $("#buscaCep").change(function () {
                buscaCep($(this).val())
            });

            $("#searchCep").click(function (e) {
                e.preventDefault();
                buscaCep($("#buscaCep").val())
           });
       

// CPF VALIDADOR
    $('#cpf').on('change', function() {

                var cpfInput = this.value;

                if (validaCPF(cpfInput)) { 
                
                return true

                } else {
                
                    swal({
                        title: "CPF inválido!",
                        icon: "error",
                        }).then(function() {
                    
                            $('#cpf').val('');
                        });
                }
                });

                function validaCPF(cpf) {
                var Soma = 0
                var Resto

                var strCPF = String(cpf).replace(/[^\d]/g, '')

                if (strCPF.length !== 11)
                return false

                if ([
                '00000000000',
                '11111111111',
                '22222222222',
                '33333333333',
                '44444444444',
                '55555555555',
                '66666666666',
                '77777777777',
                '88888888888',
                '99999999999',
                ].indexOf(strCPF) !== -1)
                return false

                for (i=1; i<=9; i++)
                Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);

                Resto = (Soma * 10) % 11

                if ((Resto == 10) || (Resto == 11)) 
                Resto = 0

                if (Resto != parseInt(strCPF.substring(9, 10)) )
                return false

                Soma = 0

                for (i = 1; i <= 10; i++)
                Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i)

                Resto = (Soma * 10) % 11

                if ((Resto == 10) || (Resto == 11)) 
                Resto = 0

                if (Resto != parseInt(strCPF.substring(10, 11) ) )
                return false

                return true
                }

    });


// DESTROY
$("body").on('click','.btn-destroy', function(e){
      var url = $(this).attr('href');
      e.preventDefault();
      $(this).closest('tr').addClass("remove-row");
      $(this).closest('.row').addClass("remove-row");
      swal({
        title: "Você tem certeza?",
        text: "Você removerá permanentemente este item",
        icon: "warning",
        dangerMode: true,
        buttons:{
          cancel: {
            text: "Cancel",
            value: null,
            visible: true,
            className: "",
            closeModal: true,
          },
          confirm: {
            text: "OK",
            value: true,
            visible: true,
            className: "",
            closeModal: true
          }
        }
      }) .then(willDelete => {
       if (willDelete) {

        $.ajax({
            url: url,
            type: 'GET',
            success: function(data){ 
                if (willDelete) {
                    $(".remove-row").remove();
                swal("Sucesso!", "Item removido com sucesso", "success");
                }
            },
            error: function(err) {
               var erro = err.responseJSON
                swal("Atenção!", erro.error, "error");
            }
        });

        
       }
     });
    })


// GetMoney e SaveMoney
    function saveMoney($value) {

    if ($value === null) {
        return 0.00;
    }
    var $money = $value.replace(".", "");

    $money = $money.replace(",", ".", $money);

    return $money;
    }

    function getMoney($value) {

    if ($value === null) {
        return '';
    }

    return accounting.formatMoney($value,'', 2, ".", ",");
    }

//     $('#toggleChat').on('click', function() {
//     const chatCollapse = $('#collapseChat');
//     const primeiroAcesso = $('.primeiro-acesso');

//     if (chatCollapse.hasClass('show')) {
//         chatCollapse.collapse('hide'); 
//         primeiroAcesso.addClass('d-none'); 
//     } else {
//         primeiroAcesso.removeClass('d-none'); 
//         chatCollapse.collapse('show'); 
//         primeiroAcesso[0].scrollIntoView({ behavior: 'smooth' });
//     }
// });

</script>



@yield('scripts')

@stack('scripts')
</body>

</html>