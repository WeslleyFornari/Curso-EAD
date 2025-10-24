

<form action="{{route('admin.usuarios.acesso') }}" id="atualizar-acesso" enctype="multipart/form-data">
            @csrf
            <div class="row ms-2">

                <div class="col-sm-7 mb-2">
                    <span class="titulo"> Email: *</span>
                    <input type="email" name="email" id="email" value="{{ $acesso->email ?? ''}}" class="custom-input" required>  
                </div>
                
                <div class="col-sm-5 mb-2">
                    <span class="titulo"> Senha atual: *</span>
                    <input type="password" name="current_password" id="current_password" class="custom-input {{ $errors->has('current_password') ? 'is-invalid' : '' }}" >
                    </div>

                <div class="col-sm-6 mb-2">
                    <span class="titulo"> Nova senha: *</span>
                    <input type="password" name="password" id="password" class="custom-input {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    </div>
                <div class="col-sm-6 mb-2">
                    <span class="titulo"> Confirmar nova senha: *</span>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="custom-input {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                    </div>


            

            </div>
            <hr>

            <div class="col-12  px-3">
                <button class="btn btn-success" type="submit">Salvar</button>
            </div>

    </form>
   