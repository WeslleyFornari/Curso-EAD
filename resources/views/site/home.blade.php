@extends('layouts.site')


@section('banner')
<div id="home" class="header-hero bg_cover" style="background-image: url({{asset('site/images/header-bg.jpg')}})">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="header-content text-center">
                            <h3 class="header-title">Bem-vindo à WiseOwl<br> <small>seu Caminho para o Conhecimento</small></h3>
                            <p class="text">Desbloqueie o poder do aprendizado com nossa plataforma whitelabel, projetada para impulsionar seu negócio educacional. Acessível, personalizável e pronta para crescer com você.</p>
                            <ul class="header-btn">
                                <li><a class="main-btn btn-one" rel="nofollow" href="https://rebrand.ly/start-ud">Comece a Ensinar Hoje</a></li>
                                <li><a class="main-btn btn-two video-popup" href="https://www.youtube.com/watch?v=r44RKWyfcFw">Assista à Demonstração <i class="lni-play"></i></a></li>
                            </ul>
                        </div> <!-- header content -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div class="header-shape">
                <img src="{{asset('site/images/header-shape.svg')}}" alt="shape">
            </div>
        </div> <!-- header content -->
@endsection
@section('content')


<section id="service" class="services-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title pb-10">
                        <h4 class="title">Criada para você</h4>
                        <p class="text">Construída para Atender às Necessidades de Todo Educador</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bolt"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Instrutores</h4>
                                    <p class="text">Crie cursos com facilidade, acompanhe o progresso dos alunos e expanda sua presença online.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bar-chart"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Coaches</h4>
                                    <p class="text">Ideal para negócios de coaching que desejam oferecer programas de treinamento de forma simples</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-brush"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Agências</h4>
                                    <p class="text">Escalone os serviços da sua agência oferecendo soluções educacionais personalizadas para seus clientes.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                        <div class="col-md-6">
                            <div class="services-content mt-40 d-sm-flex">
                                <div class="services-icon">
                                    <i class="lni-bulb"></i>
                                </div>
                                <div class="services-content media-body">
                                    <h4 class="services-title">Empresas</h4>
                                    <p class="text">Fortaleça sua empresa oferecendo programas de treinamento internos ou externos com segurança.</p>
                                </div>
                            </div> <!-- services content -->
                        </div>
                    </div> <!-- row -->
                </div> <!-- row -->
            </div> <!-- row -->
        </div> <!-- conteiner -->
        <div class="services-image d-lg-flex align-items-center">
            <div class="image">
                <img src="{{asset('site/images/services.png')}}" alt="Services">
            </div>
        </div> <!-- services image -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== PRICING PART START ======-->

    <section id="pricing" class="pricing-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-10">
                        <h4 class="title">Nossos Planos</h4>
                        <p class="text">Escolha o Plano que Acompanha Seu Crescimento</p>
                        <p class="text">
                        Pare de pagar a mais por plataformas que não atendem suas necessidades. WiseOwl oferece preços flexíveis para cada fase do seu crescimento. Sem taxas ocultas, apenas planos diretos para ajudá-lo a ter sucesso.
                        </p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-pricing mt-40">
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">Basic</h5>
                            <!-- <span class="price">-</span> -->
                            <p class="year">Sob Consulta</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Platafoma de Ensino Whitelabel</li>
                                <li><i class="lni-check-mark-circle"></i> Plataforma de Pagamento </li>
                                <li><i class="lni-check-mark-circle"></i> Controle de Trilhas e Cursos</li>
                                <li><i class="lni-check-mark-circle"></i> Setup de Instalação</li>
                            </ul>
                        </div>
                        <div class="pricing-btn text-center">
                            <a class="main-btn" href="#contact">Fale Conosco</a>
                        </div>
                        <div class="buttom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-1{fill:#2bdbdc;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-1" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-1" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-1" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-1" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> <!-- single pricing -->
                </div>
                
                <!-- <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-pricing pro mt-40">
                        <div class="pricing-baloon">
                            <img src="{{asset('site/images/baloon.svg')}}" alt="baloon">
                        </div>
                        <div class="pricing-header">
                            <h5 class="sub-title">Pro</h5>
                            <span class="price">$ 399</span>
                            <p class="year">per year</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Carefully crafted components</li>
                                <li><i class="lni-check-mark-circle"></i> Amazing page examples</li>
                                <li><i class="lni-check-mark-circle"></i> Super friendly support team</li>
                                <li><i class="lni-check-mark-circle"></i> Awesome Support</li>
                            </ul>
                        </div>
                        <div class="pricing-btn text-center">
                            <a class="main-btn" href="#">GET STARTED</a>
                        </div>
                        <div class="buttom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-2{fill:#0067f4;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-2" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-2" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-2" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-2" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> 
                </div> -->
                
                <!-- <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="single-pricing enterprise mt-40">
                        <div class="pricing-flower">
                            <img src="{{asset('site/images/flower.svg')}}" alt="flower">
                        </div>
                        <div class="pricing-header text-right">
                            <h5 class="sub-title">Enterprise</h5>
                            <span class="price">$ 799</span>
                            <p class="year">per year</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni-check-mark-circle"></i> Carefully crafted components</li>
                                <li><i class="lni-check-mark-circle"></i> Amazing page examples</li>
                                <li><i class="lni-check-mark-circle"></i> Super friendly support team</li>
                                <li><i class="lni-check-mark-circle"></i> Awesome Support</li>
                            </ul>
                        </div>
                        <div class="pricing-btn text-center">
                            <a class="main-btn" href="#">GET STARTED</a>
                        </div>
                        <div class="buttom-shape">
                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 350 112.35"><defs><style>.color-3{fill:#4da422;isolation:isolate;}.cls-1{opacity:0.1;}.cls-2{opacity:0.2;}.cls-3{opacity:0.4;}.cls-4{opacity:0.6;}</style></defs><title>bottom-part1</title><g id="bottom-part"><g id="Group_747" data-name="Group 747"><path id="Path_294" data-name="Path 294" class="cls-1 color-3" d="M0,24.21c120-55.74,214.32,2.57,267,0S349.18,7.4,349.18,7.4V82.35H0Z" transform="translate(0 0)"/><path id="Path_297" data-name="Path 297" class="cls-2 color-3" d="M350,34.21c-120-55.74-214.32,2.57-267,0S.82,17.4.82,17.4V92.35H350Z" transform="translate(0 0)"/><path id="Path_296" data-name="Path 296" class="cls-3 color-3" d="M0,44.21c120-55.74,214.32,2.57,267,0S349.18,27.4,349.18,27.4v74.95H0Z" transform="translate(0 0)"/><path id="Path_295" data-name="Path 295" class="cls-4 color-3" d="M349.17,54.21c-120-55.74-214.32,2.57-267,0S0,37.4,0,37.4v74.95H349.17Z" transform="translate(0 0)"/></g></g></svg>
                        </div>
                    </div> 
                </div> -->
            </div> <!-- row -->
        </div> <!-- conteiner -->
    </section>

    <!--====== PRICING PART ENDS ======-->
    
     <!--====== CALL TO ACTION PART START ======-->



    <!--====== CALL TO ACTION PART ENDS ======-->
    
    <!--====== CONTACT PART START ======-->

    <section id="contact" class="contact-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center pb-10">
                        <h4 class="title">Cadastre-se</h4>
                        <p class="text">Preencha os dados que um de nossos consultores entrará em contato com você</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-form">
                        <form id="contact-form" action="" method="post" data-toggle="validator">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="name" placeholder="Your Name" data-error="Name is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="email" name="email" placeholder="Your Email" data-error="Valid email is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="subject" placeholder="Subject" data-error="Subject is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-6">
                                    <div class="single-form form-group">
                                        <input type="text" name="phone" placeholder="Phone" data-error="Phone is required." required="required">
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <div class="col-md-12">
                                    <div class="single-form form-group">
                                        <textarea placeholder="Your Mesaage" name="message" data-error="Please, leave us a message." required="required"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div> <!-- single form -->
                                </div>
                                <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="single-form form-group text-center">
                                        <button type="submit" class="main-btn">send message</button>
                                    </div> <!-- single form -->
                                </div>
                            </div> <!-- row -->
                        </form>
                    </div> <!-- row -->
                </div>
            </div> <!-- row -->
        </div> <!-- conteiner -->
    </section>

@endsection

@section('scripts')

<script>

// STORE
      $("#formStore").submit(function (e) {

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
                    text: "Compra realizada com sucesso!",
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