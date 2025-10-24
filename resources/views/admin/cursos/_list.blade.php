@foreach($trilhas as $k => $trilha)
<div class="row">
    <div class="col">
        <h4>{{$trilha->nome}}</h4>
    </div>
</div>

@foreach($trilha->cursos as $key => $value)
<div class="row m-0 border-bottom arial14-font-normal align-items-center curso-item" data-id="{{ $value->id }}">
<div class="col-md-1 col-2 pt-3 text-md-center"> <i class="fa-solid fa-up-down-left-right"></i></div>
    <div class="col-md-2 col-6 pt-2">{{ $value->titulo ?? ''}}</div>
    <div class="col-md-4 col-6 text-end pt-2 text-md-center">{{ $value->descricao ?? ''}}</div>
   
    <div class="col-md-2 col-10 text-end pt-3 text-md-center">{{ $value->trilha->name ?? ''}}</div>

    <div class="col-md-2 col-4 justify-content-center d-flex">

        <div class="form-check form-switch">
            <input class="form-check-input status-trilha" type="checkbox" name="status" role="switch" value="ativo"
                data-id="{{$value->id}}" @if($value->status == 'ativo') checked @endif>
            <label class="form-check-label" for="flexSwitchCheckChecked">@if($value->status == 'ativo') Ativo @else
                Inativo @endif</label>
        </div>
    </div>

    <div class="col-md col-8 p-2 text-end text-md-center">

        <a href="{{ route('admin.cursos.edit', $value->id) }}"
            class="btn btn-sm btn-warning btn-icon-only editar-curso"><i class="fa fa-pencil bg-amarelo"></i></a>
        <a href="{{ route('admin.cursos.delete',$value->id) }}"
            class="btn btn-danger btn-sm btn-destroy btn-icon-only"><i class="fas fa-trash bg-rosa"></i></a>
    </div>

</div>
@endforeach
@endforeach