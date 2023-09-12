@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirmação de Exclusão de Conta') }}</div>

                <div class="card-body">
                    <p>{{ __('Digite "Excluir Conta" no campo abaixo para confirmar a exclusão da sua conta. Esta ação é irreversível.') }}</p>

                    <form method="POST" action="{{ route('perfil.excluir-conta') }}">
                        @csrf
                        <div class="form-group">
                            <label for="confirmation_phrase">{{ __('Digite "Excluir Conta" para confirmar') }}</label>
                            <input id="confirmation_phrase" type="text" class="form-control @error('confirmation_phrase') is-invalid @enderror" name="confirmation_phrase" required autocomplete="off">
                            @error('confirmation_phrase')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-danger">
                            {{ __('Deletar Conta') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
