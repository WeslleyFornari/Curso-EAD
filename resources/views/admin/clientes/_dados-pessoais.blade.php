
<div class="row">
<div class="col-sm-3 col-12">
    <div class="avatar-wrapper">
        <img class="profile-pic"
            src="{{ asset($dados_pessoais->avatar ?? 'img/avatar/default.png') }}" />
        <div class="upload-button">
            <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
        </div>
        <input class="file-upload" type="file" accept="image/*" />
    </div>
    </div>
    <div class="col-sm-9 col-12">
    <form action="{{route('admin.dados_pessoais.update')}}" id="atualizar-dados" enctype="multipart/form-data">
            @csrf
            <div class="row ms-sm-2">

                <div class="col-sm-12 mb-2">
                    <span class="titulo"> Nome: *</span>
                    <input type="text" name="name" id="name" value="{{ $dados_pessoais->user->name ?? ''}}" class="custom-input" required>  
                </div>
                
                <div class="col-sm-12 mb-2">
                    <span class="titulo"> Seu título profissional: *</span>
                    <input type="text" name="profissao" id="profissao" value="{{ $dados_pessoais->profissao ?? ''}}" class="custom-input">  
                </div>


                <div class="col-sm-4 mb-2">
                    <span class="titulo"> Data Nascimento: *</span>
                    <input type="date" name="nascimento" id="nascimento" value="{{ $dados_pessoais->nascimento}}" class="custom-input">
                    </div>
                <div class="col-sm-3 mb-2">
                    <span class="titulo"> Sexo: *</span>
                    <select name="sexo" id="sexo" class="form-select">
                        <option value="">Selecione</option>
                        <option value="masculino" @if($dados_pessoais->sexo == 'masculino') selected @endif>Masculino</option>
                        <option value="feminino" @if($dados_pessoais->sexo == 'feminino') selected @endif>Feminino</option>
                    </select>
                </div>
                <div class="col-sm-5 mb-2">
                    <span class="titulo"> CPF: *</span>
                    <input type="text" name="cpf" id="cpf" value="{{ $dados_pessoais->cpf }}" class="cpfMask custom-input">
                </div>

                <div class="col-sm-3 mb-2">
                    <span class="titulo"> CEP: *</span>
                    <input type="text" name="cep" id="buscaCep" value="{{ $dados_pessoais->cep }}" class="cepMask custom-input">
                </div>
                <div class="col-sm-7 mb-2">
                    <span class="titulo"> Endereço: *</span>
                    <input type="text" name="endereco" id="endereco" value="{{ $dados_pessoais->endereco }}" class="custom-input">
                </div>
                <div class="col-sm-2 mb-2">
                    <span class="titulo"> Numero: *</span>
                    <input type="text" name="numero" id="numero" value="{{ $dados_pessoais->numero }}" class="custom-input">
                </div>

                <div class="col-sm-6 mb-2">
                    <span class="titulo"> Complemento: *</span>
                    <input type="text" name="complemento" id="complemento" value="{{ $dados_pessoais->complemento }}" class="custom-input">
                </div>
                <div class="col-sm-6 mb-2">
                    <span class="titulo"> Bairro: *</span>
                    <input type="text" name="bairro" id="bairro" value="{{ $dados_pessoais->bairro }}" class="custom-input">
                </div>

                <div class="col-sm-7 mb-2">
                    <span class="titulo"> Cidade: *</span>
                    <input type="text" name="cidade" id="cidade" value="{{ $dados_pessoais->cidade }}" class="custom-input">
                </div>
                <div class="col-sm-2 mb-2">
                    <span class="titulo"> Estado: *</span>
                    <input type="text" name="estado" id="estado" value="{{ $dados_pessoais->estado }}" class="custom-input">
                </div>
                <div class="col-sm-3 mb-2">
                    <span class="titulo"> Pais: *</span>
                    <input type="text" name="pais" id="pais" value="{{ $dados_pessoais->pais }}" class="custom-input">
                </div>

                <div class="col-sm-6 mb-2">
                    <span class="titulo"> Celular/Whatsapp: *</span>
                    <input type="text" name="celular" id="celular" value="{{ $dados_pessoais->celular }}" class="celMask custom-input">
                </div>
                <div class="col-sm-6 mb-2">
                    <span class="titulo"> Telefone Fixo: *</span>
                    <input type="text" name="telefone" id="telefone" value="{{ $dados_pessoais->telefone }}" class="phoneMask custom-input">
                </div>

            </div>
            <hr>

            <div class="col-12  px-3">
                <button class="btn btn-success" type="submit">Salvar</button>
            </div>

    </form>
    </div>

    </div>