

<form action="{{route('admin.perfil.update' )}}" id="atualizar-perfil" enctype="multipart/form-data">
            @csrf
            <div class="row ms-2">

                <div class="col-sm-12 mb-2">
                    <span class="titulo"> Nivel Acadêmico: *</span>         
                        <select name="academico" id="" class="form-select">
                            <option value="">Selecione</option>
                            <option value="ensino_medio" @if($perfil->academico == 'ensino_medio') selected @endif>Ensino Médio</option>
                            <option value="superior_incompleto" @if($perfil->academico == 'superior_imcompleto') selected @endif>Superior Incompleto</option>
                            <option value="superior" @if($perfil->academico == 'superior') selected @endif>Superior</option>
                        </select>
                </div>

                <div class="col-sm-12 mb-2">
                    <span class="titulo"> Experiencia Profissional: *</span>         
                       <input type="text" name="experiencia" id="experiencia" value="{{ $perfil->experiencia ?? ''}}" class="custom-input">
                </div>
                
                <div class="col-sm-12 mb-2">
                    <span class="titulo"> Minhas habilidades: *</span>
                    <textarea id="habilidades" class="custom-input" name="habilidades" rows="4" cols="50" placeholder="Compartilhe suas habilidades...">{{ $perfil->habilidades ?? ''}}</textarea>

                </div>

                <div class="col-sm-12 mb-2">
                    <span class="titulo"> Hobby: *</span>
                    <textarea id="hobby" name="hobby" class="custom-input" rows="2" cols="50" placeholder="Digite aqui seus hobbies...">{{ $perfil->hobby ?? ''}}</textarea>

                </div>

                <div class="col-sm-12 mb-2">
                    <span class="titulo"> Áreas de interesse: *</span>
                    <textarea id="interesse" name="interesse" class="custom-input" rows="4" cols="50" placeholder="Suas areas de interesse">{{ $perfil->interesse ?? ''}}</textarea>

                </div>

                <div class="col-sm-12 mb-2">
                    <span class="titulo"> Quais cursos gostaria de aprender: *</span>
                    <textarea id="aprender" name="aprender" class="custom-input" rows="4" cols="50" placeholder="Conte o que gostaria de aprender">{{ $perfil->aprender ?? ''}}</textarea>

                </div>
                <div class="col-sm-12 mb-2">
                    <span class="titulo py-3"> Qual tipo de serviço?</span> <br>
                    <input type="radio" id="contrato" name="contrato" value="prestar" @if($perfil->contrato == 'prestar') checked @endif/><small class="ms-2">Prestar serviço</small> <br>
                    <input type="radio" id="contrato" name="contrato" value="contratar"  @if($perfil->contrato == 'contratar') checked @endif/><small class="ms-2">Contratar</small>
                </div>


              

            </div>
            <hr>

            <div class="col-12  px-3">
                <button class="btn btn-success" type="submit">Salvar</button>
            </div>

    </form>
   