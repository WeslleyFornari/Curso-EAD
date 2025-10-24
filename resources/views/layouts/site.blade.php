<!doctype html>
<html lang="en">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>EAD</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('site/images/favicon.png')}}" type="image/png">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="{{asset('site/css/LineIcons.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('site/css/magnific-popup.css')}}">

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('site/css/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('site/css/style.css')}}">

    @yield('assets')
</head>

<body>

    <!--====== HEADER PART START ======-->

    <header class="header-area">
        <div class="navgition navgition-transparent">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="#">
                                <img src="{{asset('site/images/logo.svg')}}" alt="Logo">
                            </a>

                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">home</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="page-scroll" href="#service">SERVICES</a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">Preços</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">Contato</a>
                                    </li>
                                    <li class="nav-item d-md-none">
                                        <a class="" href="{{route('login')}}">Logar</a>
                                    </li>
                                    <li class="nav-item d-md-none">
                                    <a href="{{route('site.cadastro')}}" class="">Cadastre-se</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="d-none d-sm-flex align-items-center">
                                <ul class="navbar-nav flex-column flex-sm-row">
                                    <li class=" me-sm-2 mb-2 mb-sm-0">
                                        <a href="{{route('login')}}" class="btn btn-outline-primary">Entrar</a>
                                    </li>                              
                                    <li class="ml-2">
                                        <a href="{{route('site.cadastro')}}" class="btn btn-primary">Cadastre-se</a>
                                    </li>                              
                                </ul>
                            </div>
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navgition -->
        @yield('banner')
       
    </header>

    @yield('content')

    <footer id="footer" class="footer-area">
        <div class="footer-widget">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-2">
                        <div class="footer-logo-support d-md-flex align-items-end justify-content-between">
                            <div class="footer-logo d-flex align-items-end">
                                <a class="mt-30" href="index.html"><img src="{{asset('site/images/logo.svg')}}" alt="Logo"></a>

                               
                            </div> <!-- footer logo -->
                            
                        </div> <!-- footer logo support -->
                    </div>
                
                    <div class="col-lg-2 col-md-4 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Empresa</h6>
                            <ul>
                                <li><a href="#">Sobre</a></li>
                                <li><a href="#">Contato</a></li>
                            

                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="footer-link">
                            <h6 class="footer-title">Outros</h6>
                            <ul>
                                <li><a href="#">CRM</a></li>
                                <li><a href="#">GO2PAY</a></li>
                                
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-link">
                            <h6 class="footer-title">Suporte</h6>
                            <ul>
                                <li><a href="#">Support Center</a></li>
                               
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                   
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer widget -->
        
        <div class="footer-copyright">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright text-center">
                            <p class="text">Desenvolvido por Dvelopers</p>
                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TOP PART START ======-->

    <a class="back-to-top" href="#"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TO TOP PART ENDS ======-->



    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><!-- Custom Javascript -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--====== jquery js ======-->
    <script src="{{asset('site/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    

    <!--====== Bootstrap js ======-->
    <script src="{{asset('site/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('site/js/popper.min.js')}}"></script>

    <!--====== Ajax Contact js ======-->
    <script src="{{asset('site/js/ajax-contact.js')}}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{{asset('site/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('site/js/scrolling-nav.js')}}"></script>

    <!--====== Validator js ======-->
    <script src="{{asset('site/js/validator.min.js')}}"></script>

    <!--====== Magnific Popup js ======-->
    <script src="{{asset('site/js/jquery.magnific-popup.min.js')}}"></script>

    <!--====== Main js ======-->
    <script src="{{asset('site/js/main.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script><!-- Custom Javascript -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script>

          
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    };

    var spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };

        $('.phoneMask').mask(SPMaskBehavior, spOptions);
    </script>

    @yield('scripts')
</body>

</html>
