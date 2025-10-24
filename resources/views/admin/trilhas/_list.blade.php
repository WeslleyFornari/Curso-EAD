@foreach($trilhas as $k => $value)

<div class="row m-0 border-bottom arial14-font-normal align-items-center trilha-item pt-3" data-id="{{ $value->id }}">
        <div class="col-md-1 col-2 text-center">
                <i class="fa-solid fa-up-down-left-right"></i>
        </div>
        <div class="col-md-4 col-10">{{ $value->name ?? ''}}</div>
        <div class="col-md-4 col-10">
                <a href="{{ route('admin.cursos.index',['trilha'=>$value->id]) }}">
                        {{$value->cursos->count()}}
                </a>
        </div>
      
       

        <div class="col-md-2 col-6 justify-content-center d-flex">

                <div class="form-check form-switch">
                        <input class="form-check-input status-trilha" type="checkbox" name="status" role="switch"
                                value="ativo" data-id="{{$value->id}}" @if($value->status == 'ativo') checked @endif>
                        <label class="form-check-label" for="flexSwitchCheckChecked">@if($value->status == 'ativo') Ativo @else Inativo @endif</label>
                </div>
        </div>

        <div class="col-md col-6 text-md-center text-end p-2">
                <a href="{{ route('admin.trilhas.edit', $value->id) }}" class="btn btn-sm btn-warning btn-icon-only editar-trilha"><i class="fa fa-pencil bg-amarelo"></i></a>
                <a href="{{ route('admin.trilhas.delete',$value->id) }}" class="btn btn-danger btn-sm btn-destroy btn-icon-only"><i class="fas fa-trash bg-rosa"></i></a>
        </div>

</div>
@endforeach
<div class="row mt-3 justify-content-center">
        <div class="col-sm-12 mx-auto align-center">
                {{ $trilhas->links() }}
        </div>
</div>