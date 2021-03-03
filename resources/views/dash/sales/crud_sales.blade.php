@extends('layouts.layout')

@section('content')
    <h1>Adicionar / Editar Venda</h1>
    <div class='card'>
        <div class='card-body'>
            <form action="{{ route('sales.store') }}" id="formSales" method="POST" autocomplete="off">
                @csrf
                <h5>Informações do cliente</h5>
                <div class="form-group">
                    <label for="name">Nome do cliente</label>
                    <input type="text" class="form-control " id="name" name="client_name" autocomplete="off" autofocus required />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="client_email" autocomplete="off" required />
                </div>
                <div class="form-group">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="client_cpf" placeholder="999.999.999-99" autocomplete="off" />
                </div>

                <h5 class='mt-5'>Informações da venda</h5>

                <div class="form-group">
                    <label for="product_id">Produto</label>
                    <select id="product_id" class="form-control" name="product_id" required autocomplete="off">
                        <option selected disabled value>Escolha o produto</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id_product }}">{{ $product->description }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="saled_at">Data</label>
                    <input type="text" class="form-control single_date_picker" id="saled_at" name="saled_at" required autocomplete="off" />
                </div>
                <div class="form-group">
                    <label for="quantity">Quantidade</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" placeholder="1 a 10" autocomplete="off" required />
                </div>
                <div class="form-group">
                    <label for="discount">Desconto</label>
                    <input type="text" class="form-control" id="discount" name="discount" placeholder="100,00 ou menor" required autocomplete="off" />
                </div>
                <div class="form-group">
                    <label for="status_id">Status</label>
                    <select id="status_id" name="status_id" class="form-control" required autocomplete="off">
                        <option selected>Escolha um status</option>
                        @foreach($list_status as $status)
                            <option value="{{ $status->id_sales_status }}">{{ $status->slug }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/sales/sales.script.js') }}"></script>
@endsection
