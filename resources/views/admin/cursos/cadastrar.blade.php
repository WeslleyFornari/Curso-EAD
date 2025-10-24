<a href="#" class="tooglegeCollapse float-end" data-target="#collapse-Trilha"><i class="fas fa-times"></i></a>

<!--CADASTRO-->
<form action="{{route('admin.cursos.store')}}" id="cadastrar-cursos" enctype="multipart/form-data">
    @csrf

    <div class="row mt-2">

        <div class="col-md-3 col-12">
            <label for="exampleInputFile" class="control-label">
                Imagem do Curso <small>(360 x 480px)</small>
            </label>
            <x-upload-file target="logo" collum="media_id" type="single" />
        </div>

        <div class="col-md-9 col-12">
            <div class="row">
                <div class="col-6 form-group">
                    <span class="titulo text-white"> Qual Trilha? *</span>
                    <select name="trilha_id" required id="trilha_id" class="form-select">
                        <option value="">Selecione</option>
                        @foreach($trilhas as $k => $trilha)
                        <option value="{{$trilha->id}}">{{$trilha->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 form-group">
                    <span class="titulo text-white"> Titulo do Curso *</span>
                    <input type="text" name="titulo" id="titulo" class="custom-input" required>
                </div>

            </div>

            <div class="form-group">
                <span class="titulo text-white"> Descricao do Curso *</span>
                <input type="text" name="descricao" id="descricao" class="custom-input" required>
            </div>

            <div class="row mt-4">
                <div class="col-md-2 col-12">
                    <h4 class="text-warning text-center">Planos *</h4>
                </div>
                <div class="col-md-10 col-12">
                    <div class="row">
                        @foreach($planos as $k => $plano)
                        <div class="col-auto m-2">
                            <input type="checkbox" name="planos[]" value="{{ $plano->id }}"><span class="ms-1">{{ $plano->name }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </div>

    <div class="row justify-content-end mt-4 ">

        <div class="col text-end">
            <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Salvar</button>
        </div>
    </div>

</form>