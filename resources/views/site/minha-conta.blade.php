@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h5> Informações Pessoais </h5>
        Preencha seus principais dados

    </div>
    <hr>
    <div class="card-body" id="minha-conta">




        <div class="row">

            <div class="d-flex align-items-start">

                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home"
                        type="button" role="tab" aria-controls="v-pills-home" aria-selected="false" tabindex="-1">Dados
                        Pessoais</button>
                    <button class="nav-link active" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="true">Perfil</button>
                    <button class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-disabled" type="button" role="tab" aria-controls="v-pills-disabled"
                        aria-selected="false" tabindex="-1">Redes Sociais</button>

                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings"
                        aria-selected="false" tabindex="-1">Dados de cesso</button>
                </div>

                <div class="tab-content col-10" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"
                        tabindex="0">
                        <div class="row">


                            <div class="col-auto text-center">

                                <div class="avatar-wrapper">
                                    <img class="profile-pic" src="http://localhost:8000/img/avatar/default.png">
                                    <div class="upload-button">
                                        <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                    </div>
                                    <input class="file-upload" type="file" accept="image/*">
                                </div>

                            </div>
                            <div class="col">
                                <form action="http://localhost:8000/admin/dados_pessoais/update/1" id="atualizar-dados"
                                    enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="QzaEDQZRlMs7HcEVHKeVq61J4TRtTRfUELlClGoy"
                                        autocomplete="off">
                                    <div class="row ms-2">

                                        <div class="col-sm-12 mb-2">
                                            <span class="titulo"> Nome: *</span>
                                            <input type="text" name="name" id="name" value="Rafael" class="custom-input"
                                                required="">
                                        </div>

                                        <div class="col-sm-12 mb-2">
                                            <span class="titulo"> Seu título profissional: *</span>
                                            <input type="text" name="profissao" id="profissao" value=""
                                                class="custom-input" required="">
                                        </div>


                                        <div class="col-sm-4 mb-2">
                                            <span class="titulo"> Data Nascimento: *</span>
                                            <input type="date" name="nascimento" id="nascimento" value=""
                                                class="custom-input" required="">
                                        </div>
                                        <div class="col-sm-3 mb-2">
                                            <span class="titulo"> Sexo: *</span>
                                            <select name="sexo" required="" id="sexo" class="custom-select">
                                                <option value="">Selecione</option>
                                                <option value="masculino">Masculino</option>
                                                <option value="feminino">Feminino</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-5 mb-2">
                                            <span class="titulo"> CPF: *</span>
                                            <input type="text" name="cpf" id="cpf" value="" class="cpfMask custom-input"
                                                required="" maxlength="14">
                                        </div>

                                        <div class="col-sm-3 mb-2">
                                            <span class="titulo"> CEP: *</span>
                                            <input type="text" name="cep" id="buscaCep" value=""
                                                class="cepMask custom-input" required="" maxlength="9">
                                        </div>
                                        <div class="col-sm-7 mb-2">
                                            <span class="titulo"> Endereço: *</span>
                                            <input type="text" name="endereco" id="endereco" value=""
                                                class="custom-input" required="">
                                        </div>
                                        <div class="col-sm-2 mb-2">
                                            <span class="titulo"> Numero: *</span>
                                            <input type="text" name="numero" id="numero" value="" class="custom-input"
                                                required="">
                                        </div>

                                        <div class="col-sm-6 mb-2">
                                            <span class="titulo"> Complemento: *</span>
                                            <input type="text" name="complemento" id="complemento" value=""
                                                class="custom-input" required="">
                                        </div>
                                        <div class="col-sm-6 mb-2">
                                            <span class="titulo"> Bairro: *</span>
                                            <input type="text" name="bairro" id="bairro" value="" class="custom-input"
                                                required="">
                                        </div>

                                        <div class="col-sm-7 mb-2">
                                            <span class="titulo"> Cidade: *</span>
                                            <input type="text" name="cidade" id="cidade" value="" class="custom-input"
                                                required="">
                                        </div>
                                        <div class="col-sm-2 mb-2">
                                            <span class="titulo"> Estado: *</span>
                                            <input type="text" name="estado" id="estado" value="" class="custom-input"
                                                required="">
                                        </div>
                                        <div class="col-sm-3 mb-2">
                                            <span class="titulo"> Pais: *</span>
                                            <input type="text" name="pais" id="pais" value="" class="custom-input"
                                                required="">
                                        </div>

                                        <div class="col-sm-6 mb-2">
                                            <span class="titulo"> Celular/Whatsapp: *</span>
                                            <input type="text" name="celular" id="celular" value=""
                                                class="celMask custom-input" required="" maxlength="15">
                                        </div>
                                        <div class="col-sm-6 mb-2">
                                            <span class="titulo"> Telefone Fixo: *</span>
                                            <input type="text" name="telefone" id="telefone" value=""
                                                class="phoneMask custom-input" required="" maxlength="15">
                                        </div>

                                    </div>
                                    <hr>

                                    <div class="col-12 text-end px-3">
                                        <button class="btn btn-success" type="submit">Salvar</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade active show" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <form action="http://localhost:8000/admin/perfil/update/1" id="atualizar-perfil"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="QzaEDQZRlMs7HcEVHKeVq61J4TRtTRfUELlClGoy"
                                autocomplete="off">
                            <div class="row ms-2">

                                <div class="col-sm-12 mb-2">
                                    <span class="titulo"> Nivel Acadêmico: *</span>
                                    <select name="academico" required="" id="" class="custom-select">
                                        <option value="">Selecione</option>
                                        <option value="ensino_medio">Ensino Médio</option>
                                        <option value="superior_incompleto">Superior Incompleto</option>
                                        <option value="superior">Superior</option>
                                    </select>
                                </div>

                                <div class="col-sm-12 mb-2">
                                    <span class="titulo"> Experiencia Profissional: *</span>
                                    <input type="text" name="experiencia" id="experiencia" value="" class="custom-input"
                                        required="">
                                </div>

                                <div class="col-sm-12 mb-2">
                                    <span class="titulo"> Minhas habilidades: *</span>
                                    <textarea id="habilidades" class="custom-input" name="habilidades" rows="4"
                                        cols="50" placeholder="Compartilhe suas habilidades..."></textarea>

                                </div>

                                <div class="col-sm-12 mb-2">
                                    <span class="titulo"> Hobby: *</span>
                                    <textarea id="hobby" name="hobby" class="custom-input" rows="2" cols="50"
                                        placeholder="Digite aqui seus hobbies..."></textarea>

                                </div>

                                <div class="col-sm-12 mb-2">
                                    <span class="titulo"> Áreas de interesse: *</span>
                                    <textarea id="interesse" name="interesse" class="custom-input" rows="2" cols="50"
                                        placeholder="Suas areas de interesse"></textarea>

                                </div>

                                <div class="col-sm-12 mb-2">
                                    <span class="titulo"> Quais cursos gostaria de aprender: *</span>
                                    <textarea id="aprender" name="aprender" class="custom-input" rows="1" cols="50"
                                        placeholder="Conte o que gostaria de aprender"></textarea>

                                </div>
                                <div class="col-sm-12 mb-2">
                                    <span class="titulo py-3"> Qual tipo de serviço?*</span> <br>
                                    <input type="radio" id="contrato" name="contrato" value="prestar"><small
                                        class="ms-2">Prestar serviço</small> <br>
                                    <input type="radio" id="contrato" name="contrato" value="contratar"><small
                                        class="ms-2">Contratar</small>
                                </div>




                            </div>
                            <hr>

                            <div class="col-12 text-end px-3">
                                <button class="btn btn-success" type="submit">Salvar</button>
                            </div>

                        </form>
                    </div>


                    <div class="tab-pane fade" id="v-pills-disabled" role="tabpanel"
                        aria-labelledby="v-pills-disabled-tab" tabindex="0">
                        <form action="http://localhost:8000/admin/redes_sociais/update/1" id="atualizar-redes"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="QzaEDQZRlMs7HcEVHKeVq61J4TRtTRfUELlClGoy"
                                autocomplete="off">
                            <div class="row ms-2">

                                <div class="col-sm-12 mb-4 position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text "><strong>facebook/</strong></span>
                                        <input type="text" name="facebook" id="facebook" value=""
                                            class="custom-input pr-5" required="">
                                        <i class="fab fa-facebook position-absolute"
                                            style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4 position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text "><strong>twitter/</strong></span>
                                        <input type="text" name="twitter" id="twitter" value=""
                                            class="custom-input pr-5" required="">
                                        <i class="fab fa-twitter position-absolute"
                                            style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4 position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text "><strong>linkedin/</strong></span>
                                        <input type="text" name="linkedin" id="linkedin" value=""
                                            class="custom-input pr-5" required="">
                                        <i class="fab fa-linkedin position-absolute"
                                            style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4 position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text "><strong>youtube/</strong></span>
                                        <input type="text" name="youtube" id="youtube" value=""
                                            class="custom-input pr-5" required="">
                                        <i class="fab fa-youtube position-absolute"
                                            style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4 position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text "><strong>instagram/</strong></span>
                                        <input type="text" name="instagram" id="instagram" value=""
                                            class="custom-input pr-5" required="">
                                        <i class="fab fa-instagram position-absolute"
                                            style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4 position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text "><strong>pinterest/</strong></span>
                                        <input type="text" name="pinterest" id="pinterest" value=""
                                            class="custom-input pr-5" required="">
                                        <i class="fab fa-pinterest position-absolute"
                                            style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                    </div>
                                </div>
                                <div class="col-sm-12 mb-4 position-relative">
                                    <div class="input-group">
                                        <span class="input-group-text "><strong>website/</strong></span>
                                        <input type="text" name="website" id="website" value=""
                                            class="custom-input pr-5" required="">
                                        <i class="fas fa-globe-asia position-absolute"
                                            style="right: 15px; top: 50%; transform: translateY(-50%); pointer-events: none;"></i>
                                    </div>
                                </div>

                            </div>
                            <hr>

                            <div class="col-12 text-end px-3">
                                <button class="btn btn-success" type="submit">Salvar</button>
                            </div>

                        </form>
                    </div>








                    
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab" tabindex="0">...</div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab" tabindex="0">
                        <form action="http://localhost:8000/admin/usuarios/acesso/1" id="atualizar-acesso"
                            enctype="multipart/form-data">
                            <div class="row ms-2">

                                <div class="col-sm-7 mb-2">
                                    <span class="titulo"> Email: *</span>
                                    <input type="email" name="email" id="email" value="rafael@dvelopers.com.br"
                                        class="custom-input" required="">
                                </div>

                                <div class="col-sm-5 mb-2">
                                    <span class="titulo"> Senha atual: *</span>
                                    <input type="password" name="current_password" id="current_password"
                                        class="custom-input ">
                                </div>

                                <div class="col-sm-6 mb-2">
                                    <span class="titulo"> Nova senha: *</span>
                                    <input type="password" name="password" id="password" class="custom-input ">
                                </div>
                                <div class="col-sm-6 mb-2">
                                    <span class="titulo"> Confirmar nova senha: *</span>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="custom-input ">
                                </div>




                            </div>
                            <hr>

                            <div class="col-12 text-end px-3">
                                <button class="btn btn-success" type="submit">Salvar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>

@endsection

@section('scripts')
<script>
    var $trilhas = $('.slick-trilhas').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        prevArrow: '<button type="button" class="slick-prev-custom"><i class="fa-solid fa-angle-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next-custom"><i class="fa-solid fa-angle-right"></i></button>',

        responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
</script>
@endsection