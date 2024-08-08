@extends('master')

@section('header-intro')
<div class="text-center mt-5">
    <h2>Login</h2>
    <p>Abaixo faça o login</p>
</div>
@endsection

@section('main')
<div class=" d-flex justify-content-center align-items-center">
    <div class="w-100" style="max-width: 500px; margin: 62px auto;">
        @if (session()->has('error_login'))
            <div class="alert alert-danger text-center">
                {{ session()->get('error_login') }}
            </div>
        @endif

        @if (auth()->guest())
        <form action="{{ route('login') }}" method="post" class="border p-4 rounded shadow-sm bg-white">
            @csrf
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Digite seu email" value="sonia.halvorson@example.net" required>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Digite sua senha" value="123" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Logar</button>
        </form>
        @else
        <div class="alert alert-info text-center">
            <h2>Você já está logado</h2>
        </div>
        @endif
    </div>
</div>
@endsection
