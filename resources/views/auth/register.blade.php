@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="user_type" class="col-md-4 col-form-label text-md-end">{{ __('Usuário:') }}</label>
                            <div class="col-md-6">
                                <select id="user_type" class="form-select" name="user_type" required>
                                    <option value="cliente">Cliente</option>
                                    <option value="petshop">Pet Shop/Loja</option>
                                </select>
                                @error('user_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 nome-cli">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nome:') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Digite seu nome..." required autocomplete="name" maxlength="40">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Campos para cliente (inicialmente visíveis) -->
                        <div class="row mb-3 cliente-fields">
                            <label for="cpf" class="col-md-4 col-form-label text-md-end">{{ __('CPF:') }}</label>
                            <div class="col-md-6">
                                <input id="cpf" type="text" class="form-control cpf-input" name="cpf" value="{{ old('cpf') }}" placeholder="Digite seu CPF..." required maxlength="14">
                            </div>
                        </div>

                        <!-- Campos para petshop/loja (inicialmente ocultos) -->                        
                        <div class="row mb-3 razao-social" style="display: none;">
                            <label for="razao-social" class="col-md-4 col-form-label text-md-end">{{ __('Razão Social:') }}</label>
                            <div class="col-md-6">
                                <input id="razao-social" type="text" class="form-control" name="razao-social" value="{{ old('razao-social') }}" placeholder="Digite a razão social..." required>
                            </div>
                        </div>

                        <div class="row mb-3 petshop-fields" style="display: none;">
                            <label for="cnpj" class="col-md-4 col-form-label text-md-end">{{ __('CNPJ:') }}</label>
                            <div class="col-md-6">
                                <input id="cnpj" type="text" class="form-control cnpj-input" name="cnpj" value="{{ old('cnpj') }}" placeholder="Digite seu CNPJ..." required maxlength="18">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email:') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Digite seu Email..." required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Telefone:') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control phone-input" name="phone" value="{{ old('phone') }}" placeholder="Digite seu telefone..." required maxlength="15">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Senha:') }}</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Digite sua senha..." required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirme a Senha:') }}</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme a senha..." required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#user_type').change(function () {
            var userType = $(this).val();
            if (userType === 'cliente') {
                $('.cliente-fields').show();
                $('.petshop-fields').hide();
                $('.nome-cli').show();
                $('.razao-social').hide();
            } else if (userType === 'petshop') {
                $('.cliente-fields').hide();
                $('.petshop-fields').show();
                $('.nome-cli').hide();
                $('.razao-social').show();
            }
        });

        $('#user_type').trigger('change');

//         // Função para aplicar máscara de CPF
//         function applyCPFFormat(input) {
//             var value = input.val().replace(/\D/g, '');
//             if (value.length > 3) {
//                 value = value.substring(0, 3) + '.' + value.substring(3);
//             }
//             if (value.length > 7) {
//                 value = value.substring(0, 7) + '.' + value.substring(7);
//             }
//             if (value.length > 11) {
//                 value = value.substring(0, 11) + '-' + value.substring(11);
//             }
//             input.val(value);
//         }

//         // Função para aplicar máscara de CNPJ
//         function applyCNPJFormat(input) {
//             var value = input.val().replace(/\D/g, '');
//             if (value.length > 2) {
//                 value = value.substring(0, 2) + '.' + value.substring(2);
//             }
//             if (value.length > 6) {
//                 value = value.substring(0, 6) + '.' + value.substring(6);
//             }
//             if (value.length > 10) {
//                 value = value.substring(0, 10) + '/' + value.substring(10);
//             }
//             if (value.length > 15) {
//                 value = value.substring(0, 15) + '-' + value.substring(15);
//             }
//             input.val(value);
//         }

//         // Função para aplicar máscara de telefone
//         function applyPhoneFormat(input) {
//             var value = input.val().replace(/\D/g, '');
//             if (value.length > 0) {
//                 value = '(' + value.substring(0, 2) + ') ' + value.substring(2);
//             }
//             if (value.length > 10) {
//                 value = value.substring(0, 10) + '-' + value.substring(10);
//             }
//             input.val(value);
//         }

//         // Aplicar máscaras enquanto o usuário digita
//         $('.cpf-input').on('input', function () {
//             applyCPFFormat($(this));
//         });

//         $('.cnpj-input').on('input', function () {
//             applyCNPJFormat($(this));
//         });

//         $('.phone-input').on('input', function () {
//             applyPhoneFormat($(this));
//         });
    });
</script>
@endsection