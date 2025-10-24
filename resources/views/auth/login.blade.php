@extends('layouts.login')

@section('content')

<div id="container-login" style="background-image:url('{{ asset('img/bg-login.jpg') }}')">

    <div class="login active">
        <div class="box-login col-12">
            <div class="logo">
                @if(ead() && ead()->logo)
                <img src="{{ead->logo->fullpatch()}}" alt="">
                @else
                <img src="{{asset('site/images/logo.svg')}}" alt="Logo">
                @endif
            </div>

            <form method="POST" class="form" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="">E-mail</label>
                        <input id="email" type="email" class="custom-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Senha</label>
                        <input id="password" type="password" class="custom-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Acessar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Esqueci a senha
                        </a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>



    <div class="cadastro ">
        <div class="box-cadastro">

            <form method="POST" class="form" action="{{ route('login') }}">
                @csrf
                <div class="row mb-3">
                    <div class="col">
                        <label for="">E-mail</label>
                        <input id="email" type="email" class="custom-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="">Senha</label>
                        <input id="password" type="password" class="custom-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">
                            Entrar
                        </button>

                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Esqueci a senha
                        </a>
                        @endif
                        <button class="btn btn-primary">Acessar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>

<style>
    /* Para telas pequenas (mobile), a .box-login ocupará 100% da largura */
    @media (max-width: 768px) {
        #container-login .login.active{
            width: 100%;
        }
    }

    /* Para telas maiores, manter o tamanho original */
    @media (min-width: 769px) {
        #container-login .login.active {
            width: 40%;
        }
    }
</style>


@endsection