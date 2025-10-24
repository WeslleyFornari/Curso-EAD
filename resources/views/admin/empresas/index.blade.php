@extends('layouts.app')


@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">

            <div class="card mb-4">

                <div class="card-header d-flex pb-0">
                    <div class="col-6">
                        <h4>Empresas</h4>
                    </div>

                </div>

                <div class="p-4">

                    <div class="row bg-dark arial14-font text-light text-bold m-0 py-2">


                        <div class="col-3">Nome</div>
                        <div class="col-2">Responsavel</div>
                        <div class="col-2">Email</div>
                        <div class="col-2">Telefone 1</div>
                        <div class="col-1">Status</div>

                        <div class="col text-center">Ações</div>
                    </div>

                    @foreach($empresas as $k => $value)
                    <div class="row m-0 py-2 border-bottom arial12-font-normal align-items-center">



                        <div class="col-3">{{ $value->nome ?? '' }}</div>
                        <div class="col-2">{{ $value->responsavel ?? '' }}</div>
                        <div class="col-2">{{ $value->user->email ?? '' }}</div>
                        <div class="col-2 phoneMask">{{ $value->telefone_1 ?? '' }}</div>


                        <div class="col-1 justify-content-center d-flex">
                            <div class="form-check form-switch">
                                <input class="form-check-input status-categoria"
                                    type="checkbox" name="status" role="switch"
                                    value="ativo"
                                    data-id="{{$value->id}}"
                                    @if($value->status == 'ativo')
                                checked
                                @endif>
                                <label class="form-check-label" for="flexSwitchCheckChecked">@if($value->status == 'ativo') Ativo @else Inativo @endif</label>
                            </div>
                        </div>

                        <div class="col text-center">

                            <a href="#"
                                class="btn btn-info btn-sm show btn-icon-only m-0 preview-empresa"><i class="fas fa-eye"></i></a>

                            <a href="{{route('admin.empresas.edit', ['id' => $value->id])}}" class="btn btn-sm btn-warning btn-icon-only m-0"><i class="fa fa-pencil bg-amarelo"></i></a>


                            <a href="#" class="btn btn-danger btn-sm btn-destroy  btn-icon-only m-0"><i class="fas fa-trash bg-rosa"></i></a>
                        </div>

                    </div>
                    @endforeach

                    <div class="row mt-5 justify-content-center">
                        <div class="col-sm-12 mx-auto align-center">
                            {{ $empresas->links() }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal-->
<div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" role="dialog" aria-hidden="true" id="Modalempresa">

    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detalhes da empresa</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close"><i class="fa-regular fa-circle-xmark"></i></button>
            </div>

            <div class="modal-body" id="conteudo-empresa">

            </div>

        </div>
    </div>
</div>


@endsection

@section('scripts')
<script>
  

    $("body").on('click', '.preview-empresa', function() {

        event.preventDefault();
        var url = $(this).attr('href');
        console.log(url);

        $.ajax({
            url: url,
            type: "GET",

            success: function(response) {

                $("#conteudo-empresa").html(response);
                $("#Modalempresa").modal('show')

            },
        });
    });
</script>
@endsection