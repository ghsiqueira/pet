@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Editar Serviço</h1>

    <form action="{{ route('servicos.update', $service->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Nome do Serviço:</label>
            <input type="text" name="name" value="{{ $service->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Preço:</label>
            <input type="text" id="price" name="price" value="{{ number_format($service->price / 100, 2, ',', '') }}" class="form-control money-mask" required maxlength="15">
            <input type="hidden" id="rawPrice" name="raw_price" value="{{ $service->price }}">
        </div>
        <div class="form-group">
            <label for="description">Descrição:</label>
            <textarea name="description" class="form-control">{{ $service->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Imagem:</label>
            <input type="file" name="image" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Serviço</button>
    </form>

    <form action="{{ route('servicos.destroy', $service->id) }}" method="post" class="mt-3">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Excluir Serviço</button>
    </form>

    <a href="{{ route('servicos.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>

<script>
    const priceInput = document.getElementById('price');
    const rawPriceInput = document.getElementById('rawPrice');

    priceInput.addEventListener('input', function() {
        const numericValue = this.value.replace(/\D/g, '');

        if (numericValue.length > 6) {
            this.value = formatPrice(rawPriceInput.value);
            return;
        }

        const formattedValue = formatPrice(numericValue);

        this.value = formattedValue;

        rawPriceInput.value = numericValue;
    });

    function formatPrice(value) {
        if (isNaN(value) || value === '') {
            return '';
        }

        const floatValue = parseFloat(value) / 100;

        const formattedValue = `R$ ${floatValue.toFixed(2).replace('.', ',')}`;

        return formattedValue;
    }
</script>
@endsection
