@extends('layouts.layout')

@section('content')
    <h1>Atualizar Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" id="formProduct" action="{{ route('products.update', $product->id_product) }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control" name="name" id="name" required autocomplete="off" value="{{ $product->name }}" autofocus />
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control" name="description" id="description" style="resize: vertical" required>{{ $product->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="100,00 ou maior" value="{{ \App\Traits\Utils::formatar_valor($product->price) }}" required autocomplete="off" />
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/products/products.edit.script.js') }}"></script>
@endsection
