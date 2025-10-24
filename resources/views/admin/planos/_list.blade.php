
@foreach($planos as $k => $value)

<div class="row m-0 border-bottom arial14-font-normal align-items-center planos-item pt-3" data-id="{{ $value->id }}">
   
        <div class="col-6 col-md-4">{{ $value->name ?? ''}}</div>
        <div class="col-4 col-md-2">{{ getMoney($value->preco ?? '') }}</div>
        <div class="col-2 col-md-1 text-center">{{ $value->ordem}}</div>
        <div class="col-6 col-md-2 pt-2 pt-md-0 text-md-center"><a href="{{$value->link}}" class="btn btn-success" target="_blank">Link</a></div>
                        
        <div class="col-6 col-md-2 pt-2 pt-md-0 justify-content-center d-flex">
            
            <div class="form-check form-switch">
                <input class="form-check-input status-plano" type="checkbox" name="status" role="switch"
                       value="ativo" data-id="{{$value->id}}" @if($value->status == 'ativo') checked @endif>
                <label class="form-check-label" for="flexSwitchCheckChecked">@if($value->status == 'ativo') Ativo @else Inativo @endif</label>
             </div>
        </div>

        <div class="col-12 col-md text-center pt-2 pt-md-0 p-2">
                                
             
                <a href="{{ route('admin.planos.edit', $value->id) }}" class="btn btn-sm btn-warning btn-icon-only editar-plano"><i class="fa fa-pencil bg-amarelo"></i></a>
                <a href="{{ route('admin.planos.delete',$value->id) }}" class="btn btn-danger btn-sm btn-destroy btn-icon-only"><i class="fas fa-trash bg-rosa"></i></a>
        </div>
                            
</div>
@endforeach  


