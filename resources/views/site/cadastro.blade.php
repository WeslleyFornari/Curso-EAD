@extends('layouts.site')

@section('content')
<div class="container py-5 mt-5">
    <div class="row mt-4 justify-content-center">
        <h4 class="col-12 mx-auto  text-center">Registre-se</h4>
        <div class="col-6">
            <div class="card m-2 mb-4">

                <div class="card-body ">

                    <form action="{{route('empresa.store')}}" id="formStore" enctype="multipart/form-data">
                        @csrf

                        <div class="row ">
                            <div class="col-12">
                                <label for="">Nome sua Escola/Empresa *</label>
                                <input type="text" name="nome" required class="form-control">
                            </div>
                            <div class="col-12 ">
                                <label for="">Responsável *</label>
                                <input type="text" name="name" required class="form-control ">
                            </div>
                            <div class="col-12 ">
                                <label for="">Telefone 1 *</label>
                                <input type="text" name="telefone_1" required class="form-control phoneMask">
                            </div>
                            <div class="col-12">
                                <label for="">Email * </label>
                                <input type="email" name="email" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="">Password * </label>
                                <input type="password" name="password" id="password" required class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="">Repita * </label>
                                <input type="password" name="password_confirmation" required id="password-confirmation" class="form-control">
                            </div>


                            <div class="col-12 text-end mt-3">
                                <button class="btn btn-primary w-100" type="submit">Cadastrar</button>
                            </div>
                        </div>

                    </form>
                    <div id="success_message"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
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
                    text: "Compra realizada com sucesso!",
                    icon: "success",
                    buttons: false,
                    timer: 2000,
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