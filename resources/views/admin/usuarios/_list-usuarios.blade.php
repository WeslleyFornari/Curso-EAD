<div class="d-none d-sm-block">
<div class="row bg-dark arial16-font text-light text-bold m-0 py-2 ">

    <div class="col-12 col-md-4 text-sm-center">Nome</div>
    <div class="col-12 col-md-3 text-sm-center">Email</div>
    <div class="col-12 col-md-3 text-sm-center">Telefone</div>
    <div class="col-12 col-md-1 text-sm-center">Status</div>

    <div class="col-12 col-md text-sm-center">Ações</div>
</div>
</div>

@foreach($usuarios as $k => $value)

    <div class="row m-0 border-bottom arial14-font-normal align-items-center pt-2">

            <div class="col-12 col-md-4 text-sm-center">
                <div for="" class="d-sm-none mt-2"><strong>Nome</strong></div>        
            {{ $value->name ?? ''}}
        </div>
            <div class="col-12 col-md-3 text-sm-center">
                <div for="" class="d-sm-none mt-2"><strong>Email</strong></div>        
            {{ $value->email ?? ''}}
        </div>
            <div class="col-12 col-md-3 phoneMask text-sm-center">
            <div for="" class="d-sm-none  mt-2"><strong>Telefone</strong></div>         
            {{ $value->dados->celular ?? ''}}</div>
            
            <div class="col-6 col-sm-3 col-md-1 ">
            <div for="" class="d-sm-none  mt-2"><strong>Status</strong></div> 
                    <div class="form-check form-switch">
                            <input class="form-check-input status-usuario" type="checkbox" name="status" role="switch"
                                    value="ativo" data-id="{{$value->id}}" @if($value->status == 'ativo') checked @endif>
                            <label class="form-check-label" for="flexSwitchCheckChecked">@if($value->status == 'ativo') Ativo @else Inativo @endif</label>
                    </div>
            </div>

            <div class="col-6 col-sm-3 col-md text-sm-center p-2 text-sm-center">
            <div for="" class="d-sm-none"><strong>Ações</strong></div> 
                    <a href="{{ route('admin.usuarios.delete',$value->id) }}" class="btn btn-danger btn-sm btn-destroy btn-icon-only"><i class="fas fa-trash bg-rosa"></i></a>
            </div>

    </div>

@endforeach
<div class="row mt-3 justify-content-center">
        <div class="col-sm-12 mx-auto align-center">
                {{ $usuarios->links() }}
        </div>
</div>