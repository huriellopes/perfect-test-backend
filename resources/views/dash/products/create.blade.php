@extends('layouts.layout')

@section('content')
    <h1>Novo Produto</h1>
    <div class='card'>
        <div class='card-body'>
            <form method="POST" id="formProduct" action="{{ route('products.store') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Nome do produto</label>
                    <input type="text" class="form-control" name="name" id="name" required autocomplete="off" autofocus />
                </div>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea type="text" rows='5' class="form-control" name="description" id="description" style="resize: vertical" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="100,00 ou maior" required autocomplete="off" />
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/products/products.script.js') }}"></script>
@endsection
