@extends('layouts.login')

@section('content')

<div id="container-login" style="background-image:url('{{ asset('img/bg-login.jpg') }}')">

    <div class="login active">
        <div class="box-login">
            <div class="logo">
                @if(ead()->logo)
                <img src="{{ead->logo->fullpatch()}}" alt="">
                @else
                <img src="{{asset('site/images/logo.svg')}}" alt="Logo">
                @endif
            </div>

            <div class="mt-4">
                <h4>Redefinição de Senha</h4>
            </div>



            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="row mb-5">
                    <label for="email" class="col-md-12 col-form-label text-md">Seu email *</label>

                    <div class="col-md-12">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                </div>

                <div class="row my-3 mb-0">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </div>
            </form>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            
            @if (session('status'))
            <div class="alert alert-success my-4" role="alert">
                {{ session('status') }}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection