@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <form action="{{route('admin.empresas.update', ['id' => $empresa->id] )}}" id="formStore" enctype="multipart/form-data">
                    @csrf

                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="exampleInputFile" class="control-label ps-4">
                                    Imagem <small>(200 x 250px)</small>
                                </label>
                                <x-upload-file target="logo" collum="media_id" :media="@$empresa" type="single" />
                            </div>

                            <div class="col-md-9 col-12">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Nome *</label>
                                        <input type="text" name="nome" value="{{$empresa->nome ?? ''}}" class="custom-input">
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <label for="">Responsavel *</label>
                                        <input type="text" name="responsavel" value="{{$empresa->responsavel->name ?? ''}}" class="custom-input">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12 col-sm-6">
                                        <label for="">Telefone *</label>
                                        <input type="text" name="telefone_1" value="{{$empresa->telefone_1 ?? ''}}" class="custom-input phoneMask">
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="">Email *</label>
                                        <input type="email" name="email" value="{{$empresa->responsavel->email ?? ''}}" class="custom-input">
                                    </div>
                            <hr class="my-4">
                                    
                                <div class="row ">
                                    <div class="col-md col-6 text-start">
                                        <a href="{{ route('admin.empresas.index') }}" class="btn btn-outline-light">Voltar</a>
                                    </div>

                                    <div class="col-md col-6 text-end">
                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Salvar</button>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection

@section('scripts')

<script>
    // STORE
    $("#formStore").submit(function(e) {

        e.preventDefault();
        $("span.error").remove()

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(data) {
                console.log(data);

                swal({
                    title: "Parábens",
                    text: "Empresa atualizada com sucesso!",
                    icon: "success",
                }).then(function() {
                    window.location.href = '{{route("admin.dash")}}';
                });
            },
            error: function(err) {
                console.log(err);

                if (err.status == 422) {
                    console.log(err.responseJSON);
                    $('#success_message').fadeIn().html(err.responseJSON.message);

                    console.warn(err.responseJSON.errors);

                    $.each(err.responseJSON.errors, function(i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span class="error" style="color: red; font-size:12px; font-weight: bold; margin-left:10px; border: none;">' + error[0] +
                            '</span>'));
                    });
                }
            }
        })
    })
</script>
@endsection