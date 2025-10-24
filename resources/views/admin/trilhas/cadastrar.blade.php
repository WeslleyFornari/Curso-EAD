@if(isset($trilha))
<a href="#" class="tooglegeCollapse float-end" data-target="#collapse-Trilha2"><i class="fas fa-times"></i></a>

<!--FORMULARIO EDITAR-->
    <form action="{{route('admin.trilhas.update',['id'=>$trilha->id])}}" id="atualizar-trilhas" enctype="multipart/form-data">
            @csrf
            <div class="row mt-2">
           
                <div class="form-group col-sm-12">
                    <span class="titulo text-white"> Nome da Trilha: *</span>          
                    <input type="text" name="name" id="name" value="{{$trilha->name ?? ''}}"   class="custom-input" required>  
                </div>

                <div class="col-sm-3 mt-4"> 
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Atualizar</button>
                </div>
            </div>
    </form>

@else

<a href="#" class="tooglegeCollapse float-end" data-target="#collapse-Trilha"><i class="fas fa-times"></i></a>

<!--FORMULARIO CADASTRO-->
    <form action="{{route('admin.trilhas.store')}}" id="cadastrar-trilhas" enctype="multipart/form-data">
    @csrf
       
        <div class="row mt-2">
            
            <div class="form-group col-sm-12">
                <span class="titulo text-white"> Nome da Trilha: *</span>          
                <input type="text" name="name" id="name" class="custom-input" required>  
            </div>
        </div>
            
        <div class="row justify-content-end pe-5">
           
            <div class="col text-end  mt-4"> 
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Salvar</button>
            </div>
        </div>
        
    </form>
@endif        


  