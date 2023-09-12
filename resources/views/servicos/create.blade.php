@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Criar Novo Serviço</h1>
    
    <form action="{{ route('servicos.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome do Serviço:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Preço:</label>
            <input type="text" name="price" class="form-control money-mask" required>
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Imagem:</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-success">Criar Serviço</button>
    </form>
    
    <a href="{{ route('servicos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>

<script>
    const moneyInputs = document.querySelectorAll('.money-mask');

    moneyInputs.forEach(input => {
        input.addEventListener('input', function() {
            const value = this.value.replace(/\D/g, '');
            const formattedValue = new Intl.NumberFormat('pt-BR', {
                style: 'currency',
                currency: 'BRL',
                minimumFractionDigits: 2
            }).format(value / 100);

            this.value = formattedValue;
        });
    });
</script>
@endsection
