<!DOCTYPE html>
<html lang="pt-br">

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
@include('layouts._vite')

    @yield('assets')
</head>

<body>
  
<div id="tudo">
@yield('content')
</div>
     
           
<!-- Modal -->
   
                    
   


<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><!-- Custom Javascript -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script type="text/javascript" src="{{asset('vendors/slick-1.8.1/slick/slick.min.js')}}"></script>

<script>
$(document).ready(function() {

    
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

   
</script>


<script>
    $("body").on('submit','#formulario-contato', function(e) {

        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            data: $(this).serialize(),
            
            success: function(response) {
            console.log(response);
            
                    swal({
                            title: "Enviado com sucesso",
                            text: "Em breve entraremos em contato!",
                            icon: "success",
                                }).then(function() {
                
                                    location.reload();  
                                    
                                });
                    },

            error: function(response) {
                    
            },      
        });
    });

</script>

@yield('scripts')
</body>

</html>