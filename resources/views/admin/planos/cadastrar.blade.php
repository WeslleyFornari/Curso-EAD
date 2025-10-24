

<a href="#" class="tooglegeCollapse float-end" data-target="#collapse-Plano"><i class="fas fa-times"></i></a>

<!--CADASTRO-->
    <form action="{{route('admin.planos.store')}}" id="cadastrar-planos" enctype="multipart/form-data">
    @csrf
       
        <div class="row mt-2 text-white">
            
            <div class="col-md-3 col-12">
                    <label for="exampleInputFile" class="control-label">
                     Imagem do Plano <small>(200 x 350px)</small>
                    </label>
                    <x-upload-file target="logo" collum="media_id" type="single"/>
            </div>

            <div class="col-md-9 col-12">
                <div class="row mx-0">
                        <div class="col-12 form-group">
                            <span class="titulo text-white">Nome *</span>          
                            <input type="text" name="name" id="name" class="custom-input" required>  
                        </div>

                        <div class="col-6 form-group">
                            <span class="titulo text-white">Preço *</span>          
                            <input type="text" name="preco" id="preco" class="moneyMask custom-input" required>  
                            <div id="error-message" class="text-danger" style="display: none;"></div>

                        </div>
                        <div class="col-6 form-group">
                            <span class="titulo text-white">Link *</span> <span class="float-end"><a href="https://app.go2pay.com.br/login" target="_blank">Ir para Go 2 Pay</a></span>         
                            <input name="link" required id="link" class="custom-input">
                        </div>

                        <div class="col-12 form-group">
                            <span class="titulo text-white"> Descricao do Curso *</span>          
                            <input type="text" name="descricao" id="descricao" class="custom-input" required>  
                        </div>
                </div>
            </div>

        </div>
            
        <div class="row justify-content-end mt-3">
           
            <div class="col text-end"> 
                    <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Salvar</button>
            </div>
        </div>
        
    </form>
        


  