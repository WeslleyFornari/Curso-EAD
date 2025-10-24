@extends('layouts.login')

@section('content')

<div id="container-login"
    style="background-image:url('{{ asset('img/bg-login.jpg') }}')">
    <div class="login active ">
        <div class="box-login">
            <div class="logo">
                <img src="{{ asset('img/logo.png') }}" alt="">
            </div>
            <div class="form">
                <div class="row  text-light mb-3">
                    <div class="col">
                        <label for="">E-mail</label>
                        <input type="text" class="custom-input">
                    </div>
                </div>
                <div class="row  text-red mb-3">
                    <div class="col text-red">
                        <label for="">Password</label>
                        <input type="pasword" class="custom-input">
                    </div>
                </div>
                <div class="row  text-light">
                    <div class="col">
                        <button class="btn btn-primary">Acessar</button>
                    </div>
                </div>
            </div>
        </div>

     
    </div>
    <div class="cadastro ">
        <div class="box-cadastro">
            <div class="form">
                <div class="row mb-3">
                    <div class="col">
                        <label for="">E-mail</label>
                        <input type="text" class="custom-input">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Password</label>
                        <input type="pasword" class="custom-input">
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary">Acessar</button>
                    </div>
                </div>
            </div>
            </div>
        </div>
</div>

@endsection